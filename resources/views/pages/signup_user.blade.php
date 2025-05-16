<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up to hire talent</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        .form-group label {
            font-weight: 500;
            color: #343a40;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        .password-container {
            position: relative;
        }
        .password-toggle {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 16px;
            color: #6c757d;
        }
        .error {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        .card {
            border: none;
            border-radius: 12px;
        }
        .radio-option {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: all 0.2s;
        }
        .radio-option:hover {
            border-color: #007bff;
            background-color: #f8f9fa;
        }
        .radio-option.selected {
            border-color: #007bff;
            background-color: #e7f1ff;
        }
        .radio-option input[type="radio"] {
            margin-right: 10px;
        }
        .option-description {
            font-size: 0.9rem;
            color: #6c757d;
            margin-left: 25px;
        }
    </style>
</head>
<body class="bg-light">
<header class="bg-light py-3 border-bottom">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ url('/') }}" class="navbar-brand">
                <span class="fw-bold text-primary">INHIRE</span>
            </a>
        </div>
    </div>
</header>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registration') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.register') }}">
                        @csrf

                        <!-- Personal Information -->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="first_name" class="form-label">{{ __('First Name') }}</label>
                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autofocus>
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="middle_name" class="form-label">{{ __('Middle Name') }}</label>
                                <input id="middle_name" type="text" class="form-control" name="middle_name" value="{{ old('middle_name') }}">
                            </div>

                            <div class="col-md-4">
                                <label for="last_name" class="form-label">{{ __('Last Name') }}</label>
                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required>
                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="contact_number" class="form-label">{{ __('Contact Number') }}</label>
                                <input id="contact_number" type="tel" class="form-control @error('contact_number') is-invalid @enderror" name="contact_number" value="{{ old('contact_number') }}" required>
                                @error('contact_number')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <!-- Talent Information -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">{{ __('Experience Level') }}</label>
                                @error('experience_level_id')
                                <span class="error" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <div class="radio-option-group">
                                    @foreach($experienceLevels as $level)
                                        <div class="radio-option" onclick="selectOption(this)">
                                            <input type="radio" id="experience_{{ $level->id }}" name="experience_level_id" value="{{ $level->id }}" {{ old('experience_level_id') == $level->id ? 'checked' : '' }} required>
                                            <label for="experience_{{ $level->id }}">{{ $level->name }}</label>
                                            <div class="option-description">{{ $level->description }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">{{ __('English Level') }}</label>
                                @error('english_level_id')
                                <span class="error" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror

                                <div class="radio-option-group">
                                    @foreach($englishLevels as $level)
                                        <div class="radio-option" onclick="selectOption(this)">
                                            <input type="radio" id="english_{{ $level->id }}" name="english_level_id" value="{{ $level->id }}" {{ old('english_level_id') == $level->id ? 'checked' : '' }} required>
                                            <label for="english_{{ $level->id }}">{{ $level->name }}</label>
                                            <div class="option-description">{{ $level->description }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Account') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('fa-eye-slash');
            toggleIcon.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('fa-eye');
            toggleIcon.classList.add('fa-eye-slash');
        }
    }

    function selectOption(element) {
        // Remove selected class from all options in this group
        const group = element.closest('.radio-option-group');
        group.querySelectorAll('.radio-option').forEach(opt => {
            opt.classList.remove('selected');
        });

        // Add selected class to clicked option
        element.classList.add('selected');

        // Check the radio input
        const radioInput = element.querySelector('input[type="radio"]');
        radioInput.checked = true;
    }

    // Initialize selected state on page load
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('input[type="radio"]:checked').forEach(radio => {
            radio.closest('.radio-option').classList.add('selected');
        });
    });
</script>
</body>
</html>
