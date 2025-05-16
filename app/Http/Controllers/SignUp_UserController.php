<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ExperienceLevel;
use App\Models\EnglishLevel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class SignUp_UserController
{
    // Show the talent registration form
    public function show()
    {
        $experienceLevels = ExperienceLevel::all();
        $englishLevels = EnglishLevel::all();

        return view('pages.signup_user', compact('experienceLevels', 'englishLevels'));
    }

    // Handle talent registration form submission
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'contact_number' => 'required|string|max:20',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'experience_level_id' => 'required|exists:experience_levels,id',
            'english_level_id' => 'required|exists:english_levels,id',
        ]);

        $user = User::create([
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'contact_number' => $validated['contact_number'],
            'password' => Hash::make($validated['password']),
            'experience_level_id' => $validated['experience_level_id'],
            'english_level_id' => $validated['english_level_id']
        ]);

        return redirect()->route('login')
            ->with('success', 'Your account has been created successfully!');
    }
}
