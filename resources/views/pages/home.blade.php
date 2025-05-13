<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INHIRE: Connecting Clients and Freelancers</title>
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
        .section-username {
            font-size: 2rem;
            font-weight: bold;
            color: #488fd7;
            margin-bottom: 1.5rem;
        }
        .job-card {
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 0.5rem;
            padding: 1.5rem;
            margin-bottom: 1rem;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
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
        .tab-link {
            color: #555;
            margin-right: 1rem;
            cursor: pointer;
            text-decoration: none;
        }

        .tab-link:hover {
            color: #007bff;
        }

        .tab-link.active {
            color: #007bff;
            font-weight: bold;
        }

        .job-summary {
            font-size: 0.8rem;
            color: #7f8c8d;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .job-summary i {
            /* You might need to adjust this based on the icon library you are using */
            margin-right: 0.25rem;
        }

        .verified-icon {
            /* Style for a verified icon, you can use a library like Font Awesome */
            color: green; /* Example: green checkmark */
        }

        .star-icon {
            /* Style for a star icon */
            color: #f9a825;  /* Example: a shade of yellow */
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
<!--Testing-->
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
                            <li><a class="dropdown-item active" href="/Views/Find_Work/home.html">Find Work</a></li>
                            <li>
                                <a class="dropdown-item" href="{{ route('findwork.myproposals') }}">My Proposals</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('findwork.myjobposts') }}">My Job Posts</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="deliverWorkDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Deliver Work
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="deliverWorkDropdown">
                            <li><a class="dropdown-item" href="/Views/Deliver_Work/active_contracts.html">Your Active Contracts</a></li>
                            <li><a class="dropdown-item" href="/Views/Deliver_Work/contract_history.html">Contract History</a></li>
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
                        <a class="nav-link size" href="/Views/Profile/profile.html">
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
        <h2 class="section-title">Welcome to INHIRE!</h2>
        <h2 class="section-username">{{ $user->name }}</h2>
        <p class="lead">Connect with talented freelancers and find the perfect job for your skills.</p>
    </section>

    <section class="mb-4">
        <h2 class="section-title">Jobs You Might Like</h2>
        <div class="mb-3">
            <a href="#" class="tab-link active" data-tab="best-matches">Best Matches</a>
            <a href="#" class="tab-link" data-tab="most-recent">Most Recent</a>
            <a href="#" class="tab-link" data-tab="saved-jobs">Saved Jobs</a>
        </div>
        <div id="best-matches" class="job-listings">
        </div>
        <div id="most-recent" class="job-listings" style="display: none;">
        </div>
        <div id="saved-jobs" class="job-listings" style="display: none;">
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
    const jobData = {
        'best-matches': [
            {
                title: 'Software Engineer',
                postedBy: 'Edmark Talingting',
                tags: ['Hourly', 'Developer'],
                description: 'Seeking a skilled Software Engineer to build and maintain web applications.',
                posted: '2 days ago',
            },
            {
                title: 'Graphic Designer',
                postedBy: 'Jane Smith',
                tags: ['Fixed Price', 'Creative'],
                description: 'We need a creative graphic designer to design a new logo and marketing materials.',
                posted: '1 week ago',
            },
        ],
        'most-recent': [
            {
                title: 'Data Analyst',
                postedBy: 'John Doe',
                tags: ['Full-time', 'Data Analysis', 'SQL'],
                description: 'Analyze sales data and create reports to improve business decisions.  Experience with SQL and Python required.',
                posted: '1 day ago',
            },
            {
                title: 'Full Stack Developer',
                postedBy: 'Alice Johnson',
                tags: ['Contract', 'React', 'Node.js'],
                description: 'Looking for a full stack developer for a long term project.',
                posted: '2 days ago',
            },
        ],
        'saved-jobs': [
            {
                title: 'Project Manager',
                postedBy: 'Samantha White',
                tags: ['Full-time', 'Agile', 'Project Management'],
                description: 'Manage the development and launch of a new mobile application.  Agile experience is a plus.',
                posted: '5 days ago',
            },
            {
                title: 'Technical Writer',
                postedBy: 'Robert Brown',
                tags: ['Hourly', 'Technical Writing'],
                description: 'We are looking for a technical writer to create documentation.',
                posted: '1 week ago',
            },
        ],
    };

    document.addEventListener('DOMContentLoaded', () => {
        const tabLinks = document.querySelectorAll('.tab-link');
        const jobListings = document.querySelectorAll('.job-listings');
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

        function createJobCard(job) {
            const card = document.createElement('div');
            card.className = 'job-card';

            card.innerHTML = `
                    <h3 class="job-title">${job.title}</h3>
                    <div class="job-summary">
                        Posted By: ${job.postedBy}
                    </div>
                    <div class="job-summary">
                        Tags: ${job.tags.map(tag => `<span class="tag">${tag}</span>`).join('')}
                    </div>
                    <p class="job-description">${job.description}</p>
                    <div class="job-details">
                        Posted: ${job.posted}
                    </div>
                    <button class="btn btn-primary view-more-button">View More</button>
                `;

            return card;
        }

        function loadJobs(tab) {
            const tabContent = document.getElementById(tab);
            tabContent.innerHTML = '';
            const jobs = jobData[tab] || [];
            jobs.forEach(job => {
                const card = createJobCard(job);
                tabContent.appendChild(card);
            });
        }

        tabLinks.forEach(tabLink => {
            tabLink.addEventListener('click', (event) => {
                event.preventDefault();

                tabLinks.forEach(link => link.classList.remove('active'));
                jobListings.forEach(listing => listing.style.display = 'none');

                const tab = tabLink.dataset.tab;
                tabLink.classList.add('active');
                document.getElementById(tab).style.display = 'block';
                loadJobs(tab);
            });
        });

        loadJobs('best-matches');
        document.querySelector(`[data-tab="best-matches"]`).classList.add('active');
        document.getElementById('best-matches').style.display = 'block';
    });
</script>
</body>
</html>
