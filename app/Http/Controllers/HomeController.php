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

        // Fetch all jobs where user_id is NOT the current user's ID
        $jobs = Job::where('user_id', '!=', $user->id)
            ->with('user', 'role.role_category')
            ->get();

        // Filter best match jobs based on English level
        $best_match = $jobs->filter(function ($job) use ($user) {
            return $job->english_level_id === $user->english_level_id;
        });

        // Sort jobs by most recent
        $recent_post = $jobs->sortByDesc('created_at');

        return view('pages.home', compact('user', 'best_match', 'recent_post'));
    }
}
