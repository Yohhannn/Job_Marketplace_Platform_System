<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INHIRE: Your Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f7f9;
        }
        .navbar-brand {
            font-weight: bold;
            color: #007bff;
        }
        .nav-link {
            color: #555;
            margin-right: 1rem;
        }
        .nav-link:hover {
            color: #007bff;
        }
        .nav-item.active .nav-link {
            color: #007bff;
            font-weight: bold;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .form-control {
            border-radius: 0.5rem;
            border: 1px solid #e0e0e0;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
        }
        .profile-large {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1rem;
        }
        .profile-header {
            background-color: #fff;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            text-align: center;
            margin-bottom: 2rem;
            position: relative; /* Added for absolute positioning of the button */
        }
        .profile-info-section {
            background-color: #fff;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            margin-bottom: 1rem;
        }
        .section-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 1rem;
        }
        .info-item {
            margin-bottom: 0.75rem;
            color: #555;
        }
        .info-label {
            font-weight: bold;
            margin-right: 0.5rem;
            color: #34495e;
        }
        .skill-tag {
            background-color: #ebebeb;
            color: #333;
            padding: 0.25rem 0.5rem;
            border-radius: 0.5rem;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            font-size: 0.8rem;
            display: inline-block;
        }
        .profile-actions {
            text-align: center;
            margin-top: 1.5rem;
        }
        .profile-actions .btn {
            margin: 0 0.5rem;
        }
        .about-me-text {
            line-height: 1.6;
        }
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 1rem;
            object-fit: cover;
        }
        .small-description {
            font-size: 0.8rem;
            color: #666;
            margin-bottom: none;
            line-height: 1.2;
        }
        .text-charge{
            color:#0056b3;
            font-size: 1.2rem;
        }

        /* Styles for the settings button  */
        .profile-settings-btn {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background-color: #007bff; /* Blue background */
            border: none;
            font-size: 0.9rem;
            color: #fff; /* White text */
            cursor: pointer;
            padding: 0.5rem 1rem;
            border-radius: 0.5rem;
            transition: background-color 0.3s ease;
        }

        .profile-settings-btn:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        .radio-option {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: all 0.2s;
        }

        .option-label {
            font-weight: 500;
        }
        .option-description {
            font-size: 0.9rem;
            color: #6c757d;
        }
    </style>
</head>
<body>

<header class="bg-white py-3 border-bottom">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href={{ route('home') }}>INHIRE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="findWorkDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Find Work
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="findWorkDropdown">
                            <li><a class="dropdown-item" href="{{ route('home') }}">Find Work</a></li>
                            <li><a class="dropdown-item" href="{{ route('findwork.myproposals') }}">My Proposals</a></li>
                            <li><a class="dropdown-item" href="{{ route('findwork.myjobposts') }}">My Job Posts</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="findWorkDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Deliver Work
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="deliverWorkDropdown">
                            <li><a class="dropdown-item" href="{{ route('deliverwork.activecontracts') }}">Your Active Contracts</a></li>
                            <li><a class="dropdown-item" href="{{ route('deliverwork.historycontracts') }}">Contract History</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search for jobs" aria-label="Search">
                            <a href="/Views/Search/searched_result.html"><button class="btn btn-primary" type="button" id="button-addon2">Search</button></a>
                        </form>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button"
                           id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="user-info">
                                <img src="{{ asset('icons/icon_profile.png') }}" alt="User Avatar" class="avatar">
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="{{ route('myProfile') }}">My Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('myProfileSettings') }}">Profile Settings</a></li>
                            <li><a class="dropdown-item" href="{{ route('myProfileContact') }}">Contact Info</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<main class="container py-4">
    <div class="profile-header">
        <img src="/icons/icon_profile.png" alt="Profile Icon" class="profile-large">
        <h2>{{ $user->name }}</h2>
        <a href="{{ route('myProfileSettings') }}" class="profile-settings-btn">
            Profile Settings
        </a>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="profile-info-section">
                @if($user->desc_title)
                    <h3 class="section-title">{{ $user->desc_title }}</h3>
                @endif
                <h3 class="text-charge">{{ $user->hourly_rate ? '$'.$user->hourly_rate.'/hr' : 'Hourly rate not set' }}</h3>
                <p class="about-me-text">{{ $user->desc_text ?? 'No profile description. Go to profile settings to add.' }}</p>
            </div>

            <div class="profile-info-section">
                <h3 class="section-title">Skills</h3>
                <div>
                    @if($user->skills->isEmpty())
                        <p class="small-description">No skills added yet.</p>
                    @else
                        @foreach($user->skills as $skill)
                            <span class="skill-tag">{{ $skill->name }}</span>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="profile-info-section">
                <h3 class="section-title">Experience Level</h3>
                <div class="radio-option">
                    <label class="option-label">{{ $user->experienceLevel->name }}</label>
                    <div class="option-description">{{ $user->experienceLevel->description }}</div>
                </div>
            </div>
            <div class="profile-info-section">
                <h3 class="section-title">English Level</h3>
                <div class="radio-option">
                    <label class="option-label">{{ $user->englishLevel->name }}</label>
                    <div class="option-description">{{ $user->englishLevel->description }}</div>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="bg-light py-3 border-top">
    <div class="container text-center">
        <p>&copy; 2025 INHIRE. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Set "Profile" as active in the navigation
        const navItems = document.querySelectorAll('.navbar-nav .nav-item');
        navItems.forEach(navItem => navItem.classList.remove('active'));
        const profileNavItem = Array.from(navItems).find(navItem => navItem.querySelector('a[href="./profile.html"]'));
        if (profileNavItem) {
            profileNavItem.classList.add('active');
        }


    });
</script>
</body>
</html>
