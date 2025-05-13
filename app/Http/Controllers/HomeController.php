<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController
{
    public function show()
    {
        // Ensure the user is authenticated before accessing user data
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        return view('pages.home', compact('user'));
    }
}
