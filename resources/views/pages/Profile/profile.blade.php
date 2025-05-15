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

    </style>
</head>
<body>

<header class="bg-white py-3 border-bottom">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="#">INHIRE</a>
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
                    <li class="nav-item">
                        <a class="nav-link size" href="{{ route('myProfile') }}">
                            <div class="user-info">
                                <img src="{{ asset('icons/icon_profile.png') }}" alt="User Avatar" class="avatar">
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<main class="container py-4">
    <div class="profile-header">
        <img src="/icons/icon_profile.png" alt="Jodeci P." class="profile-large">
        <h2>Jodeci Pogi</h2>
        <a href="{{ route('myProfileSettings') }}" class="profile-settings-btn">
            Profile Settings
        </a>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="profile-info-section">
                <h3 class="section-title">Part-time college student, part-time passionate hobbyist.</h3>
                <h3 class="text-charge">$10/hr</h3>
                <p class="about-me-text">
                    Hi! I'm a college freshman willing to put out my skills and help you! My skills are from my hobbies, i.e., I learned HTML-CSS because I wanted to code a site to showcase my fictional language for feedback, so rest assured there is passion and determination to give you quality work. :D
                <ul>
                    <li>Knows a decent amount of HTML, CSS, C/C++</li>
                    <li>Proficient in Microsoft Office and Google Suite apps, and Canva</li>
                    <li>Has good eye for graphic design :)</li>
                </ul>
                </p>
            </div>

            <div class="profile-info-section">
                <h3 class="section-title">Skills</h3>
                <div>
                    <span class="skill-tag">HTML</span>
                    <span class="skill-tag">CSS</span>
                    <span class="skill-tag">C</span>
                    <span class="skill-tag">Canva</span>
                    <span class="skill-tag">Adobe Photoshop</span>
                    <span class="skill-tag">Adobe Illustrator</span>
                    <span class="skill-tag">Microsoft Word</span>
                    <span class="skill-tag">Microsoft PowerPoint</span>
                    <span class="skill-tag">Mathematics</span>
                    <span class="skill-tag">Copy Editing</span>
                    <span class="skill-tag">Graphic Design</span>
                    <span class="skill-tag">College & University</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">

            <div class="profile-info-section">
                <h3 class="section-title">Availability</h3>
                <p class="info-item small-description"><span class="info-label small-description">Hours per week:</span> More than 30 hrs/week</p>
            </div>

            <div class="profile-info-section">
                <h3 class="section-title">Languages</h3>
                <p class="info-item small-description"><span class="info-label">English:</span> Fluent</p>
                <p class="info-item small-description"><span class="info-label">Tagalog:</span> Native or Bilingual</p>
            </div>
            <div class="profile-info-section">
                <h3 class="section-title">Education</h3>
                <div class="info-item small-description">
                    <span class="info-label">University:</span> Cebu Technological University
                </div>
                <div class="info-item small-description">
                    <span class="info-label">Degree:</span> Bachelor of Science in Information Technology
                </div>
                <div class="info-item small-description">
                    <span class="info-label">Years:</span> 2023-2027 (expected)
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
