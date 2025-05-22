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

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 1rem;
            object-fit: cover;
        }

        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
        }

        .star-rating input {
            display: none;
        }
        .star-rating label {
            cursor: pointer;
            width: 40px;
            height: 40px;
            margin-right: 5px;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" fill="%23d4d4d4"/></svg>');
        }
        .star-rating input:checked ~ label {
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" fill="%23ffc107"/></svg>');
        }
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z" fill="%23ffc107"/></svg>');
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

                    @if ($job->type === 'hourly')
                        <p>Duration: {{ optional(optional($job->hourly)->duration)->name ?? 'Not specified' }}</p>
                    @elseif ($job->type === 'fixed-price')
                        @php
                            $duration = optional($job->fixedPrice)->duration;
                            $durationName = optional($duration)->name;
                        @endphp
                        <p>Duration: {{ $durationName ?? 'Not specified' }}</p>
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
                    </form>
                </div>
            </div>
        </div>
    </div>
    <section class="mb-4">
        <h2 class="section-title">Submit Review</h2>
        <p class="lead">Please provide a review for the freelancer based on your experience working together.</p>
    </section>
    <section class="review-section">
        @if(isset($contract))
        <form action="{{ route('contract.review.submit', ['contract_id' => $contract->id]) }}" method="POST">
            @csrf
            @method('PATCH')
        @else
        <div class="alert alert-warning">
            No contract found for this job. Please contact support if you believe this is an error.
        </div>
        <form action="#" method="POST" class="d-none">
            @csrf
            @method('PATCH')
        @endif
            <div class="mb-3">
                <label for="rating" class="form-label">Rating</label>
                <div class="star-rating">
                    <input type="radio" id="star5" name="rating" value="5" required {{ !isset($contract) ? 'disabled' : '' }} />
                    <label for="star5" title="5 stars"></label>
                    <input type="radio" id="star4" name="rating" value="4" {{ !isset($contract) ? 'disabled' : '' }} />
                    <label for="star4" title="4 stars"></label>
                    <input type="radio" id="star3" name="rating" value="3" {{ !isset($contract) ? 'disabled' : '' }} />
                    <label for="star3" title="3 stars"></label>
                    <input type="radio" id="star2" name="rating" value="2" {{ !isset($contract) ? 'disabled' : '' }} />
                    <label for="star2" title="2 stars"></label>
                    <input type="radio" id="star1" name="rating" value="1" {{ !isset($contract) ? 'disabled' : '' }} />
                    <label for="star1" title="1 star"></label>
                </div>
            </div>

            <div class="mb-3">
                <label for="review_text" class="form-label">Review</label>
                <textarea class="form-control" id="review_text" name="review_text" rows="5" required placeholder="Please provide your feedback about working with this freelancer..." {{ !isset($contract) ? 'disabled' : '' }}></textarea>
            </div>

                <!-- User is a proposer -->
                <a href="{{ route('deliverwork.activecontracts') }}" class="btn btn-primary mt-3">
                    ← Back
                </a>
            <button type="submit" class="btn btn-primary mt-3" {{ !isset($contract) ? 'disabled' : '' }}>Submit Review</button>
        @if(isset($contract))
        </form>
        @else
        </form>
        @endif
    </section>
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
