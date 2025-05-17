<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogInController
{
    public function show()
    {
        return view('pages.login');
    }
    public function signIn(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('home');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ]);
    }

    public function logOut(Request $request){
        Auth::logout();
        return redirect()->intended('/');
    }
}
