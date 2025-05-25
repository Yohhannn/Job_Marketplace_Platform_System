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

        // Job deactivation logic
        $thirtyDaysAgo = now()->subDays(30);
        
        // First get all active jobs
        $activeJobs = Job::where('is_active', true)->get();
        
        $jobsToDeactivate = $activeJobs->filter(function($job) use ($thirtyDaysAgo) {
            // Case 1: No contracts AND no hired proposals AND older than 30 days
            if ($job->created_at < $thirtyDaysAgo && 
                $job->contracts->isEmpty() && 
                !$job->proposals->contains('status', 'hired')) {
                return true;
            }
            
            // Case 2: Number of active contracts meets/exceeds number_of_hires
            $activeContractsCount = $job->contracts->where('is_completed', false)->count();
            if ($activeContractsCount >= $job->number_of_hires) {
                return true;
            }
            
            return false;
        })->pluck('id');

        // Update in batch
        if ($jobsToDeactivate->isNotEmpty()) {
            Job::whereIn('id', $jobsToDeactivate)->update(['is_active' => false]);
        }

        // Rest of the original logic remains the same...
        $query = Job::where('user_id', '!=', $user->id)
            ->where('is_active', true)
            ->with(['user', 'role.role_category', 'contracts', 'proposals']);

        $search = $request->input('search');

        if ($search) {
            $search = strtolower($search);

            $query->where(function($q) use ($search) {
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

        // Filter best match jobs
        $best_match = $jobs->filter(function ($job) use ($user, $search) {
            $matchesEnglishLevel = $job->english_level_id === $user->english_level_id;
            
            if ($search) {
                $jobTitle = strtolower($job->title ?? '');
                return $matchesEnglishLevel && Str::contains($jobTitle, strtolower($search));
            }
            
            return $matchesEnglishLevel;

        });

        // Sort jobs by most recent
        $recent_post = $jobs->sortByDesc('created_at');

        return view('pages.home', compact('user', 'best_match', 'recent_post'));

    }
}
