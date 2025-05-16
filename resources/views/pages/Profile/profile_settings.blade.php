<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INHIRE: Your Profile</title>
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
        .profile-large {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1rem;
        }
        .profile-header {
            background-color: #fff;
            padding: 2rem;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            text-align: center;
            margin-bottom: 2rem;
            /* position: relative;  Removed for the button removal */
        }
        .profile-info-section {
            background-color: #fff;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            margin-bottom: 1rem;
        }
        .section-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #2c3e50;
            margin-bottom: 1rem;
        }
        .info-item {
            margin-bottom: 0.75rem;
            color: #555;
        }
        .info-label {
            font-weight: bold;
            margin-right: 0.5rem;
            color: #34495e;
        }
        .skill-tag {
            background-color: #ebebeb;
            color: #333;
            padding: 0.25rem 0.5rem;
            border-radius: 0.5rem;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            font-size: 0.8rem;
            display: inline-block;
        }
        .profile-actions {
            text-align: center;
            margin-top: 1.5rem;
        }
        .profile-actions .btn {
            margin: 0 0.5rem;
        }
        .about-me-text {
            line-height: 1.6;
        }
        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 1rem;
            object-fit: cover;
        }
        .small-description {
            font-size: 0.8rem;
            color: #666;
            margin-bottom: 0;
            line-height: 1.2;
        }
        .text-charge{
            color:#0056b3;
            font-size: 1.2rem;
        }

        /* Styles for the settings button and menu */
        .settings-button {
            /* Removed absolute positioning */
            background: none;
            border: none;
            font-size: 1.2rem;
            color: #555;
            cursor: pointer;
            padding: 0.25rem; /* Add some padding for better click area */
        }

        .settings-button:hover {
            color: #007bff;
        }

        .slide-menu {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            transform: translateX(-100%);
            transition: transform 0.3s ease-in-out;
            z-index: 1000;
            padding-top: 4rem;
        }

        .slide-menu.show {
            transform: translateX(0);
        }

        .slide-menu-header {
            padding: 1rem;
            border-bottom: 1px solid #e0e0e0;
            font-weight: bold;
            color: #2c3e50;
        }

        .slide-menu-items {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .slide-menu-item {
            padding: 1rem;
            border-bottom: 1px solid #f0f0f0;
            color: #555;
            cursor: pointer;
        }

        .slide-menu-item:hover {
            background-color: #f0f0f0;
            color: #007bff;
        }

        .slide-menu-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            font-size: 1rem;
            color: #555;
            cursor: pointer;
            background: none;
            border: none;
            padding: 0.25rem;
        }

        .slide-menu-close:hover {
            color: #007bff;
        }
        .not-active{
            color: rgb(32, 32, 32)
        }

        /* New styles for profile settings page */
        .experience-level-card {
            border-radius: 0.5rem;
            padding: 1rem;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.2s ease;
            border: 1px solid #e0e0e0;
        }
        .experience-level-card:hover {
            background-color: #f0f0f0;
            border-color: #007bff;
        }
        .experience-level-card.active {
            background-color: #e0f7fa;
            border-color: #007bff;
            font-weight: bold;
        }
        .category-item {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid #f0f0f0;
            cursor: pointer;
            transition: background-color 0.2s ease;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .category-item:hover {
            background-color: #f0f0f0;
        }

        .category-item input[type="checkbox"] {
            margin-right: 0.5rem;
        }

        /* New styles for left navigation */
        .left-nav {
            background-color: #fff;
            border-radius: 0.5rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            margin-bottom: 2rem;
            padding: 1rem;
            width: 200px; /* Adjust width as needed */
        }

        .left-nav-items {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .left-nav-item {
            padding: 0.75rem 0;
            border-bottom: 1px solid #f0f0f0;
        }

        .left-nav-item:last-child {
            border-bottom: none;
        }

        .left-nav-link {
            color: #555;
            text-decoration: none;
            display: block;
            padding: 0.5rem 0;
        }

        .left-nav-link:hover {
            color: #007bff;
        }

        .left-nav-item.active .left-nav-link {
            color: #007bff;
            font-weight: bold;
        }
        .visibility-dropdown {
            position: relative;
            display: inline-flex;
            align-items: center;
        }

        .visibility-select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            padding: 0.5rem 2.5rem 0.5rem 0.75rem;
            border-radius: 0.5rem;
            border: 1px solid #e0e0e0;
            background-color: #fff;
            font-size: 1rem;
            color: #555;
            cursor: pointer;
            width: 100%;
        }

        .visibility-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
            outline: none;
        }

        .visibility-dropdown::after {
            content: "";
            position: absolute;
            top: 50%;
            right: 0.75rem;
            transform: translateY(-50%);
            border-top: 0.375rem solid #555;
            border-left: 0.3rem solid transparent;
            border-right: 0.3rem solid transparent;
            pointer-events: none;
        }
        .earnings-info {
            font-size: 0.9rem;
            color: #6c757d;
            margin-top: 0.5rem;
        }
        .category-block {
            display: inline-block;
            background-color: #f0f0f0;
            padding: 0.25rem 0.5rem;
            border-radius: 0.5rem;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            font-size: 0.8rem;
            color: #333;
        }
        .sub-category {
            margin-left: 1.5rem; /* Indent sub-categories */
        }
        /* Styles for the category dropdown */
        .category-select-wrapper {
            position: relative;
            display: inline-flex;
            align-items: center;
            width: 100%;
        }

        .category-select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            padding: 0.5rem 2.5rem 0.5rem 0.75rem;
            border-radius: 0.5rem;
            border: 1px solid #e0e0e0;
            background-color: #fff;
            font-size: 1rem;
            color: #555;
            cursor: pointer;
            width: 100%;
        }

        .category-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
            outline: none;
        }

        .category-select-wrapper::after {
            content: "";
            position: absolute;
            top: 50%;
            right: 0.75rem;
            transform: translateY(-50%);
            border-top: 0.375rem solid #555;
            border-left: 0.3rem solid transparent;
            border-right: 0.3rem solid transparent;
            pointer-events: none;
        }

        .category-dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            right: auto;
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 0.5rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            z-index: 10;
            padding: 0.5rem 0;
            margin-top: 0.25rem;
            width: 100%;
        }

        .category-dropdown-content.show {
            display: block;
        }

        .category-dropdown-item {
            padding: 0.75rem 1rem;
            cursor: pointer;
            white-space: nowrap;
            display: flex;
            align-items: center;
        }

        .category-dropdown-item:hover {
            background-color: #f0f0f0;
            color: #007bff;
        }

        .category-dropdown-item input[type="checkbox"] {
            margin-right: 0.5rem;
        }
        .selected-category-block {
            display: inline-flex;
            align-items: center;
            background-color: #e0f7fa;
            color: #007bff;
            padding: 0.25rem 0.5rem;
            border-radius: 1rem;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
            font-size: 0.8rem;
        }

        .selected-category-block span {
            margin-right: 0.25rem;
        }

        .selected-category-block button {
            background: none;
            border: none;
            color: #007bff;
            cursor: pointer;
            padding: 0;
            font-size: 1rem;
            line-height: 1;
        }

        .selected-category-block button:hover {
            color: #0056b3;
        }

        .radio-option {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: all 0.2s;
        }
        .radio-option:hover {
            border-color: #007bff;
            background-color: #f8f9fa;
        }
        .radio-option.selected {
            border-color: #007bff;
            background-color: #e7f1ff;
        }
        .radio-option input[type="radio"] {
            margin-right: 10px;
        }
        .option-description {
            font-size: 0.9rem;
            color: #6c757d;
            margin-left: 25px;
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
<main class="container py-4">
    <div class="row">
        <div class="col-md-9">
            <div class="profile-info-section">
                <h2 class="section-title">Profile Settings</h2>

                <form action="{{ route('updateProfileSettings') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row mb-4">
                        <label for="last_name" class="info-label">Description</label>
                        <input id="last_name" type="text" class="form-control mb-2" name="desc_title" value="{{ old('desc_title', $user->desc_title) }}" placeholder="Enter description title">
                        <textarea id="last_name" class="form-control" name="desc_text" placeholder="Enter description text">{{ old('desc_text', $user->desc_text) }}</textarea>
                    </div>

                    <div class="row mb-4">
                        <label for="hourly_rate" class="info-label">Hourly Rate</label>
                        <input id="hourly_rate" type="text" class="form-control mb-2 @error('hourly_rate') is-invalid @enderror" name="hourly_rate" value="{{ $user->hourly_rate }}" placeholder="Set hourly rate">
                        @error('hourly_rate')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                    </div>

                    <label class="info-label">Experience Level</label>
                    <div class="row mb-4 radio-option-group">
                        @foreach($experienceLevels as $level)
                            <div class="col-md-4 radio-option" onclick="selectOption(this)">
                                <input type="radio" id="experience_{{ $level->id }}" name="experience_level_id" value="{{ $level->id }}" {{ $user->experience_level_id == $level->id ? 'checked' : '' }} required>
                                <label for="experience_{{ $level->id }}">{{ $level->name }}</label>
                                <div class="option-description">{{ $level->description }}</div>
                            </div>
                        @endforeach
                    </div>

                    <label class="info-label">English Level</label>
                    <div class="row md-4 radio-option-group">
                        @foreach($englishLevels as $level)
                            <div class="col-md-3 radio-option" onclick="selectOption(this)">
                                <input type="radio" id="english_{{ $level->id }}" name="english_level_id" value="{{ $level->id }}" {{ $user->english_level_id == $level->id ? 'checked' : '' }} required>
                                <label for="english_{{ $level->id }}">{{ $level->name }}</label>
                                <div class="option-description">{{ $level->description }}</div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mb-4">
                        <label class="info-label">Skills</label>
                        <div id="selected-categories">
                        </div>
                        <div class="category-select-wrapper" id="category-dropdown-wrapper">
                            <select id="category-dropdown" class="category-select">
                                <option value="">Add a skill</option>
                                @foreach($skills as $skill)
                                    <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @if(empty($userSkills))
                            <p class="small-description">Add categories to help others find your profile.</p>
                        @endif
                    </div>

                    <div id="skills-inputs"></div>

                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                            const skillMap = @json($skills->pluck('name', 'id'));
                            const initialUserSkills = @json($userSkills);

                            const categoryDropdown = document.getElementById('category-dropdown');
                            const selectedCategoriesContainer = document.getElementById('selected-categories');
                            let selectedCategories = new Set(initialUserSkills.map(id => String(id)));

                            function updateSelectedCategoriesDisplay() {
                                selectedCategoriesContainer.innerHTML = ''; // Clear previous display
                                selectedCategories.forEach(category => {
                                    const categoryBlock = document.createElement('div');
                                    categoryBlock.className = 'selected-category-block';
                                    categoryBlock.innerHTML = `
                                        <span>${skillMap[category]}</span>
                                        <button data-category="${category}">x</button>
                                    `;
                                    selectedCategoriesContainer.appendChild(categoryBlock);
                                });

                                // Update the display of the dropdown based on selected categories
                                const dropdownOptions = categoryDropdown.options;
                                for (let i = 0; i < dropdownOptions.length; i++) {
                                    const optionValue = dropdownOptions[i].value;
                                    if (selectedCategories.has(optionValue) && optionValue !== "") {
                                        dropdownOptions[i].disabled = true;
                                    } else {
                                        dropdownOptions[i].disabled = false;
                                    }
                                }

                                const hiddenContainer = document.getElementById('skills-inputs');
                                hiddenContainer.innerHTML = '';       // clear old inputs
                                selectedCategories.forEach(categoryId => {
                                    const input = document.createElement('input');
                                    input.type  = 'hidden';
                                    input.name  = 'user_skills[]';      // snake_case! Laravel will see this as an array
                                    input.value = categoryId;
                                    hiddenContainer.appendChild(input);
                                });
                            }

                            categoryDropdown.addEventListener('change', (event) => {
                                const selectedCategory = event.target.value;
                                if (selectedCategory && !selectedCategories.has(selectedCategory)) {
                                    selectedCategories.add(selectedCategory);
                                    updateSelectedCategoriesDisplay();
                                }
                                // Reset the dropdown to the default option
                                categoryDropdown.value = "";
                            });

                            selectedCategoriesContainer.addEventListener('click', (event) => {
                                if (event.target.tagName === 'BUTTON') {
                                    const categoryToRemove = event.target.dataset.category;
                                    selectedCategories.delete(categoryToRemove);
                                    updateSelectedCategoriesDisplay();
                                }
                            });

                            updateSelectedCategoriesDisplay();
                        });
                    </script>


                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</main>

<footer class="bg-light py-3 border-top">
    <div class="container text-center">
        <p>&copy; 2025 INHIRE. All rights reserved.</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Set "Profile" as active in the navigation
        const navItems = document.querySelectorAll('.navbar-nav .nav-item');
        navItems.forEach(navItem => navItem.classList.remove('active'));
        const profileNavItem = Array.from(navItems).find(navItem => navItem.querySelector('a[href="./profile.html"]'));
        if (profileNavItem) {
            profileNavItem.classList.add('active');
        }


        // Experience level selection
        const experienceCards = document.querySelectorAll('.experience-level-card');
        experienceCards.forEach(card => {
            card.addEventListener('click', function () {
                experienceCards.forEach(c => c.classList.remove('active'));
                this.classList.add('active');
            });
        });
    });

    function selectOption(element) {
        // Remove selected class from all options in this group
        const group = element.closest('.radio-option-group');
        group.querySelectorAll('.radio-option').forEach(opt => {
            opt.classList.remove('selected');
        });

        // Add selected class to clicked option
        element.classList.add('selected');

        // Check the radio input
        const radioInput = element.querySelector('input[type="radio"]');
        radioInput.checked = true;
    }
</script>
</body>
</html>
