<?php

namespace App\Http\Controllers;

use App\Models\EnglishLevel;
use App\Models\ExperienceLevel;
use App\Models\Skill;
use Illuminate\Http\Request;

class ProfileController
{
    public function myProfile(){
        $user = auth()->user();
        return view('pages.Profile.profile', compact('user'));
    }

    public function myProfileSettings(){
        $user = auth()->user();
        $experienceLevels = ExperienceLevel::all();
        $englishLevels = EnglishLevel::all();
        $skills = Skill::all();
        $userSkills = $user->skills->pluck('id')->toArray();
        return view('pages.Profile.profile_settings', compact('user', 'experienceLevels', 'englishLevels', 'skills', 'userSkills'));
    }

    public function updateProfileSettings(){
        $user = auth()->user();
        $validated = request()->validate([
            'desc_title' => 'nullable|string|max:255',
            'desc_text' => 'nullable|string|max:1000',
            'experience_level_id' => 'required|exists:experience_levels,id',
            'english_level_id' => 'required|exists:english_levels,id',
            'hourly_rate' => 'nullable|numeric|min:0',
            'user_skills' => 'nullable|array',
            'user_skills.*' => 'exists:skills,id',
        ]);
        $user->update([
            'desc_title' => $validated['desc_title'],
            'desc_text' => $validated['desc_text'],
            'experience_level_id' => $validated['experience_level_id'],
            'english_level_id' => $validated['english_level_id'],
            'hourly_rate' => $validated['hourly_rate']
        ]);
        $user->skills()->sync($validated['user_skills'] ?? []);
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }

    public function myProfileContact(){
        $user = auth()->user();
        return view('pages.Profile.profile_contact_info', compact('user'));
    }
}
