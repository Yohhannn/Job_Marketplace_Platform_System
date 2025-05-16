<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Job Posts - INHIRE</title>
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
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 1rem;
            object-fit: cover;
        }
        .user-info {
            display: flex;
            align-items: center;
        }
        .section-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 1.5rem;
        }
        .job-post-section {
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 0.5rem;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        .job-post-title {
            font-size: 1.1rem;
            color: #34495e;
            margin-bottom: 1.5rem;
        }
        .job-main-title {
            font-size: 1.1rem;
            color: #34495e;
            margin-bottom: 0.5rem;
        }
        .job-post-count {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 1rem;
        }
        .nav-tabs .nav-link {
            border: none;
            border-bottom: 2px solid transparent;
            color: #555;
            margin-right: 1rem;
            cursor: pointer;
            transition: color 0.3s ease, border-bottom-color 0.3s ease;
        }

        .nav-tabs .nav-link:hover {
            color: #007bff;
            border-bottom-color: #007bff;
        }

        .nav-tabs .nav-link.active {
            color: #007bff;
            font-weight: bold;
            border-bottom-color: #007bff;
        }

        .tab-content {
            margin-top: 1.5rem;
        }

        .job-post-card {
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 0.5rem;
            padding: 1.5rem;
            margin-bottom: 1rem;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .job-post-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .job-post-section p{
            margin-bottom: 0;
        }
        .btn-outline-primary {
            color: #007bff;
            border-color: #007bff;
        }

        .btn-outline-primary:hover {
            background-color: #007bff;
            color: #fff;
        }

        .job-tag {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 0.5rem;
            font-size: 0.8rem;
            font-weight: 500;
            color: #fff;
            background-color: #547aaa;
            color: #d6d9dc;
            margin-bottom: 0.5rem;
        }
        .job-details-label {
            font-weight: normal;
            color: #868686;
            margin-right: 0.25rem;
        }
        .pt{
            margin-top: 2rem;
        }
        .job-title {
            font-size: 1.1rem;
            color: #34495e;
            margin-bottom: 0.5rem;
        }
        .job-description {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 1rem;
            line-height: 1.5;
        }
        .job-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.8rem;
            color: #7f8c8d;
        }

        .job-summary {
            font-size: 0.8rem;
            color: #7f8c8d;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .verified-icon {
            /* Style for a verified icon, you can use a library like Font Awesome */
            color: green; /* Example: green checkmark */
        }

        .star-icon {
            /* Style for a star icon */
            color: #f9a825;   /* Example: a shade of yellow */
        }

        .tag {
            background-color: #e0e0e0;
            color: #333;
            padding: 0.25rem 0.5rem;
            border-radius: 0.5rem;
            margin-right: 0.5rem;
            font-size: 0.75rem;
        }
        .view-more-button {
            margin-top: 1rem;
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
    <section class="mb-4">
        <h2 class="section-title">My Job Posts</h2>
        <p class="lead">Manage your job posts.</p>
    </section>

    <section class="mb-4 text-center">
        <a href="{{ route('createjobpost.createjobpost') }}" class="btn btn-primary"><b>+ Post a job</b></a>
    </section>

    <section class="job-post-section">
        <h3 class="job-main-title">Your Job Posts</h3>
        <p class="job-post-count">Number of job posts: <span id="job-post-count">{{ count($job_posts) }}</span></p>
        <div id="job-posts-list">
            @foreach ($job_posts as $job )
            <div class="job-post-card">
                <h3 class="job-title">{{$job->title}}</h3>
                <div class="job-summary">
                    Posted By: {{ $job->user->first_name }} {{ $job->user->middle_name ? $job->user->middle_name . ' ' : '' }}{{ $job->user->last_name }}
                </div>
                <div class="job-summary">
                    Tags: <span class="tag">{{$job->type}}</span><span class="tag">{{$job->role->role_category->name}}</span>
                </div>
                <p class="job-description">{{ $job->description }}</p>
                <div class="job-details">
                    Posted {{ $job->created_at->diffForHumans() }}
                </div>
                <a href="/Views/Job_Post/view_mypost.html" class="btn btn-primary view-more-button">See Job Post</a>
            </div>
            @endforeach
        </div>
    </section>
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
        const findWorkDropdown = document.getElementById('findWorkDropdown');
        const deliverWorkDropdown = document.getElementById('deliverWorkDropdown');
        const navbarNavItems = document.querySelectorAll('.navbar-nav .nav-item');


        if (findWorkDropdown && deliverWorkDropdown) {
            // Remove the original event listeners for "Find Work" and "Deliver Work"
            findWorkDropdown.removeAttribute('href');
            deliverWorkDropdown.removeAttribute('href');
        }
        // Set "Find Work" as active by default
        navbarNavItems.forEach(navItem => navItem.classList.remove('active'));
        const findWorkNavItem = Array.from(navbarNavItems).find(navItem => navItem.querySelector('#findWorkDropdown'));
        if (findWorkNavItem) {
            findWorkNavItem.classList.add('active');
        }

        // Mock job data (Improved for demonstration)

        // Update card with mock data

        // Calculate and display "posted time ago"
        const timeAgoString = getTimeAgoString(mockJobData.postedDate);
        jobPostCard.querySelector('.job-details').textContent = `Posted: ${timeAgoString}`;


        function getTimeAgoString(date) {
            const now = new Date();
            const diff = now.getTime() - date.getTime();

            const seconds = Math.floor(diff / 1000);
            const minutes = Math.floor(seconds / 60);
            const hours = Math.floor(minutes / 60);
            const days = Math.floor(hours / 24);
            const weeks = Math.floor(days / 7);
            const months = Math.floor(days / 30);
            const years = Math.floor(days / 365);

            if (years > 1) return `${years} years ago`;
            if (years === 1) return `1 year ago`;
            if (months > 1) return `${months} months ago`;
            if (months === 1) return `1 month ago`;
            if (weeks > 1) return `${weeks} weeks ago`;
            if (weeks === 1) return `1 week ago`;
            if (days > 1) return `${days} days ago`;
            if (days === 1) return `1 day ago`;
            if (hours > 1) return `${hours} hours ago`;
            if (hours === 1) return `1 hour ago`;
            if (minutes > 1) return `${minutes} minutes ago`;
            if (minutes === 1) return `1 minute ago`;
            if (seconds > 1) return `${seconds} seconds ago`;
            return `Just now`;
        }
    });
</script>
</body>
</html>
