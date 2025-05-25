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
        
        <!-- Total Earnings Summary -->
        @php
            $totalEarnings = $contracts->sum('pay_amount');
            $completedCount = $contracts->count();
        @endphp
        <div class="alert alert-info">
            <strong>Summary:</strong> 
            {{ $completedCount }} completed contracts | 
            Total Earnings: ${{ number_format($totalEarnings, 2) }}
        </div>
    </section>

    <section class="mb-4">
    <div class="filter-section">
        <input type="text" id="searchInput" class="form-control" placeholder="Search contracts..." 
               value="{{ request('search') }}" onkeyup="filterContracts()">
        <button class="btn btn-primary" onclick="showPopup()">Filter</button>
    </div>
    <div class="sort-control">
        <span>Sort By:</span>
        <select class="form-select" style="width: auto;" onchange="sortContracts()" id="sortField">
            <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Start Date</option>
            <option value="completed_at" {{ request('sort') == 'completed_at' ? 'selected' : '' }}>End Date</option>
            <option value="pay_amount" {{ request('sort') == 'pay_amount' ? 'selected' : '' }}>Payment Amount</option>
            <option value="job_title" {{ request('sort') == 'job_title' ? 'selected' : '' }}>Job Title</option>
            <option value="client_name" {{ request('sort') == 'client_name' ? 'selected' : '' }}>Client Name</option>
        </select>
        <select class="form-select" style="width: auto;" onchange="sortContracts()" id="sortDirection">
            <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Descending</option>
            <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>Ascending</option>
        </select>
        <span>{{ $contracts->count() }} Total</span>
    </div>
</section>

    <section id="contracts-list">
        @if($contracts->count() > 0)
            @foreach($contracts as $contract)
                <div class="contract-card" data-type="{{ $contract->job->type }}" data-status="completed">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <h4 class="contract-title">
                                {{ $contract->job->title }}
                                <span class="badge bg-secondary ms-2">
                                    {{ ucfirst($contract->job->type) }}
                                </span>
                            </h4>
                            <p class="contract-details">
                                <strong>Client:</strong> {{ $contract->job->user->first_name }} {{ $contract->job->user->last_name }}<br>
                                <strong>Amount:</strong> ${{ number_format($contract->pay_amount, 2) }}<br>
                                <strong>Completed:</strong> {{ $contract->created_at->format('M d, Y') }}<br>
                            </p>
                        </div>
                        <div>
                            <a href="{{ route('contract.review', ['contract_id' => $contract->id,'route' => 'review']) }}" 
                               class="btn btn-primary">
                                Submit Review
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="no-contracts-message text-center text-muted">
                You don't have any completed contracts yet.
                <br>
                <a href="{{ route('home') }}" class="btn btn-primary mt-2">Search for new projects</a>
            </div>
        @endif
    </section>
</main>

<footer class="bg-light py-3 border-top">
    <div class="container text-center">
        <p>&copy; 2025 INHIRE. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Set "Deliver Work" as active
        const navbarNavItems = document.querySelectorAll('.navbar-nav .nav-item');
        navbarNavItems.forEach(navItem => navItem.classList.remove('active'));
        const deliverWorkNavItem = Array.from(navbarNavItems).find(navItem => 
            navItem.querySelector('a[href*="deliverwork"]'));
        if (deliverWorkNavItem) {
            deliverWorkNavItem.classList.add('active');
        }

        // Attach sort event listeners
        document.getElementById('sortField').addEventListener('change', sortAndFilterContracts);
        document.getElementById('sortDirection').addEventListener('change', sortAndFilterContracts);
        document.getElementById('searchInput').addEventListener('input', sortAndFilterContracts);
    });

    function showPopup() {
        document.getElementById('popupOverlay').style.display = 'flex';
    }

    function hidePopup() {
        document.getElementById('popupOverlay').style.display = 'none';
    }

    function applyFilters() {
        const contractType = document.querySelector('input[name="contractType"]:checked').value;
        const ratings = Array.from(document.querySelectorAll('input[name="ratingFilter"]:checked')).map(cb => cb.value);
        // Filter logic would go here (could be AJAX or client-side filtering)
        console.log('Filters applied:', { contractType, ratings });
        hidePopup();
    }

    function clearFilters() {
        document.querySelectorAll('input[type="radio"], input[type="checkbox"]').forEach(input => {
            if (input.name === 'contractType' && input.value === 'all') {
                input.checked = true;
            } else if (input.type === 'checkbox') {
                input.checked = false;
            }
        });
    }

    // Collect all contract cards into an array for sorting/filtering
    function getContractDataFromDOM() {
        const cards = Array.from(document.querySelectorAll('.contract-card'));
        return cards.map(card => {
            const title = card.querySelector('.contract-title')?.childNodes[0]?.textContent.trim() || '';
            const type = card.getAttribute('data-type') || '';
            const client = card.querySelector('.contract-details')?.innerHTML.match(/Client:<\/strong>\s*([^<]*)<br>/i)?.[1]?.trim() || '';
            const amount = parseFloat(card.querySelector('.contract-details')?.innerHTML.match(/Amount:<\/strong>\s*\$([0-9.,]+)/i)?.[1]?.replace(/,/g, '') || 0);
            const completed = card.querySelector('.contract-details')?.innerHTML.match(/Completed:<\/strong>\s*([^<]*)<br>/i)?.[1]?.trim() || '';
            return { card, title, type, client, amount, completed };
        });
    }

    function sortAndFilterContracts() {
        const sortField = document.getElementById('sortField').value;
        const sortDirection = document.getElementById('sortDirection').value;
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();

        let contracts = getContractDataFromDOM();

        // Filter by search
        contracts = contracts.filter(c =>
            c.title.toLowerCase().includes(searchTerm) ||
            c.client.toLowerCase().includes(searchTerm) ||
            c.amount.toString().includes(searchTerm) ||
            c.type.toLowerCase().includes(searchTerm)
        );

        // Sort
        contracts.sort((a, b) => {
            let valA, valB;
            switch (sortField) {
                case 'job_title':
                    valA = a.title.toLowerCase();
                    valB = b.title.toLowerCase();
                    break;
                case 'client_name':
                    valA = a.client.toLowerCase();
                    valB = b.client.toLowerCase();
                    break;
                case 'pay_amount':
                    valA = a.amount;
                    valB = b.amount;
                    break;
                case 'created_at':
                    valA = Date.parse(a.completed) || 0;
                    valB = Date.parse(b.completed) || 0;
                    break;
                case 'completed_at':
                    valA = Date.parse(a.completed) || 0;
                    valB = Date.parse(b.completed) || 0;
                    break;
                default:
                    valA = a.title.toLowerCase();
                    valB = b.title.toLowerCase();
            }
            if (valA < valB) return sortDirection === 'asc' ? -1 : 1;
            if (valA > valB) return sortDirection === 'asc' ? 1 : -1;
            return 0;
        });

        // Reorder DOM elements based on sorted contracts
        const list = document.getElementById('contracts-list');
        contracts.forEach(c => list.appendChild(c.card));

        // Hide all cards, then show only filtered/sorted
        document.querySelectorAll('.contract-card').forEach(card => card.style.display = 'none');
        contracts.forEach(c => c.card.style.display = '');

        // Update count
        document.querySelector('.sort-control span:last-child').textContent = `${contracts.length} Total`;
    }
</script>
</body>
</html>