<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EnglishLevel;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use App\Models\ExperienceLevel;
use App\Models\RoleCategory;

class JobPostController
{
    public function myJobPosts()
    {
        $user = Auth::user();
        $job_posts = Job::where('user_id', $user->id)->with('user','role','role.role_category')->get();
        return view('pages.Find_Work.my_job_posts',compact('job_posts'));
    }
    public function myPostDetails($id){
        $job_post = Job::with('user', 'role','exp', 'role.role_category')->findOrFail($id);
        return view('pages.Job_Post.view_mypost', compact('job_post'));
    }
    public function createJobPost()
    {
        $experienceLevels = ExperienceLevel::all();
        $englishLevels = EnglishLevel::all();

        // Load categories with their roles
        $roleCategories = RoleCategory::with('roles')->get();

        return view('pages.Job_Post.post_job', compact(
            'experienceLevels',
            'englishLevels',
            'roleCategories'
        ));
    }
    public function createJob(Request $request)
{
        $user = Auth::user();
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'jobType' => 'required|string|in:hourly,fixed',
        'role_id' => 'required|exists:roles,id',
        'experience_level_id' => 'required|exists:experience_levels,id',
        'english_level_id' => 'nullable|exists:english_levels,id',
        'jobScope' => 'required|string|in:one-time,ongoing,complex',
        'no_hires' => 'required|integer|min:1',
        'salary' => 'required|numeric|min:0',
    ]);
        echo json_encode(["id" => $user->id]);
    Job::create([
        'title' => $validated['title'],
        'description' => $validated['description'],
        'type' => $validated['jobType'],
        'role_id' => $validated['role_id'],
        'experience_level_id' => $validated['experience_level_id'],
        'english_level_id' => $validated['english_level_id'] ?? null,
        'scope' => $validated['jobScope'],
        'number_of_hires' => $validated['no_hires'],
        'salary' => $validated['salary'],
        'user_id' => $user->id,
        'created_at' => now(),
        'last_viewed_at' => now(),
        'is_active' => true,
    ]);

    return redirect()->route('findwork.myjobposts')->with('success', 'Job posted successfully!');
}

}
