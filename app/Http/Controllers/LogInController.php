<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogInController
{
    public function show()
    {
        return view('pages.login');
    }
}
