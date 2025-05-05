{{--@extends('layouts.app')--}}

{{--@section('content')--}}
    <div class="signup-container">
        <div class="signup-form">
            <h1>Client Registration</h1>

            <form method="POST" action="{{ route('client.register') }}">
                @csrf

                <div class="name-fields">
                    <div class="form-group">
                        <label for="first_name">First Name *</label>
                        <input type="text" id="first_name" name="first_name"
                               value="{{ old('first_name') }}" required autofocus>
                        @error('first_name')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" id="middle_name" name="middle_name"
                               value="{{ old('middle_name') }}">
                        @error('middle_name')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last Name *</label>
                        <input type="text" id="last_name" name="last_name"
                               value="{{ old('last_name') }}" required>
                        @error('last_name')
                        <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email Address *</label>
                    <input type="email" id="email" name="email"
                           value="{{ old('email') }}" required>
                    @error('email')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number *</label>
                    <input type="tel" id="contact_number" name="contact_number"
                           value="{{ old('contact_number') }}" required>
                    @error('phone')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password *</label>
                    <input type="password" id="password" name="password"
                           required minlength="8"
                           placeholder="At least 8 characters">
                    @error('password')
                    <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password *</label>
                    <input type="password" id="password_confirmation"
                           name="password_confirmation" required>
                </div>

                <button type="submit" class="btn btn-primary">
                    Register as Client
                </button>
            </form>
        </div>
    </div>
{{--@endsection--}}
