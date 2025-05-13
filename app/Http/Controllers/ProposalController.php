<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProposalController
{
    public function myProposals(){
        return view('pages.Find_Work.my_proposals');
    }
}
