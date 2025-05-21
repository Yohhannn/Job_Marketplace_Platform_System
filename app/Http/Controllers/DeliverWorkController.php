<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Models\Contract;
use Illuminate\Support\Facades\Auth;
class DeliverWorkController
{
    //
    public function activeContracts(){
        // Fetch all accepted proposals for the logged-in user
        $proposals = Proposal::where('user_id', auth()->id())
            ->where('status', 'accepted')
            ->with(['job.user', 'duration'])
            ->get();

        return view('pages.Deliver_Work.active_contracts', compact('proposals'));
    }

    public function viewContractReview(Request $request){
        // Get query parameters
        $job_id = $request->query('job_id');
        $duration_id = $request->query('duration_id');

        // Fetch job with relationships
        $job = Job::with([
            'user',
            'role.role_category',
            'hourly.duration',
            'fixedPrice.duration',
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

        return view('pages.Deliver_Work.view_contract', compact('job', 'proposal', 'duration_id', 'isJobPoster'));
    }
    public function historyContracts(){
        return view('pages.Deliver_Work.contract_history');
    }

    public function showReviewForm($contract_id)
    {
        $contract = Contract::findOrFail($contract_id);
        return view('pages.Job_Post.end_contract_review', compact('contract'));
    }

    public function endContract(Request $request, $contract_id)
    {
        $contract = Contract::findOrFail($contract_id);

        // Update contract with review data
        $contract->is_completed = true;
        $contract->client_rating = $request->rating;
        $contract->client_feedback = $request->review_text;
        $contract->save();

        return redirect()->route('my-post-details', ['id' => $contract->job_id])
            ->with('success', 'Contract ended successfully and review submitted.');
    }
}
