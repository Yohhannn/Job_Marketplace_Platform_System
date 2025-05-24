<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class HomeController
{
    public function show(Request $request)
    {
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
        $search = $request->input('search');

        $query = Job::with('user', 'role', 'role.role_category');

        if ($search) {
            $search = strtolower($search); // normalize case

            $query->where(function($q) use ($search) {
                // Convert to lower inside the query for case-insensitive matching (especially for PostgreSQL)
                $q->whereRaw('LOWER(title) LIKE ?', ["%{$search}%"])
                    ->orWhereRaw('LOWER(description) LIKE ?', ["%{$search}%"])
                    ->orWhereRaw('LOWER(type) LIKE ?', ["%{$search}%"])

                    ->orWhereHas('user', function($q2) use ($search) {
                        $q2->whereRaw('LOWER(first_name) LIKE ?', ["%{$search}%"])
                            ->orWhereRaw('LOWER(middle_name) LIKE ?', ["%{$search}%"])
                            ->orWhereRaw('LOWER(last_name) LIKE ?', ["%{$search}%"]);
                    })

                    ->orWhereHas('role.role_category', function($q3) use ($search) {
                        $q3->whereRaw('LOWER(name) LIKE ?', ["%{$search}%"]);
                    });
            });
        }

        $jobs = $query->get();

        // Case-insensitive best match by English level (you can expand this logic)
        $best_match = $jobs->filter(function ($job) use ($user, $search) {
            $jobTitle = strtolower($job->title ?? '');
            return $job->english_level_id === $user->english_level_id &&
                Str::contains($jobTitle, strtolower($search));
        });

        $recent_post = $jobs->sortByDesc('created_at');

        return view('pages.home', compact('user', 'best_match', 'recent_post', 'search'));
    }
}
