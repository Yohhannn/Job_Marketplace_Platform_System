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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="findWorkDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Find Work
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="findWorkDropdown">
                            <li><a class="dropdown-item" href="{{ route('home') }}">Find Work</a></li>
                            <li><a class="dropdown-item" href="{{ route('findwork.myproposals') }}">My Proposals</a></li>
                            <li></li>
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
                    <li class="nav-item dropdown active">
                        <a class="nav-link dropdown-toggle"href="{{ route('findwork.myjobposts') }}">My Job Posts</a>
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
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <h1 class="job-title">Job Title: {{ $job_post->title }}</h1>
                <p class="post-date">Date Uploaded: {{ $job_post->created_at->format('M d, Y') }}</p>
                @if($job_post->type === 'hourly')
                    @if($job_post->hourly)
                        <p class="rate">Rate: ${{ number_format($job_post->hourly->rate_min, 2) }} - ${{ number_format($job_post->hourly->rate_max, 2) }} / hr</p>
                        <p>Duration: {{ optional($job_post->hourly->duration)->name ?? 'Not specified' }}</p>
                    @else
                        <p class="rate">Rate: Not specified</p>
                    @endif
                @elseif($job_post->type === 'fixed-price')
                    @if($job_post->fixedPrice)
                        <p class="rate">Fixed Price: ${{ number_format($job_post->fixedPrice->price, 2) }}</p>
                    @else
                        <p class="rate">Fixed Price: Not specified</p>
                    @endif
                @endif
                <div class="tags">
                    <span class="tag">{{ $job_post->type }}</span>
                    <span class="tag">{{$job_post->role->role_category->name}}</span>
                </div>
                <p class="description">
                    Job Description: {{ $job_post->description }}
                </p>
            </div>
            <div class="col-lg-4">
                <div class="d-flex flex-column">
                    <a href="{{ route('makeproposal', [
                            'job_id' => $job_post->id,
                            'duration_id' => optional($job_post->hourly)->duration_id
                        ]) }}" class="btn btn-success mb-2">Apply Now
                    </a>
                    <br>
                </div>
                <div class="client-info">
                    <h2 class="client-info-title">About the client</h2>
                    <p class="client-name">
                        Client Name:
                        {{ $job_post->user?->first_name . ' ' . ($job_post->user?->middle_name ? $job_post->user->middle_name . ' ' : '') . $job_post->user?->last_name ?? 'Unknown' }}
                    </p>
                    <p class="ratings">Ratings: <span class="text-warning">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= $clientStats['averageRating'])
                                ★
                            @else
                                ☆
                            @endif
                        @endfor
                        </span> ({{ $clientStats['averageRating'] }})
                    </p>
                    <p class="reviews-count">Number of Reviews: {{ $clientStats['reviewCount'] }}</p>
                    <p class="posts-count">Number of Posts: {{ $clientStats['postCount'] }}</p>
                    <p class="hires-count">Number of Hires: {{ $clientStats['hireCount'] }}</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <section class="history-section">
                    <h2 class="history-title">Client's Recent History ({{ $clientStats['reviewCount'] }} Reviews)</h2>

                    @if(count($clientReviews) > 0)
                        @foreach($clientReviews as $review)
                            <div class="history-card">
                                <p class="history-card-fixed-price">
                                    @if($review->job->type === 'fixed-price')
                                        Fixed Price: ${{ number_format($review->pay_amount, 2) }}
                                    @else
                                        Hourly Rate: ${{ number_format($review->pay_amount, 2) }}/hr
                                    @endif
                                </p>
                                <h3 class="history-card-title">Feedback for {{ $review->job->title }}</h3>
                                <span class="text-warning">
                                    @for($i = 1; $i <= 5; $i++)
                                        @if($i <= $review->client_rating)
                                            ★
                                        @else
                                            ☆
                                        @endif
                                    @endfor
                                    <span> {{ $review->client_rating }}.0</span>
                                </span>
                                <p class="history-card-description">
                                    "{{ $review->client_feedback }}"
                                </p>
                            </div>
                        @endforeach
                    @else
                        <div class="alert alert-info">
                            This client has no reviews yet.
                        </div>
                    @endif
                </section>
            </div>
        </div>
    </div>

    <div class="modal fade" id="reviewModal" tabindex="-1" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reviewModalLabel">Add a Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="reviewForm">
                        <div class="form-group">
                            <label for="rating">Rating:</label>
                            <div class="star-rating">
                                <input type="radio" id="star5" name="rating" value="5" required/>
                                <label for="star5">★</label>
                                <input type="radio" id="star4" name="rating" value="4" />
                                <label for="star4">★</label>
                                <input type="radio" id="star3" name="rating" value="3" />
                                <label for="star3">★</label>
                                <input type="radio" id="star2" name="rating" value="2" />
                                <label for="star2">★</label>
                                <input type="radio" id="star1" name="rating" value="1" />
                                <label for="star1">★</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="reviewDescription">Description:</label>
                            <textarea class="form-control" id="reviewDescription" rows="3" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary review-submit-button" id="submitReview">Submit Review</button>
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

    // jQuery for review submission
    $(document).ready(function () {
        $('#submitReview').click(function () {
            const rating = $('input[name="rating"]:checked').val();
            const reviewText = $('#reviewDescription').val();

            if (rating && reviewText) {
                console.log("Rating:", rating);
                console.log("Review Text:", reviewText);
                $('#reviewModal').modal('hide');
                $('body').removeClass('modal-open');
                $('.modal-backdrop').remove();
                alert("Thank you for your review! (This is a mock action)");

                // Reset the form
                $('input[name="rating"]').prop('checked', false);
                $('#reviewDescription').val('');
            } else {
                alert("Please select a rating and provide a review.");
            }
        });
    });
</script>

</body>
</html>
