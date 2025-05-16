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
        $user_skills = $user->skills;
        return view('pages.Profile.profile_settings', compact('user', 'experienceLevels', 'englishLevels', 'skills', 'user_skills'));
    }

    public function updateProfileSettings(){
        $user = auth()->user();
        $validated = request()->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'contact_number' => 'required|string|max:20',
            'desc_title' => 'nullable|string|max:255',
            'desc_text' => 'nullable|string|max:1000',
            'experience_level_id' => 'required|exists:experience_levels,id',
            'english_level_id' => 'required|exists:english_levels,id',
            'hourly_rate' => 'nullable|numeric|min:0',
            'user_skills' => 'array',
        ]);
        $user->update([
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'contact_number' => $validated['contact_number'],
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
        return view('pages.Profile.profile_contact', compact('user'));
    }
}
