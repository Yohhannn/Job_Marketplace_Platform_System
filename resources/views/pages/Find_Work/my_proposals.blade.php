@extends('layouts.app')

@section('title', 'My Proposals - INHIRE')

@section('content')
    <section class="mb-4">
        <h2 class="section-title">My Proposals</h2>
        <p class="lead">Manage your proposals and track their status.</p>
    </section>

    <section class="mb-4">
        <nav class="nav nav-tabs">
            <a class="nav-link active" href="#active-proposals" data-bs-toggle="tab">Active</a>
            <a class="nav-link" href="#archived-proposals" data-bs-toggle="tab">Archived</a>
        </nav>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="active-proposals">
                <div class="proposal-section">
                    <h3 class="proposal-title">Active Proposals</h3>
                    <p class="proposal-count">Number of active proposals: 0</p>
                    <div id="active-proposals-list">
                        <div class="proposal-card">
                            <p>This section will list your active proposals.</p>
                        </div>
                    </div>
                </div>
                <div class="proposal-section">
                    <h3 class="proposal-title">Submitted Proposals</h3>
                    <p class="proposal-count">Number of submitted proposals: 0</p>
                    <div id="submitted-proposals-list">
                        <div class="proposal-card">
                            <p>This section will list your submitted proposals.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="archived-proposals">
                <div class="proposal-section">
                    <h3 class="proposal-title">Archived Proposals</h3>
                    <p class="proposal-count">Number of archived proposals: 0</p>
                    <div id="archived-proposals-list">
                        <div class="proposal-card">
                            <p>This section will list your archived proposals.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
