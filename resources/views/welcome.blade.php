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
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body>

<header class="bg-light py-3 border-bottom">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <a href="/landing.html" class="navbar-brand">
                <span class="fw-bold text-primary">INHIRE</span>
            </a>
            <nav>
                <ul class="nav">
                    <li class="nav-item">
                        <a onclick="window.location.href='{{route('login')}}'" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a onclick="window.location.href='{{ route('user.register.show') }}'" class="nav-link">Sign Up</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

<main>
    <section class="bg-gradient-light text-center py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold" style="padding-bottom: 1rem; padding-top: 3rem;">Find the Perfect Match for Your Projects or Skills</h1>
                    <p class="lead text-muted">
                        INHIRE connects clients with talented freelancers and helps freelancers find exciting projects.
                    </p>
                    <a href="/signup_selection.html" class="btn btn-primary btn-lg">Get Started</a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <h2 class="card-title h4">For Clients</h2>  <p class="card-text text-muted">
                                Find skilled freelancers for your projects. Post your job, browse profiles, and hire the best talent.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <h2 class="card-title h4">For Freelancers</h2>  <p class="card-text text-muted">
                                Discover exciting projects that match your skills. Create your profile, submit proposals, and get hired.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <h2 class="card-title h4">Our Mission</h2>      <p class="card-text text-muted">
                                To empower businesses and freelancers to achieve their goals through seamless collaboration.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light py-5">
        <div class="container">
            <div class="text-center">
                <h2 class="display-6 fw-semibold mb-4">How It Works</h2>
                <p class="lead text-muted mb-5">
                    INHIRE simplifies the process of finding and working with freelancers.
                </p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title">1. Create a Profile</h3>
                            <p class="card-text text-muted">
                                Clients: Post your project details.<br>
                                Freelancers: Showcase your skills and experience.
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title">2. Connect</h3>
                            <p class="card-text text-muted">
                                Clients: Browse freelancer profiles and invite them to bid.<br>
                                Freelancers: Search for projects and submit proposals.
                            </p>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <h3 class="card-title">3. Collaborate</h3>
                            <p class="card-text text-muted">
                                Work together using our platform's tools for communication, file sharing, and payment.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<footer class="bg-dark text-white py-4">
    <div class="container text-center">
        <p>&copy; 2025 INHIRE. All rights reserved.</p>
        <ul class="list-inline">
            <li class="list-inline-item">
                <a href="#" class="text-white">Privacy Policy</a>
            </li>
            <li class="list-inline-item">
                <a href="#" class="text-white">Terms of Service</a>
            </li>
            <li class="list-inline-item">
                <a href="#" class="text-white">Contact Us</a>
            </li>
        </ul>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
