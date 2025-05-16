<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Post Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f7f9;
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
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 1rem;
            object-fit: cover;
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
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <h1 class="job-title">Job Title: Retype and Redact Application Form</h1>
            <p class="post-date">Date Uploaded: Jan 12, 2025</p>
            <p class="rate">Rate: $20 - $35 / hr</p>
            <div class="tags">
                <span class="tag">Data Entry</span>
                <span class="tag">Typing</span>
                <span class="tag">Redaction</span>
                <span class="tag">Administrative</span>
            </div>
            <p class="description">
                Job Description: I need someone to retype an application form from a scanned document.  The highest accuracy is required.  Also, some personal data will need to be redacted.
            </p>
        </div>
        <div class="col-lg-4">
            <div class="d-flex flex-column">
                <button type="button" class="btn btn-success mb-2">Apply Now</button>
            </div>
            <div class="client-info">
                <h2 class="client-info-title">About the client</h2>
                <p class="client-name">Client Name: John Doe</p>
                <p class="ratings">Ratings: <span class="text-warning">★★★★☆</span> (4.5)</p>
                <p class="reviews-count">Number of Reviews: 25</p>
                <p class="posts-count">Number of Posts: 10</p>
                <p class="hires-count">Number of Hires: 5</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <section class="history-section">
                <h2 class="history-title">Client's Recent History (25 Reviews)</h2>
                <div class="history-card">
                    <p class="history-card-date">Date Reviewed: 2024-01-15</p>
                    <p class="history-card-fixed-price">Fixed Price: $50</p>
                    <h3 class="history-card-title">Feedback for Data Entry Project</h3>
                    <span class="text-warning">
                            <label for="star5">★★★★★</label><span> 5.0</span>
                        </span>
                    <p class="history-card-description">
                        "Excellent work, very fast and accurate.  Will definitely hire again."
                    </p>
                </div>
                <div class="history-card">
                    <p class="history-card-date">Date Reviewed: 2023-12-01</p>
                    <p class="history-card-fixed-price">Fixed Price: $100</p>
                    <h3 class="history-card-title">Feedback for Virtual Assistant</h3>
                    <span class="text-warning">
                            <label for="star5">★★★★☆</label><span> 4.0</span>
                        </span>
                    <p class="history-card-description">
                        "Great communication and delivered on time.  Thank you!"
                    </p>
                </div>
                <div class="history-card">
                    <p class="history-card-date">Date Reviewed: 2023-11-01</p>
                    <p class="history-card-fixed-price">Fixed Price: $75</p>
                    <h3 class="history-card-title">Feedback for Data Cleaning</h3>
                    <span class="text-warning">
                            <label for="star5">★★★☆☆</label><span> 3.0</span>
                        </span>
                    <p class="history-card-description">
                        "Good attention to detail. Provided a very clean dataset."
                    </p>
                </div>
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
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
