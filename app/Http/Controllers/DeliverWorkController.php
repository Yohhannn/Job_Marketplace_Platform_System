<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeliverWorkController
{
    //
    public function activeContracts(){
        return view('pages.Deliver_Work.active_contracts');
    }

    public function historyContracts(){
        return view('pages.Deliver_Work.contract_history');
    }
}
