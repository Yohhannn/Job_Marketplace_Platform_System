    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>INHIRE: Connecting Clients and Freelancers</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        />
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
                margin-right: 0.25rem;
            }

            .verified-icon {
                color: green;
            }

            .star-icon {
                color: #f9a825;
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
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="findWorkDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                Find Work
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="findWorkDropdown">
                                <li><a class="dropdown-item" href="{{ route('home') }}">Find Work</a></li>
                                <li><a class="dropdown-item" href="{{ route('findwork.myproposals') }}">My Proposals</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown active">
                            <a
                                class="nav-link dropdown-toggle"
                                href="#"
                                id="deliverWorkDropdown"
                                role="button"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                Deliver Work
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="deliverWorkDropdown">
                                <li><a class="dropdown-item" href="{{ route('deliverwork.activecontracts') }}">Your Active Contracts</a></li>
                                <li><a class="dropdown-item" href="{{ route('deliverwork.historycontracts') }}">Contract History</a></li>
                            </ul>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('findwork.myjobposts') }}">My Job Posts</a>
                        </li>

                        <form method="GET" action="{{ route('home') }}" class="mb-4">
                            <input
                                type="text"
                                id="job-search-input"
                                name="search"
                                placeholder="Search jobs..."
                                value="{{ old('search', $search ?? '') }}"
                                class="form-control"
                            />
                            <button type="submit" class="btn btn-primary mt-2">Search</button>
                        </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item dropdown">
                            <a
                                class="nav-link dropdown-toggle d-flex align-items-center"
                                href="#"
                                role="button"
                                id="profileDropdown"
                                data-bs-toggle="dropdown"
                                aria-expanded="false"
                            >
                                <div class="user-info">
                                    <img src="{{ asset('icons/icon_profile.png') }}" alt="User Avatar" class="avatar" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                                <li><a class="dropdown-item" href="{{ route('myProfile') }}">My Profile</a></li>
                                <li><a class="dropdown-item" href="{{ route('myProfileSettings') }}">Profile Settings</a></li>
                                <li><a class="dropdown-item" href="{{ route('myProfileContact') }}">Contact Info</a></li>
                                <li><hr class="dropdown-divider" /></li>
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
            <h2 class="section-title">Welcome to INHIRE!</h2>
            <h2 class="section-username">{{ $user->name }}</h2>
            <p class="lead">Connect with talented freelancers and find the perfect job for your skills.</p>


        </section>

        <section class="mb-4">
            <h2 class="section-title">Jobs You Might Like</h2>
            <div class="mb-3">
                <a href="#" class="tab-link active" data-tab="best-matches">Best Matches</a>
                <a href="#" class="tab-link" data-tab="most-recent">Most Recent</a>
            </div>

            <div id="best-matches" class="job-listings">
                @forelse ($best_match as $best)
                    <div class="job-post-card">
                        <h3 class="job-title">{{ $best->title }}</h3>
                        <div class="job-summary">
                            Posted By: {{ $best->user->first_name }}{{ $best->user->middle_name ? ' '.$best->user->middle_name : '' }} {{ $best->user->last_name }}
                        </div>
                        <div class="job-summary">
                            Tags:
                            <span class="tag">{{ $best->type }}</span>
                            <span class="tag">{{ $best->role->role_category->name }}</span>
                        </div>
                        <p class="job-description">{{ $best->description }}</p>
                        <div class="job-details">
                            Posted: {{ $best->created_at->diffForHumans() }}
                        </div>
                        <a class="btn btn-primary view-more-button" href="{{ route('other-post-details', ['id' => $best->id]) }}">View More</a>
                    </div>
                @empty
                    <p>No best match jobs found.</p>
                @endforelse
            </div>

            <div id="most-recent" class="job-listings" style="display: none;">
                @forelse ($recent_post as $recent)
                    <div class="job-post-card">
                        <h3 class="job-title">{{ $recent->title }}</h3>
                        <div class="job-summary">
                            Posted By: {{ $recent->user->first_name }}{{ $recent->user->middle_name ? ' '.$recent->user->middle_name : '' }} {{ $recent->user->last_name }}
                        </div>
                        <div class="job-summary">
                            Tags:
                            <span class="tag">{{ $recent->type }}</span>
                            <span class="tag">{{ $recent->role->role_category->name }}</span>
                        </div>
                        <p class="job-description">{{ $recent->description }}</p>
                        <div class="job-details">
                            Posted: {{ $recent->created_at->diffForHumans() }}
                        </div>
                        <a class="btn btn-primary view-more-button" href="{{ route('other-post-details', ['id' => $recent->id]) }}">View More</a>
                    </div>
                @empty
                    <p>No recent jobs found.</p>
                @endforelse
            </div>
        </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Tab switching logic
        document.querySelectorAll('.tab-link').forEach(tab => {
            tab.addEventListener('click', e => {
                e.preventDefault();
                document.querySelectorAll('.tab-link').forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                const tabName = tab.getAttribute('data-tab');
                document.querySelectorAll('.job-listings').forEach(section => {
                    section.style.display = section.id === tabName ? 'block' : 'none';
                });
            });
        });

        // Client-side filtering on input for all job cards
        // Client-side filtering on input for job title only
        const searchInput = document.getElementById('job-search-input');
        searchInput?.addEventListener('input', () => {
            const filter = searchInput.value.toLowerCase();
            const allJobListings = document.querySelectorAll('.job-listings');
            allJobListings.forEach(section => {
                const cards = section.querySelectorAll('.job-post-card');
                cards.forEach(card => {
                    const title = card.querySelector('.job-title').textContent.toLowerCase();
                    if (title.includes(filter)) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

    </script>
    </body>
    </html>
