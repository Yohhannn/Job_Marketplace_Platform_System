<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Selection</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }

        .account-type-btn {
            font-size: 18px;
            padding: 15px 30px;
            border-radius: 10px;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .account-type-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .account-type-btn i {
            margin-right: 10px;
            font-size: 24px;
        }

        .account-link {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
        }

        .account-link:hover {
            text-decoration: underline;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-light">
<header class="bg-light py-3 border-bottom">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <a href="{{ url('/') }}" class="navbar-brand">
                <span class="fw-bold text-primary">INHIRE</span>
            </a>
        </div>
    </div>
</header>
<div class="container">
    <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="col-12 col-md-8 col-lg-6">
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="text-center mb-5">
                <h1 class="h3 fw-semibold" style="color: #2c3e50;">Join as a client or freelancer</h1>
                <p class="text-muted" style="font-size: 1.1rem;">Choose your account type to get started.</p>
            </div>
            <div class="mb-4">
                <a href="{{ route('client.register.show') }}" class="btn btn-primary btn-lg account-type-btn">
                    <i class="fas fa-briefcase me-2"></i> I'm a client, hiring for a project
                </a>
                <a href="{{ route('talent.register.show') }}" class="btn btn-primary btn-lg account-type-btn">
                    <i class="fas fa-laptop-code me-2"></i> I'm a freelancer, looking for work
                </a>
            </div>
            <div class="text-center" style="font-size: 1.1rem;">
                <p class="text-muted">
                    Already have an account?
                    <a href="{{ route('login') }}" class="account-link">Log in</a>
                </p>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
