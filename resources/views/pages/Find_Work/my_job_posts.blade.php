@extends('layouts.app')

@section('title', 'My Job Posts - INHIRE')

@section('content')
    <section class="mb-4">
        <h2 class="section-title">My Job Posts</h2>
        <p class="lead">Manage your job posts.</p>
    </section>
    <section class="mb-4 text-center">
        <a href="{{ route('createjobpost.createjobpost') }}" class="btn btn-primary" title="Post a new job">
            <b>+ Post a job</b>
        </a>
    </section>
    <section class="job-post-section">
        <h3 class="job-main-title">Your Job Posts</h3>
        <p class="job-post-count">Number of job posts: <span id="job-post-count">1</span></p>
        <div id="job-posts-list">
            <div class="job-post-card">
                <h3 class="job-title">Software Engineer</h3>
                <div class="job-summary">
                    Posted By: Edmark Talingting
                </div>
                <div class="job-summary">
                    Tags: <span class="tag">Hourly</span><span class="tag">Developer</span>
                </div>
                <p class="job-description">Seeking a skilled Software Engineer to build and maintain web applications.</p>
                <div class="job-details">
                    Posted: 2 days ago
                </div>
                <a href="/Views/Job_Post/view_mypost.html" class="btn btn-primary view-more-button">See Job Post</a>
            </div>
        </div>
    </section>
@endsection
