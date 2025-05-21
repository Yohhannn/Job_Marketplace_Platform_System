<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contract;

class DeliverWorkController
{
    //
    public function activeContracts(){
        return view('pages.Deliver_Work.active_contracts');
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
