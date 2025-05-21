@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viewing My Job Post - INHIRE</title>
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
        .job-details-section {
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 0.5rem;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        .job-details-title {
            font-size: 1.1rem;
            color: #34495e;
            margin-bottom: 0.5rem;
        }
        .job-details-info {
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

        .proposal-card {
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 0.5rem;
            padding: 1.5rem;
            margin-bottom: 1rem;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .proposal-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .proposal-section p{
            margin-bottom: 0;
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
    <section class="mb-4">
        <h2 class="section-title">Viewing My Job Post</h2>
        <p class="lead">View my job post details and manage proposals.</p>
    </section>

    <section class="mb-4">
        <nav class="nav nav-tabs">
            <a class="nav-link active" href="#view-job-post" data-bs-toggle="tab">View Job Post</a>
            <a class="nav-link" href="#review-proposals" data-bs-toggle="tab">Review Proposals</a>
            <a class="nav-link" href="#hired" data-bs-toggle="tab">Hired</a>
        </nav>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="view-job-post">
                <div class="tab-pane fade show active" id="view-job-post">
                    <div class="job-details-section">
                        <h3 class="job-details-title">Job Posting Details</h3>
                        <div class="job-details-info">
                            <p><strong>Title:</strong> {{ $job_post->title }}</p>
                            <p><strong>Description:</strong> {{ $job_post->description }}</p>

                            <p><strong>By:</strong>
                                {{ optional($job_post->user)->first_name }}
                                {{ optional(optional($job_post->user)->middle_name) ? optional($job_post->user)->middle_name . ' ' : '' }}
                                {{ optional($job_post->user)->last_name }} (You)
                            </p>

                            <p><strong>Job Type:</strong> {{ $job_post->type ?? 'N/A' }}</p>
                            <p><strong>Job Role:</strong> {{ optional(optional($job_post->role)->role_category)->name ?? 'N/A' }}</p>
                            <p><strong>Experience Level:</strong> {{ optional($job_post->exp)->name ?? 'N/A' }}</p>
                            <p><strong>English Level:</strong> {{ optional($job_post->eng)->name ?? 'N/A' }}</p>
                            <p><strong>Job Scope:</strong> {{ $job_post->scope ?? 'N/A' }}</p>
                            <p><strong>Number of Hires:</strong> {{ $job_post->number_of_hires ?? 0 }}</p>
                            <p><strong>Date Posted:</strong> {{ $job_post->created_at?->format('Y-m-d') ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="review-proposals">
                <div class="proposal-section">
                    <h3 class="proposal-title">Proposals to Review</h3>
                    <p class="proposal-count"><strong>Title:</strong> "{{ $job_post->title }}"</p>
                    <p class="proposal-count">Number of proposals: {{ $job_post->proposals->whereIn('status', ['pending', 'interviewed'])->count() }}</p>

                    <div id="review-proposals-list">
                        @forelse($job_post->proposals->whereIn('status', ['pending', 'interviewed']) as $proposal)
                            <a style="color: black" href="{{ route('user.proposer-info', ['user_id' => $proposal->user_id, 'job_id' => $proposal->job_id]) }}" class="text-decoration-none">
                            @php
                                $contract = $job_post->contracts->where('user_id', $proposal->user_id)->first();
                            @endphp        
                            <div class="proposal-card mb-3 border p-3 rounded">
                                    <p><b>Proposal From {{ optional($proposal->user)->first_name ?? 'Unknown' }}</b></p>
                                    <p>Status:
                                        <span class="badge bg-{{ $proposal->status === 'pending' ? 'warning text-dark' : ($proposal->status === 'accepted' ? 'success' : 'secondary') }}">
                                {{ ucfirst($proposal->status) }}
                            </span>
                                    </p>
                                    <p>Proposed Date: {{ $proposal->created_at->format('M d, Y') }}</p>

                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('proposaldetails', [
                                    'job_id' => $proposal->job_id,
                                    'user_id' => $proposal->user_id,
                                    'duration_id' => optional($proposal->duration)->id
                                ]) }}" class="btn btn-primary btn-sm view-details-btn">
                                            View Details
                                        </a>
                                        @if (!$proposal->status === 'accepted')
                                        @if(in_array($proposal->status, ['pending', 'interviewed']))
                                            <button
                                                class="btn btn-info btn-sm interview-btn"
                                                data-proposal-id="{{ $proposal->id }}"
                                                data-bs-toggle="modal"
                                                data-bs-target="#interviewModal"
                                            >
                                                Interview
                                            </button>
                                        @endif

                                        @if($proposal->status === 'interviewed')
                                            <p>Interview Date: {{ \Carbon\Carbon::parse($proposal->interview_date)->format('M d, Y') }}</p>
                                            <p>Interview Time: {{ $proposal->interview_time }}</p>
                                        @endif

                                        @if(in_array($proposal->status, ['pending', 'interviewed']))
                                            <form action="{{ route('proposal.reject', ['proposal' => $proposal->id]) }}" method="POST" class="reject-form">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-danger btn-sm reject-btn">Reject</button>
                                            </form>

                                            <!-- Hire Form -->
                                            <form action="{{ route('proposal.hire', ['proposal' => $proposal->id]) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success btn-sm hire-btn">Hire</button>
                                            </form>
                                        @endif                                                                               
                                        @endif
                            </a>
                                </div>
                            </div>
                        @empty
                            <p>No proposals yet.</p>
                        @endforelse
                    </div>
                </div>
            </div>
            <!-- Interview Modal -->
            <div class="modal fade" id="interviewModal" tabindex="-1" aria-labelledby="interviewModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form id="interviewForm" method="POST" action="">
                            @csrf
                            @method('PATCH')

                            <div class="modal-header">
                                <h5 class="modal-title" id="interviewModalLabel">Set Interview Date & Time</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="interview_date" class="form-label">Interview Date</label>
                                    <input type="date" name="interview_date" id="interview_date" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="interview_time" class="form-label">Interview Time</label>
                                    <input type="time" name="interview_time" id="interview_time" class="form-control" required>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <div class="tab-pane fade" id="hired">
            <div class="proposal-section">
                <h3 class="proposal-title">Hired Candidates</h3>
                <p class="proposal-count">Number of hired candidates: {{ $job_post->proposals->where('status', 'accepted')->count() }}</p>
                <div id="hired-list">
                    @forelse($job_post->proposals->where('status', 'accepted') as $proposal)
                        <div class="proposal-card mb-3 border p-3 rounded">
                            <!-- Link only around the text -->
                            <a style="color: black; text-decoration: none;" href="{{ route('user.proposer-info', ['user_id' => $proposal->user_id, 'job_id' => $proposal->job_id]) }}">
                                <p><b>Hired: {{ optional($proposal->user)->first_name ?? 'Unknown' }}</b></p>
                                <p>Proposed Date: {{ $proposal->created_at->format('M d, Y') }}</p>
                                <p>Contract Start Date: {{ now()->format('M d, Y') }}</p>
                            </a>

                            <!-- Buttons outside the <a> tag -->
                            <div class="d-flex">
                                @if(!$contract->is_completed)
                                    <a href="{{ route('contract.review', ['contract_id' => $contract->id]) }}" class="btn btn-danger me-2">End Contract</a>                  
                                @endif

                                <a href="{{ route('proposaldetails', [
                            'job_id' => $proposal->job_id,
                            'user_id' => $proposal->user_id,
                            'duration_id' => optional($proposal->duration)->id
                        ]) }}" class="btn btn-secondary view-details-btn">
                                    View Details
                                </a>
                            </div>
                        </div>
                    @empty
                        <p>No hired candidates yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
    <a href="{{ route('findwork.myjobposts') }}" class="btn btn-primary mt-3">Return to My Job Posts</a>
