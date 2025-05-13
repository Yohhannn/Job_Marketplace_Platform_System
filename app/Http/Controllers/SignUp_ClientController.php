<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class SignUp_ClientController
{
    // Show the registration form
    public function show()
    {
        return view('pages.signup_client');
    }

    // Handle form submission
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'contact_number' => 'required|string|max:20',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = new User([
            'first_name' => strtoupper($validated['first_name']),
            'middle_name' => $validated['middle_name'] ? strtoupper($validated['middle_name']) : null,
            'last_name' => strtoupper($validated['last_name']),
            'email' => $validated['email'],
            'contact_number' => $validated['contact_number'],
            'password' => Hash::make($validated['password']),
            'created_at' => now(),
        ]);

        $user->save();

        return redirect()->route('login')
            ->with('success', 'Account created successfully!');
    }
}
