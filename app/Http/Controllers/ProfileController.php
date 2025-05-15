<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController
{
    public function myProfile(){
        return view('pages.Profile.profile');
    }

    public function myProfileSettings(){
        return view('pages.Profile.profile_settings');
    }

    public function myProfileContact(){
        return view('pages.Profile.profile_contact');
    }
}
