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
        $job_id = $request->query('job_id');
        $duration_id = $request->query('duration_id');

        $job = Job::with([
            'user',
            'role.role_category',
            'hourly.duration',
            'fixedPrice'
        ])->findOrFail($job_id);

        return view('pages.Find_Work.make_proposal', compact('job', 'duration_id'));
    }

    public function proposalDetails(Request $request)
    {
        // Get query parameters
        $job_id = $request->query('job_id');
        $duration_id = $request->query('duration_id');

        // Fetch job with relationships
        $job = Job::with([
            'user',
            'role.role_category',
            'hourly.duration',
            'fixedPrice'
        ])->findOrFail($job_id);

        // Determine if the current user is the job poster
        $isJobPoster = $job->user_id === Auth::id();

        // Fetch the correct proposal
        if ($isJobPoster) {
            // If user is job poster, get the proposal by job_id + proposer's user_id from URL
            $proposer_id = $request->query('user_id');

            if (!$proposer_id) {
                abort(404, 'Proposer not specified.');
            }

            $proposal = Proposal::where('job_id', $job_id)
                ->where('user_id', $proposer_id)
                ->firstOrFail();
        } else {
            // If user is a proposer, get their own proposal
            $proposal = Proposal::where('job_id', $job_id)
                ->where('user_id', Auth::id())
                ->firstOrFail();
        }

        return view('pages.Find_Work.proposal_details', compact('job', 'proposal', 'duration_id', 'isJobPoster'));
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
}
