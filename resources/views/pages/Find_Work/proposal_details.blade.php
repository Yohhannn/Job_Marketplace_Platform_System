<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply Now</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
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

        .job-title {
            font-size: 24px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .post-date {
            font-size: 14px;
            color: #7f8c8d;
            margin-bottom: 20px;
        }
        .rate {
            font-size: 18px;
            color: #3498db;
            font-weight: 500;
            margin-bottom: 20px;
        }
        .tags {
            margin-bottom: 20px;
        }
        .tag {
            background-color: #e0f7fa;
            color: #00897b;
            padding: 8px 12px;
            border-radius: 16px;
            margin-right: 10px;
            font-size: 12px;
            display: inline-block;
        }
        .description {
            font-size: 16px;
            color: #555;
            line-height: 1.7;
            margin-bottom: 30px;
        }
        .client-info {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        .client-info-title {
            font-size: 20px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        .client-name {
            font-size: 18px;
            color: #34495e;
            margin-bottom: 10px;
        }
        .ratings {
            font-size: 14px;
            color: #f39c12;
            margin-bottom: 10px;
        }
        .reviews-count {
            font-size: 14px;
            color: #7f8c8d;
            margin-bottom: 10px;
        }
        .posts-count, .hires-count {
            font-size: 14px;
            color: #7f8c8d;
            margin-bottom: 10px;
        }
        .history-section {
            margin-bottom: 30px;
        }
        .history-title {
            font-size: 20px;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 20px;
        }
        .history-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            margin-bottom: 15px;
            display: flex;
            flex-direction: column;
        }
        .history-card-title {
            font-size: 16px;
            font-weight: bold;
            color: #34495e;
            margin-bottom: 10px;
        }
        .history-card-date {
            font-size: 12px;
            color: #95a5a6;
            margin-bottom: 10px;
            align-self: flex-start;
        }
        .history-card-description {
            font-size: 14px;
            color: #666;
            line-height: 1.7;
        }
        .history-card-fixed-price{
            font-size: 12px;
            color: #95a5a6;
            margin-bottom: 10px;
            align-self: flex-start;
        }

        .star-rating {
            display: inline-flex;
            flex-direction: row-reverse;
            gap: 0.5rem;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            cursor: pointer;
            font-size: 2rem;
            color: #ddd;
        }

        .star-rating label:hover,
        .star-rating label:hover ~ label,
        .star-rating input:checked ~ label {
            color: #ffd700;
        }

        .modal-body {
            padding: 20px;
        }

        .review-submit-button {
            margin-top: 1rem;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 1rem;
            object-fit: cover;
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
                    <!-- Find Work Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="findWorkDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Find Work
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="findWorkDropdown">
                            <li><a class="dropdown-item" href="{{ route('home') }}">Find Work</a></li>
                            <li><a class="dropdown-item" href="{{ route('findwork.myproposals') }}">My Proposals</a></li>
                        </ul>
                    </li>

                    <!-- Deliver Work Dropdown -->
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle" href="#" id="deliverWorkDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Deliver Work
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="deliverWorkDropdown">
                            <li><a class="dropdown-item" href="{{ route('deliverwork.activecontracts') }}">Your Active Contracts</a></li>
                            <li><a class="dropdown-item" href="{{ route('deliverwork.historycontracts') }}">Contract History</a></li>
                        </ul>
                    </li>

                    <!-- My Job Posts (Static Link) -->
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('findwork.myjobposts') }}">My Job Posts</a>
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
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="job-title">Job Title: {{ $job->title }}</h1>
                <p class="post-date">Date Uploaded: {{ $job->created_at->format('M d, Y') }}</p>

                @if($job->type === 'hourly')
                    @if($job->hourly)
                        <p class="rate">Rate: ${{ number_format($job->hourly->rate_min, 2) }} - ${{ number_format($job->hourly->rate_max, 2) }} / hr</p>
                    @else
                        <p class="rate">Rate: Not specified</p>
                    @endif
                @elseif($job->type === 'fixed-price')
                    @if($job->fixedPrice)
                        <p class="rate">Fixed Price: ${{ number_format($job->fixedPrice->price, 2) }}</p>
                    @else
                        <p class="rate">Fixed Price: Not specified</p>
                    @endif
                @endif

                <div class="tags">
                    <span class="tag">{{ $job->type }}</span>
                    <span class="tag">{{ $job->role->role_category->name }}</span>
                </div>

                <p class="description">
                    Job Description: {{ $job->description }}
                </p>
            </div>
            <div class="col-lg-4">
                <div class="left-section">
                    <h2 class="left-section-title">Job Details</h2>

                    @if ($job->job_type === 'hourly')
                        <p>Duration: {{ optional($job->hourly->duration)->name ?? 'Not specified' }}</p>
                    @elseif ($job->job_type === 'fixed')
                        <p>Project Length: {{ optional($job->fixed->duration)->name ?? 'Not specified' }}</p>
                    @else
                        <p>Duration: Not specified</p>
                    @endif

                    <p class="posted-by">
                        Posted By:
                        {{ $job->user?->first_name . ' ' . ($job->user?->middle_name ? $job->user->middle_name . ' ' : '') . $job->user?->last_name ?? 'Unknown' }}
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="input-section">
                    <h2 class="input-section-title">Application Details</h2>
                    <form action="{{ route('submit_proposal') }}" method="POST">
                        @csrf
                        <input type="hidden" name="job_id" value="{{ $job->id }}">
                        <input type="hidden" name="duration_id" value="{{ $duration_id ?? '' }}">

                        <!-- Bid Amount -->
                        <div class="form-group">
                            <label for="bid">Full amount of bid for the job</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">$</span>
                                </div>
                                <input type="number" step="0.01" class="form-control" id="bid" name="bid_amount"
                                       value="{{ $proposal->bid_amount ?? old('bid_amount') }}" readonly>
                            </div>
                        </div>
                        <!-- Cover Letter -->
                        <div class="form-group">
                            <label for="coverLetter">Cover Letter</label>
                            <textarea class="form-control" id="coverLetter" rows="5" readonly>{{ $proposal->letter ?? old('letter') }}</textarea>
                        </div>
                        @if(Auth::check() && $job->user_id === Auth::id())
                            <!-- User is the job creator -->
                            <a href="{{ route('my-post-details') }}?id={{ $job->id }}" class="btn btn-primary mt-3">
                                ← Back
                            </a>
                        @else
                            <!-- User is a proposer -->
                            <a href="{{ route('findwork.myproposals') }}" class="btn btn-primary mt-3">
                                ← Back
                            </a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const findWorkDropdown = document.getElementById('findWorkDropdown');
        const deliverWorkDropdown = document.getElementById('deliverWorkDropdown');
        const navbarNavItems = document.querySelectorAll('.navbar-nav .nav-item');

        // Remove hrefs if elements exist
        if (findWorkDropdown) findWorkDropdown.removeAttribute('href');
        if (deliverWorkDropdown) deliverWorkDropdown.removeAttribute('href');

        // Set "Find Work" as active by default
        navbarNavItems.forEach(navItem => navItem.classList.remove('active'));
        const findWorkNavItem = Array.from(navbarNavItems).find(navItem => navItem.querySelector('#findWorkDropdown'));
        if (findWorkNavItem) findWorkNavItem.classList.add('active');

        // Optional: If you have a job post card, handle posted date display
        // Make sure `mockJobData` and `jobPostCard` are defined in your HTML or script
        if (typeof mockJobData !== 'undefined' && typeof jobPostCard !== 'undefined') {
            const timeAgoString = getTimeAgoString(new Date(mockJobData.postedDate));
            jobPostCard.querySelector('.job-details').textContent = `Posted: ${timeAgoString}`;
        }

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
