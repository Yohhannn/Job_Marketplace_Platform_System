<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignUpController
{
    public function show()
    {
        return view('pages.signup');
    }
}