</main>

<footer class="bg-light py-3 border-top">
    <div class="container text-center">
        <p>&copy; 2025 INHIRE. All rights reserved.</p>
    </div>
</footer>

<div class="modal fade" id="viewDetailsModal" tabindex="-1" aria-labelledby="viewDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered"> <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewDetailsModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="modal-description"></p>
                <p id="modal-proposed-date"></p>
                <p id="modal-contract-date"></p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="confirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmationModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="confirmation-text"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirm-hire">Yes</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="interviewModal" tabindex="-1" aria-labelledby="interviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="interviewModalLabel">Schedule Interview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="interview-text"></p>
                <input type="date" id="interview-date" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="set-interview-date">Set</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>
<script>
    console.log("Script loaded!");
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
    });
    document.addEventListener('DOMContentLoaded', function () {
        const interviewModal = document.getElementById('interviewModal');
        const interviewForm = document.getElementById('interviewForm');

        if (!interviewModal || !interviewForm) {
            console.warn("Modal or form element not found");
            return;
        }

        interviewModal.addEventListener('show.bs.modal', function (event) {
            console.log("Modal opened"); // Showed up?
            const button = event.relatedTarget;
            const proposalId = button?.getAttribute('data-proposal-id');

            console.log("Button:", button);
            console.log("Proposal ID:", proposalId);

            const url = "{{ route('proposal.interview', ['proposal' => ':id']) }}".replace(':id', proposalId);

            console.log("Setting form action to:", url);

            interviewForm.setAttribute('action', url);
        });
    });
</script>
</body>
</html>
