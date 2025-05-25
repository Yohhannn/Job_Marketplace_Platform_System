<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Job;
use App\Models\Proposal;
use App\Models\Contract;
use Illuminate\Http\RedirectResponse;

class ProposalController
{
    public function myProposals()
    {
        $user = Auth::user();

        // Fetch active and archived proposals
        $activeProposals = Proposal::with(['job.user'])
            ->where('user_id', $user->id)
            ->whereIn('status', ['pending', 'interviewed'])
            ->orderByDesc('created_at')
            ->get();

        $archivedProposals = Proposal::with(['job.user'])
            ->where('user_id', $user->id)
            ->whereIn('status', ['accepted', 'rejected'])
            ->orderByDesc('created_at')
            ->get();

        return view('pages.Find_Work.my_proposals', compact(
            'activeProposals',
            'archivedProposals'
        ));
    }

    public function makeProposal(Request $request)
    {
        // Validate required parameters
        $validated = $request->validate([
            'job_id' => 'required|integer|exists:jobs,id'
        ]);
    
        $job = Job::with([
            'user',
            'role.role_category',
            'hourly.duration',  // Eager load the hourly relationship with duration
            'fixedPrice'
        ])->findOrFail($validated['job_id']);
    
        // Get duration_id from the job's hourly relationship if it exists
        $duration_id = optional($job->hourly)->duration_id;
    
        // Check if user is trying to apply to their own job
        if ($job->user_id === Auth::id()) {
            return redirect()->back()
                ->with('error', 'You cannot apply to your own job post');
        }
    
        // Check for existing proposal
        if (Proposal::where('job_id', $job->id)
                   ->where('user_id', Auth::id())
                   ->exists()) {
            return redirect()->route('proposal-details', ['job_id' => $job->id])
                ->with('info', 'You have already applied to this job');
        }
    
        return view('pages.Find_Work.make_proposal', [
            'job' => $job,
            'duration_id' => $duration_id  // Pass the duration_id from the job
        ]);
    }

    public function proposalDetails(Request $request)
{
    // Validate request parameters
    $validatedData = $request->validate([
        'job_id' => 'required|integer|exists:jobs,id',
        'user_id' => 'nullable|integer|exists:users,id'
    ]);
    $route = $request->query('route', ''); // Get the route parameter if exists
    $job_id = $validatedData['job_id'];
    $authUser = Auth::user();

    // Fetch job with relationships or fail
    $job = Job::with([
        'user',
        'role.role_category',
        'hourly.duration',
        'fixedPrice.duration',
        'fixedPrice'
    ])->findOrFail($job_id);

    // Determine if current user is the job poster
    $isJobPoster = $job->user_id === $authUser->id;

    // Fetch the correct proposal
    $proposalQuery = Proposal::where('job_id', $job_id);

    if ($isJobPoster) {
        // Job poster must specify which proposal to view
        if (empty($validatedData['user_id'])) {
            return redirect()->back()
                ->with('error', 'Please specify a freelancer to view their proposal');
        }
        
        $proposalQuery->where('user_id', $validatedData['user_id']);
    } else {
        // Freelancer can only view their own proposal
        $proposalQuery->where('user_id', $authUser->id);
    }

    $proposal = $proposalQuery->firstOrFail();

    return view('pages.Find_Work.proposal_details', compact('job', 'proposal', 'isJobPoster','route'));
}

    public function submitProposal(Request $request)
    {
        // Fetch the job so we can validate based on its type
        $job = Job::findOrFail($request->input('job_id'));
        // Define validation rules dynamically based on job type
        $rules = [
            'job_id' => 'required|exists:jobs,id',
            'bid_amount' => 'required|numeric|min:0',
            'letter' => 'required|string',
        ];

        // Only require duration if it's an hourly job
        if ($job->type === 'hourly') {
            $rules['duration_id'] = 'required|exists:durations,id';
        } else {
            $rules['duration_id'] = 'nullable|exists:durations,id'; // optional for fixed-price
        }

        // Run validation
        $validated = $request->validate($rules);

        // Create the proposal
        Proposal::create([
            'job_id' => $validated['job_id'],
            'user_id' => Auth::id(),
            'bid_amount' => $validated['bid_amount'],
            'letter' => $validated['letter'],
            'status' => 'pending',
            'duration_id' => $validated['duration_id'] ?? null,
            'created_at' => now(),
        ]);

        return redirect()->route('findwork.myproposals')->with('success', 'Proposal submitted successfully!');
    }

    public function scheduleInterview(Request $request, Proposal $proposal)
    {
        $validated = $request->validate([
            'interview_date' => 'required|date',
            'interview_time' => 'required',
        ]);

        $proposal->update([
            'interview_date' => $validated['interview_date'],
            'interview_time' => $validated['interview_time'],
            'status' => 'interviewed',
        ]);

        return redirect()->back()->with('success', 'Interview scheduled successfully.');
    }

    public function reject(Proposal $proposal): RedirectResponse
    {
        // Ensure only the job owner can reject proposals
        if ($proposal->job->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        $proposal->update(['status' => 'rejected']);

        return redirect()->back()->with('success', 'Proposal has been rejected.');
    }

    public function hire(Proposal $proposal): RedirectResponse
    {
        // Ensure only job owner can hire
        if ($proposal->job->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }

        // Update proposal status
        $proposal->update(['status' => 'accepted']);

        // Create contract if not already exists
        Contract::firstOrCreate([
            'job_id' => $proposal->job_id,
            'user_id' => $proposal->user_id,
            'is_completed' => false,
        ], [
            'pay_amount' => $proposal->bid_amount,
        ]);

        return redirect()->back()->with('success', 'Candidate hired successfully.');
    }

    public function submitReview(Request $request, $contract_id)
    {
        $contract = Contract::findOrFail($contract_id);

        // Update contract with review data
        $contract->is_completed = true;
        $contract->talent_rating = $request->rating;
        $contract->talent_feedback = $request->review_text;
        $contract->save();
        return redirect()->route('deliverwork.activecontracts')
            ->with('success', 'Review submitted.');
    }
}
