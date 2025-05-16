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
                <div class="job-details-section">
                    <h3 class="job-details-title">Job Posting Details</h3>
                    <div class="job-details-info">
                        @php $job = $job_post @endphp
                        <p><strong>Title:</strong>{{ $job->title }}</p>
                        <p><strong>Description:</strong> {{ $job->description }}</p>
                        <p><strong>By:</strong> {{ $job->user->first_name }} {{ $job->user->middle_name ? $job->user->middle_name . ' ' : '' }}{{ $job->user->last_name }} (You)</p>
                        <p><strong>Job Type:</strong> {{$job->type}}</p>
                        <p><strong>Job Role:</strong> {{$job->role->role_category->name}}</p>
                        <p><strong>Experience Level:</strong> {{$job->exp->name}}</p>
                        <p><strong>English Level:</strong> {{$job->eng->name}}</p>
                        <p><strong>Job Scope:</strong> {{$job->scope}}</p>
                        <p><strong>Number of Hires:</strong> {{ $job->number_of_hires }}</p>
                        <p><strong>Date Posted:</strong> {{$job->created_at->format('Y-m-d')}}</p>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="review-proposals">
                <div class="proposal-section">
                    <h3 class="proposal-title">Proposals to Review</h3>
                    <p class="proposal-count">Title: "Software Engineer"</p>
                    <p class="proposal-count">Number of proposals: 2</p>
                    <div id="review-proposals-list">
                        <div class="proposal-card" data-title="Proposal from John Doe" data-description="Hello! I'm John, I have 5 years of experience in web development.  I am proficient in React, Angular, and Node.js.  I am available for an interview next week." data-proposed-date="2025-02-01" data-name="John Doe">
                            <p><b>Proposal from John Doe</b></p>
                            <p>Proposed Date: 2025-02-01</p>
                            <button class="btn btn-primary me-2 set-interview-btn">Set Interview</button>
                            <button class="btn btn-success me-2 hire-btn">Hire</button>
                            <button class="btn btn-secondary view-details-btn">View</button>
                        </div>
                        <div class="proposal-card" data-title="Proposal from Jane Smith" data-description="I'm Jane, a full-stack developer with 3 years of experience.  I specialize in e-commerce websites and have a strong portfolio.  I am flexible with my schedule." data-proposed-date="2025-02-03" data-name="Jane Smith">
                            <p><b>Proposal from Jane Smith</b></p>
                            <p>Proposed Date: 2025-02-03</p>
                            <button class="btn btn-primary me-2 set-interview-btn">Set Interview</button>
                            <button class="btn btn-success me-2 hire-btn">Hire</button>
                            <button class="btn btn-secondary view-details-btn">View</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="hired">
                <div class="proposal-section">
                    <h3 class="proposal-title">Hired Candidates</h3>
                    <p class="proposal-count">Number of hired candidates: 1</p>
                    <div id="hired-list">
                        <div class="proposal-card" data-title="Hired: Joehanes Lauglaug" data-description="Hello! I am Joehanes a highly skilled sigma developer." data-proposed-date="2025-02-01" data-contract-date="2025-02-07" data-name="Joehanes Lauglaug">
                            <p><b>Hired: Joehanes Lauglaug</b></p>
                            <p>Proposed Date: 2025-02-01</p>
                            <p>Contract Start Date: 2025-02-07</p>
                            <button class="btn btn-danger me-2 end-contract-btn">End Contract</button>
                            <button class="btn btn-secondary view-details-btn">View</button>
                        </div>
                    </div>
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

<div class="modal fade" id="endContractConfirmationModal" tabindex="-1" aria-labelledby="endContractConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="endContractConfirmationModalLabel">Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="end-contract-confirmation-text"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirm-end-contract">Yes</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const findWorkDropdown = document.getElementById('findWorkDropdown');
        const deliverWorkDropdown = document.getElementById('deliverWorkDropdown');
        const navbarNavItems = document.querySelectorAll('.navbar-nav .nav-item');
        const viewDetailsModal = document.getElementById('viewDetailsModal');
        const modalTitle = viewDetailsModal.querySelector('.modal-title');
        const modalDescription = viewDetailsModal.querySelector('#modal-description');
        const modalProposedDate = viewDetailsModal.querySelector('#modal-proposed-date');
        const modalContractDate = viewDetailsModal.querySelector('#modal-contract-date');
        const viewButtons = document.querySelectorAll('.view-details-btn');
        const hireButtons = document.querySelectorAll('.hire-btn');
        const setInterviewButtons = document.querySelectorAll('.set-interview-btn');
        const endContractButtons = document.querySelectorAll('.end-contract-btn');

        const confirmationModal = document.getElementById('confirmationModal');
        const confirmationText = document.getElementById('confirmation-text');
        const confirmHireButton = document.getElementById('confirm-hire');
        let personNameToHire = "";

        const interviewModal = document.getElementById('interviewModal');
        const interviewText = document.getElementById('interview-text');
        const setInterviewDateButton = document.getElementById('set-interview-date');
        let personNameToInterview = "";

        const endContractConfirmationModal = document.getElementById('endContractConfirmationModal');
        const endContractConfirmationText = document.getElementById('end-contract-confirmation-text');
        let personNameToEndContract = "";

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

        viewButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                const card = event.target.closest('.proposal-card');
                if (card) {
                    const title = card.dataset.title;
                    const description = card.dataset.description;
                    const proposedDate = card.dataset.proposedDate;
                    const contractDate = card.dataset.contractDate;

                    modalTitle.textContent = title;
                    modalDescription.textContent = description;
                    modalProposedDate.textContent = "Proposed Date: " + proposedDate;
                    modalContractDate.textContent = contractDate ? "Contract Start Date: " + contractDate : ""; //check if contractDate exists before adding it.

                    new bootstrap.Modal(viewDetailsModal).show();
                }
            });
        });

        hireButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                const card = event.target.closest('.proposal-card');
                if (card) {
                    personNameToHire = card.dataset.name;
                    confirmationText.textContent = `Are you sure you want to hire ${personNameToHire}?`;
                    new bootstrap.Modal(confirmationModal).show();
                }
            });
        });

        confirmHireButton.addEventListener('click', () => {
            // In a real application, you would send a request to your server here.
            console.log(`Hiring ${personNameToHire}`);
            new bootstrap.Modal(confirmationModal).hide();
            alert(`You have hired ${personNameToHire}! (This is a mock action)`); // Replace with a proper message to user
        });

        setInterviewButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                const card = event.target.closest('.proposal-card');
                if (card) {
                    personNameToInterview = card.dataset.name;
                    interviewText.textContent = `Pick a Date to interview ${personNameToInterview}`;
                    new bootstrap.Modal(interviewModal).show();
                }
            });
        });

        setInterviewDateButton.addEventListener('click', () => {
            new bootstrap.Modal(interviewModal).hide();
        });

        endContractButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                const card = event.target.closest('.proposal-card');
                if (card) {
                    personNameToEndContract = card.dataset.name;
                    endContractConfirmationText.textContent = `Are you sure you want to end the contract with ${personNameToEndContract}?`;
                    new bootstrap.Modal(endContractConfirmationModal).show();
                }
            });
        });

        document.getElementById('confirm-end-contract').addEventListener('click', () => {
            console.log(`Ending contract with ${personNameToEndContract}`);
            new bootstrap.Modal(endContractConfirmationModal).hide();
            alert(`You have ended the contract with ${personNameToEndContract}!`); // Replace with actual logic
        });
    });
</script>
</body>
</html>
