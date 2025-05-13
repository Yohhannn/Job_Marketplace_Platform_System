<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class ProposalController extends Controller
{
    public function show()
    {
        return view('pages.proposal');
    }
}
