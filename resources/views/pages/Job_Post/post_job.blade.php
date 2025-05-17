<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post a Job - INHIRE</title>
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
        .job-post-section {
            background-color: #fff;
            border: 1px solid #e0e0e0;
            border-radius: 0.5rem;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        }
        .job-post-title {
            font-size: 1.1rem;
            color: #34495e;
            margin-bottom: 0.5rem;
        }
        .job-post-count {
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

        .job-post-section p{
            margin-bottom: 0;
        }
        .btn-outline-primary {
            color: #007bff;
            border-color: #007bff;
        }

        .btn-outline-primary:hover {
            background-color: #007bff;
            color: #fff;
        }

        .status-tag {
            display: inline-block;
            padding: 0.25rem 0.5rem;
            border-radius: 0.5rem;
            font-size: 0.8rem;
            font-weight: 500;
            color: #fff;
            background-color: #28a745; /* Default: Green for Active */
            margin-bottom: 0.5rem;
        }
        .status-in-progress {
            background-color: #ffc107; /* Yellow for In Progress */
            color: #343a40;
        }
        .required-label::after {
            content: " *";
            color: red;
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
        <h2 class="section-title">Post a Job</h2>
        <p class="lead">Fill out the form below to create a job posting.</p>
    </section>

    <form class="job-post-form" id="postJobForm" method="POST" action="{{ route('createJob') }}">
    @csrf
        <div class="mb-3">
            <label for="title" class="form-label required-label">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Enter job title" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label required-label">Description</label>
            <textarea class="form-control" name="description" id="description" rows="4" placeholder="Enter job description" required></textarea>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="jobType" class="form-label required-label">Job Type</label>
                <select class="form-select" id="jobType" name="jobType" required>
                    <option value="" disabled selected>Select job type</option>
                    <option value="hourly">Hourly</option>
                    <option value="fixed-price">Fixed Price</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="jobRole" class="form-label required-label">Job Role</label>
                <select class="form-select job-role-select" id="jobRole" name="role_id" required>
                    <option value="" disabled selected>Select job role</option>
                    @foreach ($roleCategories as $category)
                        <optgroup label="{{ $category->name }}">
                            @foreach ($category->roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="expLevel" class="form-label required-label">Experience Level</label>
                <select class="form-select" id="expLevel" name="experience_level_id" required>
                    <option value="" disabled selected>Select experience level</option>
                    @foreach ($experienceLevels as $level)
                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="engLevel" class="form-label">English Level</label>
                <select class="form-select" id="engLevel" name="english_level_id">
                    <option value="" disabled selected>Select English level</option>
                    @foreach ($englishLevels as $level)
                        <option value="{{ $level->id }}">{{ $level->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="jobScope" class="form-label required-label">Job Scope</label>
                <select class="form-select" id="jobScope" name="jobScope" required>
                    <option value="" disabled selected>Select job scope</option>
                    <option value="one-time">One-time</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="complex">Complex</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="noOfHires" class="form-label required-label">Number of Hires</label>
                <input type="number" class="form-control" name="no_hires" id="noOfHires" value="1" min="1" required>
            </div>
            <div class="col-md-6 mt-3" hidden id="slry">
                <label for="salary" class="form-label required-label">Salary</label>
                <div class="input-group">
                    <span class="input-group-text">₱</span>
                    <input type="number" class="form-control" name="salary" id="sal" placeholder="Enter salary amount" min="0">
                </div>
            </div>
            <div class="col-md-6 mt-3" hidden id="min">
                <label for="salary" class="form-label required-label">Hourly rate minimum</label>
                <div class="input-group">
                    <span class="input-group-text">₱</span>
                    <input type="number" class="form-control" name="rate_min" id="rate_min" placeholder="Enter hourly rate minimum" min="0">
                </div>
            </div>
            <div class="col-md-6 mt-3" hidden id="max">
                <label for="salary" class="form-label required-label">Hourly rate maximum</label>
                <div class="input-group">
                    <span class="input-group-text">₱</span>
                    <input type="number" class="form-control" name="rate_max" id="rate_max" placeholder="Enter hourly rate maximum" min="0">
                </div>
            </div>
            <div class="col-md-6 mt-3" hidden id="limit">
                <label for="salary" class="form-label required-label">Weekly hours limit</label>
                <div class="input-group">
                    <input type="number" class="form-control" name="weekly_hours_limit" id="hours_limit" placeholder="Enter weekly hours limit" min="0">
                </div>
            </div>
            <div class="col-md-6" hidden id="duration">
                <label for="duration" class="form-label">Work duration</label>
                <select class="form-select"  name="duration_id">
                    <option value="" disabled selected>Select work Duration</option>
                    @foreach ($duration as $dur)
                        <option value="{{ $dur->id }}">{{ $dur->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <a href="{{ route('findwork.myjobposts') }}" class="btn btn-secondary">Return back</a>
        <button type="submit" class="btn btn-primary">Post Job</button>
    </form>
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
        const findWorkDropdown = document.getElementById('findWorkDropdown');
        const deliverWorkDropdown = document.getElementById('deliverWorkDropdown');
        const max = document.getElementById('max');
        const jobType = document.getElementById('jobType');
        const min = document.getElementById('min');
        const duration = document.getElementById('duration');
        const salary = document.getElementById('slry');
        const limit = document.getElementById('limit');
        const navbarNavItems = document.querySelectorAll('.navbar-nav .nav-item');

        if (findWorkDropdown && deliverWorkDropdown) {
            // Remove the original event listeners for "Find Work" and "Deliver Work"
            findWorkDropdown.removeAttribute('href');
            deliverWorkDropdown.removeAttribute('href');
        }
        jobType.addEventListener('change', () => {
            if (jobType.value === 'hourly') {
                duration.hidden = false;
                max.hidden = false;
                min.hidden = false;
                limit.hidden = false;
                salary.hidden = true;
            } else if (jobType.value === 'fixed-price') {
                salary.hidden = false;
                duration.hidden = true;
                limit.hidden = true;
                max.hidden = true;
                min.hidden = true;
            }
        });

        

        // Set "Find Work" as active by default
        navbarNavItems.forEach(navItem => navItem.classList.remove('active'));
        const findWorkNavItem = Array.from(navbarNavItems).find(navItem => navItem.querySelector('#findWorkDropdown'));
        if (findWorkNavItem) {
            findWorkNavItem.classList.add('active');
        }

        // Handle form submission
    });
</script>
</body>
</html>
