<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
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
        $job = Job::with('user','role','role.role_category')->get();
        $best_match = $job->filter(function ($job) use ($user) {
            return ($job->english_level_id === $user->english_level_id && $job->english_level_id === $user->english_level_id);
        });
        $recent_post = $job->sortByDesc('created_at');
        return view('pages.home', compact('user','best_match','recent_post'));
    }
}
