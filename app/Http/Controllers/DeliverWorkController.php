<?php

namespace App\Http\Controllers;

use App\Models\Proposal;
use App\Models\Job;
use App\Models\Contract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliverWorkController
{
    //
    public function activeContracts(){
        $contracts = Contract::where('is_completed', false)->where("user_id",Auth::user()->id)->get();
        return view('pages.Deliver_Work.active_contracts', compact('contracts'));
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

        // Fetch the contract associated with this job and user
        $contract = Contract::where('job_id', $job_id)
            ->where('user_id', $proposal->user_id)
            ->first();

        return view('pages.Deliver_Work.view_contract', compact('job', 'proposal', 'duration_id', 'isJobPoster', 'contract'));
    }
    public function historyContracts(){

        $contracts = Contract::where('is_completed', true)->where("user_id",Auth::user()->id)->get();
        return view('pages.Deliver_Work.contract_history',compact('contracts'));
    }

    public function showReviewForm($contract_id,Request $request)
    {
        $route = $request->query('route'); 
        $contract = Contract::findOrFail($contract_id);
        return view('pages.Job_Post.end_contract_review', compact('contract', 'route'));
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
