<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contract History - INHIRE</title>
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
        .contract-card {
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 0.5rem;
            padding: 1.5rem;
            margin-bottom: 1rem;
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }
        .contract-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .contract-title {
            font-size: 1.1rem;
            color: #34495e;
            margin-bottom: 0.5rem;
        }
        .contract-details {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 1rem;
        }
        .no-contracts-message {
            text-align: center;
            padding: 2rem;
            background-color: #fff;
            border-radius: 0.5rem;
            border: 1px solid #e0e0e0;
            margin-top: 1rem;
            color: #7f8c8d;
        }
        .filter-section {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        .filter-section .form-control {
            flex: 1 1 200px;
        }
        .filter-section .btn {
            flex: 0 0 auto;
        }
        .sort-control {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
            font-size: 0.9rem;
            color: #555;
        }
        /* Popup Styles */
        .popup-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }
        .popup-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 0.5rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: left; /* Align text to the left in the popup */
            width: 400px; /* Increased width of the popup */
        }
        .close-button {
            margin-top: 20px; /* Increased margin */
            padding: 8px 15px;
            border: none;
            background-color: #007bff;
            color: #fff;
            border-radius: 0.3rem;
            cursor: pointer;
            display: block; /* Make it a block element */
            margin-left: auto; /* Push it to the right */
        }
        .close-button:hover {
            background-color: #0056b3;
        }
        .filter-group {
            margin-bottom: 20px; /* Increased margin between filter groups */
        }
        .filter-group-title {
            font-size: 1rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }
        .filter-options {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }
        .filter-option {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .apply-clear-buttons {
            display: flex;
            justify-content: flex-end; /* Push buttons to the right */
            gap: 10px; /* Space between buttons */
            margin-top: 10px;
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
        <h2 class="section-title">Contract History</h2>
    </section>

    <section class="mb-4">
        <div class="filter-section">
            <input type="text" class="form-control" placeholder="Search contracts...">
            <button class="btn btn-primary" onclick="showPopup()">Filter</button>
        </div>
        <div class="sort-control">
            <span>Sort By:</span>
            <select class="form-select" style="width: auto;">
                <option>Start Date</option>
                <option>End Date</option>
            </select>
            <select class="form-select" style="width: auto;">
                <option>Descending</option>
                <option>Ascending</option>
            </select>
            <span>0 Total</span>
        </div>
    </section>

    <section id="contracts-list">
        <div class="no-contracts-message">
            You don't have any past contracts yet.
        </div>
    </section>
</main>

<footer class="bg-light py-3 border-top">
    <div class="container text-center">
        <p>&copy; 2025 INHIRE. All rights reserved.</p>
    </div>
</footer>

<div id="popupOverlay" class="popup-overlay">
    <div class="popup-content">
        <div class="filter-group">
            <h3 class="filter-group-title">Contract Type</h3>
            <div class="filter-options">
                <label class="filter-option">
                    <input type="radio" name="contractType" value="all" checked> All
                </label>
                <label class="filter-option">
                    <input type="radio" name="contractType" value="hourly"> Hourly
                </label>
                <label class="filter-option">
                    <input type="radio" name="contractType" value="fixedPrice"> Fixed-Price
                </label>
            </div>
        </div>
        <div class="filter-group">
            <h3 class="filter-group-title">Contract Status</h3>
            <div class="filter-options">
                <label class="filter-option">
                    <input type="checkbox" name="contractStatus" value="all"> All
                </label>
                <label class="filter-option">
                    <input type="checkbox" name="contractStatus" value="active"> Active
                </label>
                <label class="filter-option">
                    <input type="checkbox" name="contractStatus" value="ended"> Ended
                </label>
            </div>
        </div>
        <div class="apply-clear-buttons">
            <button class="btn btn-primary" onclick="applyFilters()">Apply Filters</button>
            <button class="btn btn-secondary" onclick="clearFilters()">Clear All Filters</button>
        </div>
        <button class="close-button" onclick="hidePopup()">Close</button>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const findWorkDropdown = document.getElementById('findWorkDropdown');
        const deliverWorkDropdown = document.getElementById('deliverWorkDropdown');
        const navbarNavItems = document.querySelectorAll('.navbar-nav .nav-item');

        if (findWorkDropdown && deliverWorkDropdown) {
            // Remove the original event listeners for "Find Work" and "Deliver Work"
            findWorkDropdown.removeAttribute('href');
            deliverWorkDropdown.removeAttribute('href');
        }
        // Set "Deliver Work" as active
        navbarNavItems.forEach(navItem => navItem.classList.remove('active'));
        const deliverWorkNavItem = Array.from(navbarNavItems).find(navItem => navItem.querySelector('#deliverWorkDropdown'));
        if (deliverWorkNavItem) {
            deliverWorkNavItem.classList.add('active');
        }
    });

    function showPopup() {
        document.getElementById('popupOverlay').style.display = 'flex';
    }

    function hidePopup() {
        document.getElementById('popupOverlay').style.display = 'none';
    }

    function applyFilters() {
        const contractType = document.querySelector('input[name="contractType"]:checked').value;
        const contractStatus = Array.from(document.querySelectorAll('input[name="contractStatus"]:checked')).map(cb => cb.value);

        console.log('Contract Type:', contractType);
        console.log('Contract Statuses:', contractStatus);

        hidePopup();
        alert('Filters applied! (See console for values)');
    }

    function clearFilters() {
        const typeRadios = document.querySelectorAll('input[name="contractType"]');
        typeRadios.forEach(radio => {
            radio.checked = radio.value === 'all';
        });

        const statusCheckboxes = document.querySelectorAll('input[name="contractStatus"]');
        statusCheckboxes.forEach(checkbox => {
            checkbox.checked = false;
        });
    }
</script>
</body>
</html>
