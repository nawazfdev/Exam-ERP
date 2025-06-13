@extends('layouts.candidate')

@section('title', 'Dashboard')

@section('content')
<div class="page-header">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col">
                <h1 class="page-title mb-0">
                    <i class="fas fa-tachometer-alt me-2"></i>
                    Dashboard
                </h1>
                <p class="text-muted">Welcome back, Muhammad Nawaz</p>
            </div>
            <div class="col-auto">
                <span class="badge bg-primary fs-6">
                    May,25 2025
                </span>
            </div>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="row mb-4">
    <div class="col-xl-3 col-md-6">
        <div class="stats-card">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                    <div class="bg-primary bg-opacity-10 p-3 rounded">
                        <i class="fas fa-calendar-check text-primary fa-2x"></i>
                    </div>
                </div>
                <div class="flex-grow-1 ms-3">
                    <h3 class="mb-0">3</h3>
                    <p class="text-muted mb-0">Upcoming Exams</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="stats-card">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                    <div class="bg-success bg-opacity-10 p-3 rounded">
                        <i class="fas fa-check-circle text-success fa-2x"></i>
                    </div>
                </div>
                <div class="flex-grow-1 ms-3">
                    <h3 class="mb-0">2</h3>
                    <p class="text-muted mb-0">Passed Exams</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="stats-card">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                    <div class="bg-warning bg-opacity-10 p-3 rounded">
                        <i class="fas fa-clock text-warning fa-2x"></i>
                    </div>
                </div>
                <div class="flex-grow-1 ms-3">
                    <h3 class="mb-0">5</h3>
                    <p class="text-muted mb-0">Total Attempts</p>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="stats-card">
            <div class="d-flex align-items-center">
                <div class="flex-shrink-0">
                    <div class="bg-info bg-opacity-10 p-3 rounded">
                        <i class="fas fa-percentage text-info fa-2x"></i>
                    </div>
                </div>
                <div class="flex-grow-1 ms-3">
                    <h3 class="mb-0">78%</h3>
                    <p class="text-muted mb-0">Average Score</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Row -->
<div class="row">
    <!-- Upcoming Exams -->
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">
                    <i class="fas fa-calendar-alt me-2"></i>
                    Upcoming Exams
                </h5>
                <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body">
                <div class="exam-card mb-3">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="flex-grow-1">
                            <h6 class="mb-1">Laravel Fundamentals</h6>
                            <p class="text-muted mb-2">Learn the basics of Laravel in this introductory test.</p>
                            <div class="d-flex align-items-center text-sm text-muted">
                                <i class="fas fa-clock me-1"></i>
                                <span class="me-3">60 minutes</span>
                                <i class="fas fa-question-circle me-1"></i>
                                <span>50 questions</span>
                            </div>
                        </div>
                        <div class="flex-shrink-0 ms-3">
                            <a href="#" class="btn btn-primary btn-sm">
                                <i class="fas fa-play me-1"></i>
                                Start Exam
                            </a>
                        </div>
                    </div>
                </div>

                <div class="exam-card mb-3">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="flex-grow-1">
                            <h6 class="mb-1">PHP Basics</h6>
                            <p class="text-muted mb-2">A foundational test on PHP syntax and functions.</p>
                            <div class="d-flex align-items-center text-sm text-muted">
                                <i class="fas fa-clock me-1"></i>
                                <span class="me-3">45 minutes</span>
                                <i class="fas fa-question-circle me-1"></i>
                                <span>40 questions</span>
                            </div>
                        </div>
                        <div class="flex-shrink-0 ms-3">
                            <a href="#" class="btn btn-primary btn-sm">
                                <i class="fas fa-play me-1"></i>
                                Start Exam
                            </a>
                        </div>
                    </div>
                </div>

                <div class="exam-card">
                    <div class="d-flex justify-content-between align-items-start">
                        <div class="flex-grow-1">
                            <h6 class="mb-1">HTML & CSS</h6>
                            <p class="text-muted mb-2">Check your front-end basics with this test.</p>
                            <div class="d-flex align-items-center text-sm text-muted">
                                <i class="fas fa-clock me-1"></i>
                                <span class="me-3">30 minutes</span>
                                <i class="fas fa-question-circle me-1"></i>
                                <span>25 questions</span>
                            </div>
                        </div>
                        <div class="flex-shrink-0 ms-3">
                            <a href="#" class="btn btn-primary btn-sm">
                                <i class="fas fa-play me-1"></i>
                                Start Exam
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">
                    <i class="fas fa-history me-2"></i>
                    Recent Activity
                </h5>
            </div>
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <div class="flex-shrink-0">
                        <div class="bg-success bg-opacity-10 p-2 rounded">
                            <i class="fas fa-check text-success"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-1 fs-6">PHP Basics</h6>
                        <div class="d-flex justify-content-between">
                            <small class="text-muted">2 days ago</small>
                            <small class="text-success fw-bold">38/40</small>
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center mb-3">
                    <div class="flex-shrink-0">
                        <div class="bg-danger bg-opacity-10 p-2 rounded">
                            <i class="fas fa-times text-danger"></i>
                        </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                        <h6 class="mb-1 fs-6">HTML & CSS</h6>
                        <div class="d-flex justify-content-between">
                            <small class="text-muted">4 days ago</small>
                            <small class="text-danger fw-bold">18/25</small>
                        </div>
                    </div>
                </div>

                <div class="text-center py-3">
                    <i class="fas fa-history fa-2x text-muted mb-2"></i>
                    <p class="text-muted mb-0">No more recent activity</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
