<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INHIRE: Connecting Clients and Freelancers</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
                                <li><a class="dropdown-item active" href="./home.html">Find Work</a></li>
                                <li><a class="dropdown-item" href="./myproposals.html">My Proposals</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="deliverWorkDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Deliver Work
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="deliverWorkDropdown">
                                <li><a class="dropdown-item" href="#">Your Active Contracts</a></li>
                                <li><a class="dropdown-item" href="#">Contract History</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search for services" aria-label="Search">
                                <button class="btn btn-primary" type="button" id="button-addon2">Search</button>
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <i class="fas fa-bell"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                <div class="user-info">
                                    <img src={{ asset('icons/icon_profile.png') }} alt="User Avatar" class="avatar">
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
            <p class="lead">Connect with talented freelancers and find the perfect job for your skills.</p>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search for jobs..." aria-label="Search for jobs" aria-describedby="button-addon2">
                <button class="btn btn-primary" type="button" id="button-addon2">Search</button>
            </div>
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
                    title: 'English into Ewe proofreading job',
                    summary: [
                        { icon: 'fas fa-dollar-sign', text: 'Hourly: $15-$30' },
                        { icon: 'far fa-calendar-alt', text: '1 Month' },
                        { icon: 'far fa-clock', text: '< 30 hr/wk' },
                        { text: 'Intermediate' },
                    ],
                    proposals: '5 to 10',
                    clientDetails: [
                        { icon: 'fas fa-check-circle', text: 'Payment Verified', isVerified: true },
                        { icon: 'fas fa-star', text: '4.9', isStar: true },
                        { text: '$200K+ Spent' },
                        { text: 'United States' },
                    ],
                    description: 'I have -1800 words to review from English into Ewe in Word format. TAT for 48 hours would be fine. Payable: 2 (two) hours. Apply with your best hourly rate this job.',
                    tags: ['English', 'Proofreading', 'Ewe'],
                    posted: '22 hours ago',
                },
                {
                    title: 'Graphic Designer',
                    description: 'We need a creative graphic designer to design a new logo and marketing materials.',
                    details: { posted: '1 week ago', budget: '$500 - $1000' },
                },
            ],
            'most-recent': [
                {
                    title: 'Data Analyst',
                    summary: [
                        { icon: 'fas fa-dollar-sign', text: 'Fixed: $2000-$3000' },
                        { icon: 'far fa-calendar-alt', text: '2 Weeks' },
                        { icon: 'far fa-clock', text: '40 hr/wk' },
                        { text: 'Expert' },
                    ],
                    proposals: '10-15',
                    clientDetails: [
                        { icon: 'fas fa-check-circle', text: 'Payment Verified', isVerified: true },
                        { icon: 'fas fa-star', text: '4.8', isStar: true },
                        { text: '$100K+ Spent' },
                        { text: 'Canada' },
                    ],
                    description: 'Analyze sales data and create reports to improve business decisions.  Experience with SQL and Python required.',
                    tags: ['Data Analysis', 'SQL', 'Python'],
                    posted: '1 day ago',
                },
                {
                    title: 'Full Stack Developer',
                    description: 'Looking for a full stack developer for a long term project.',
                    details: { posted: '2 days ago', budget: '$60-$80/hr' },
                },
            ],
            'saved-jobs': [
                {
                    title: 'Project Manager',
                    summary: [
                        { icon: 'fas fa-dollar-sign', text: 'Monthly: $5000-$7000' },
                        { icon: 'far fa-calendar-alt', text: '3 Months' },
                        { icon: 'far fa-clock', text: '40 hr/wk' },
                        { text: 'Intermediate' },
                    ],
                    proposals: '20-30',
                    clientDetails: [
                        { icon: 'fas fa-check-circle', text: 'Payment Verified', isVerified: true },
                        { icon: 'fas fa-star', text: '4.5', isStar: true },
                        { text: '$50K+ Spent' },
                        { text: 'United Kingdom' },
                    ],
                    description: 'Manage the development and launch of a new mobile application.  Agile experience is a plus.',
                    tags: ['Project Management', 'Agile', 'Mobile Development'],
                    posted: '5 days ago',
                },
                {
                    title: 'Technical Writer',
                    description: 'We are looking for a technical writer to create documentation.',
                    details: { posted: '1 week ago', budget: '$30-$50/hr' },
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

            const jobCardConfig = {
                title: { tag: 'h3', className: 'job-title', textKey: 'title' },
                summary: {
                    tag: 'div', className: 'job-summary', items: [
                        { tag: 'span', icon: 'fas fa-dollar-sign', textKey: 'text' },
                        { tag: 'span', icon: 'far fa-calendar-alt', textKey: 'text' },
                        { tag: 'span', icon: 'far fa-clock', textKey: 'text' },
                        { tag: 'span', textKey: 'text' },
                    ],
                    dataKey: 'summary'
                },
                proposals: {
                    tag: 'div', className: 'job-summary',
                    items: [{
                        tag: 'span', html: (data) => `<i class="fas fa-users"></i> Proposals: ${data}`,
                        textKey: 'proposals'
                    }]
                },
                clientDetails: {
                    tag: 'div', className: 'job-summary', items: [
                        { tag: 'span', icon: 'fas fa-check-circle', textKey: 'text', isVerified: true },
                        { tag: 'span', icon: 'fas fa-star', textKey: 'text', isStar: true },
                        { tag: 'span', textKey: 'text' },
                        { tag: 'span', textKey: 'text' },
                    ],
                    dataKey: 'clientDetails'
                },
                description: { tag: 'p', className: 'job-description', textKey: 'description' },
                tags: {
                    tag: 'div', className: 'tags-container', items: [{
                        tag: 'span', className: 'tag', textKey: 'tag'
                    }],
                    dataKey: 'tags'
                },
                details: {
                    tag: 'div', className: 'job-details',
                    html: (data) => {
                        if (data.details) {
                            return `<span>${data.details.posted}</span><span>${data.details.budget}</span>`;
                        } else if (data.posted) {
                            return `<span>Posted ${data.posted}</span>`;
                        }
                        return '';
                    },
                    dataKey: 'details'
                }
            };

            function createJobCard(job) {
                const card = document.createElement('div');
                card.className = 'job-card';

                for (const key in jobCardConfig) {
                    const config = jobCardConfig[key];
                    let element;

                    if (config.tag) {
                        element = document.createElement(config.tag);
                        if (config.className) {
                            element.className = config.className;
                        }
                    }

                    if (config.textKey) {
                        element.textContent = job[config.textKey] || '';
                    }

                    if (config.html) {
                        element.innerHTML = config.html(job);
                    }
                    if(config.items && config.dataKey){
                        const data = job[config.dataKey]
                        if(data){
                            data.forEach(itemData =>{
                                const itemElement = document.createElement(itemData.tag || 'span');
                                if(itemData.className){
                                    itemElement.className = itemData.className
                                }
                                if (itemData.icon) {
                                    const icon = document.createElement('i');
                                    icon.className = itemData.icon;
                                    if(itemData.isVerified){
                                        icon.classList.add('verified-icon')
                                    }
                                    if(itemData.isStar){
                                        icon.classList.add('star-icon')
                                    }
                                    itemElement.appendChild(icon);
                                }
                                itemElement.textContent = itemData.text || itemData.tag;
                                element.appendChild(itemElement)
                            })
                        }
                    }
                    else if(config.items && !config.dataKey){
                         config.items.forEach(itemData => {
                            const itemElement = document.createElement(itemData.tag || 'span');
                            if (itemData.icon) {
                                const icon = document.createElement('i');
                                icon.className = itemData.icon;
                                 if(itemData.isVerified){
                                        icon.classList.add('verified-icon')
                                    }
                                    if(itemData.isStar){
                                        icon.classList.add('star-icon')
                                    }
                                itemElement.appendChild(icon);
                            }
                            itemElement.textContent = job[itemData.textKey] || itemData.tag;
                            element.appendChild(itemElement);
                        });
                    }

                    card.appendChild(element);
                }

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