<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Duration;
use App\Models\FixedPriceJob;
use App\Models\HourlyJob;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use App\Models\EnglishLevel;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use App\Models\ExperienceLevel;
use App\Models\RoleCategory;

class JobPostController
{
    public function showProposerInfo($user_id, $job_id)
    {
        // Get the user (the proposer)
        $user = User::with(['skills', 'experienceLevel', 'englishLevel'])->findOrFail($user_id);

        // Get the job post (for return link or context)
        $job = Job::with('user')->findOrFail($job_id);

        // Get contracts where this user is the talent and client left feedback
        $contracts = Contract::where('user_id', $user->id)
            ->whereNotNull('client_rating')
            ->whereNotNull('client_feedback')
            ->with(['job'])
            ->get();

        // Return the user info view with all variables
        return view('pages.Profile.users_info', compact('user', 'job', 'contracts'));
    }
    public function myJobPosts()
    {
        $user = Auth::user();
        $job_posts = Job::where('user_id', $user->id)->with('user','role','role.role_category')->get();
        return view('pages.Find_Work.my_job_posts',compact('job_posts'));
    }
    public function myPostDetails(Request $request)
    {
        $id = $request->query('id');

        // Eager-load contracts and other required relationships
        $job_post = Job::with([
            'user',
            'role',
            'exp',
            'eng',
            'role.role_category',
            'proposals',
            'contracts'
        ])->findOrFail($id);
        // Debug proposals
        return view('pages.Job_Post.view_mypost', compact('job_post'));
    }
    public function otherPostDetails(Request $request)
    {
        $id = $request->query('id');

        $job_post = Job::with([
            'user.jobs',
            'role',
            'exp',
            'eng',
            'role.role_category',
            'hourly.duration',
            'fixedPrice'
        ])->findOrFail($id);

        // Get client ID from job poster
        $client_id = $job_post->user_id;

        // Fetch reviews written by talents about this client
        $talentReviews = Contract::with('job')
            ->whereHas('job', function ($query) use ($client_id) {
                $query->where('user_id', $client_id); // Contracts for jobs posted by this client
            })
            ->whereNotNull('talent_feedback') // Only include contracts where talent gave feedback
            ->get();

        // Get client statistics
        $clientStats = [
            'reviewCount' => Contract::countClientReviews($client_id),
            'postCount' => Job::where('user_id', $client_id)->count(),
            'hireCount' => Contract::countClientHires($client_id),
            'averageRating' => Contract::getTatlentAverageRating($client_id)
        ];
        $user = Auth::user()->id;
        $active_contract = Contract::where('user_id', $user)->where("is_completed", false)->get();
        $hiredProposalsCount = $job_post->proposals->where('status', 'accepted')->count();
        $is_limit = $job_post->number_of_hires <= $hiredProposalsCount;
        return view('pages.Job_Post.view_otherpost', compact('job_post', 'talentReviews', 'clientStats','active_contract', 'is_limit'));
    }

    public function createJobPost()
    {
        $experienceLevels = ExperienceLevel::all();
        $englishLevels = EnglishLevel::all();

        // Load categories with their roles
        $roleCategories = RoleCategory::with('roles')->get();
        $duration = Duration::all();
        return view('pages.Job_Post.post_job', compact(
            'experienceLevels',
            'englishLevels',
            'roleCategories',
            'duration'
        ));
    }
    public function createJob(Request $request)
    {
        try {
            $user = Auth::user();

            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'jobType' => 'required|string|in:hourly,fixed-price',
                'role_id' => 'required|exists:roles,id',
                'experience_level_id' => 'required|exists:experience_levels,id',
                'english_level_id' => 'nullable|exists:english_levels,id',
                'jobScope' => 'required|string|in:one-time,ongoing,complex',
                'no_hires' => 'required|integer|min:1',
                'salary' => 'nullable|numeric|min:0',
                'rate_min' => 'nullable|numeric|min:0',
                'rate_max' => 'nullable|numeric|min:0',
                'weekly_hours_limit' => 'nullable|numeric|min:0',
                'duration_id' => 'nullable|numeric|min:0|exists:durations,id',
            ]);

            $job = Job::create([
                'title' => $validated['title'],
                'description' => $validated['description'],
                'type' => $validated['jobType'],
                'role_id' => $validated['role_id'],
                'experience_level_id' => $validated['experience_level_id'],
                'english_level_id' => $validated['english_level_id'] ?? null,
                'scope' => $validated['jobScope'],
                'number_of_hires' => $validated['no_hires'],
                'user_id' => $user->id,
                'created_at' => now(),
                'last_viewed_at' => now(),
                'is_active' => true,
            ]);
            if($validated['jobType'] === 'hourly') {
                HourlyJob::create([
                    'id' => $job->id,
                    'rate_min' => $validated['rate_min'],
                    'rate_max' => $validated['rate_max'],
                    'weekly_hours_limit' => $validated['weekly_hours_limit'],
                    'duration_id' => $validated['duration_id'],
                ]);
            } else {
                FixedPriceJob::create([
                    'id' => $job->id,
                    'price' => $validated['salary']
                ]);
            }

            return redirect()->route('findwork.myjobposts')->with('success', 'Job posted successfully!');
        } catch(Exception $e) {
            print($e->getMessage());
        }
    }


}
