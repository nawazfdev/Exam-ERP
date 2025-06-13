@extends('layouts.candidate')

@section('title', 'Upcoming Exams')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Upcoming Exams') }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <span class="text-muted">Total Exams: {{ $exams->total() }}</span>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            @if ($exams->count() > 0)
                @foreach ($exams as $exam)
                    <div class="card mb-3 shadow-sm">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-lg-1 text-center">
                                    <div class="exam-icon">
                                        <i class="fas fa-file-alt fa-2x text-primary"></i>
                                    </div>
                                </div>

                                <div class="col-lg-5">
                                    <div class="mb-1">
                                        <span class="badge badge-secondary">ID: {{ $exam->id }}</span>
                                        @if($exam->availability)
                                            <span class="badge badge-success">Available</span>
                                        @else
                                            <span class="badge badge-warning">Not Available</span>
                                        @endif
                                    </div>
                                    <h5 class="mb-1">{{ $exam->title }}</h5>
                                    <p class="text-muted mb-1">
                                        <i class="fas fa-users"></i> Group: {{ $exam->group->name ?? __('N/A') }}
                                    </p>
                                    <p class="text-muted mb-0">
                                        <i class="fas fa-building"></i> Organization: {{ $exam->organization->name ?? __('N/A') }}
                                    </p>
                                    @if($exam->description)
                                        <p class="text-muted mt-2 small">{{ Str::limit($exam->description, 100) }}</p>
                                    @endif
                                </div>

                                <div class="col-lg-2">
                                    <div class="text-center">
                                        <span class="d-block text-muted small">Duration</span>
                                        <strong class="text-primary">
                                            <i class="fas fa-clock"></i> {{ $exam->duration }} min
                                        </strong>
                                    </div>
                                </div>

                                <div class="col-lg-2">
                                    <div class="text-center">
                                        <span class="d-block text-muted small">Questions</span>
                                        <strong class="text-info">
                                            <i class="fas fa-question-circle"></i> {{ $exam->questions_count ?? 'N/A' }}
                                        </strong>
                                    </div>
                                </div>

                                <div class="col-lg-2 text-center">
                                    @if($exam->availability)
                                        <a href="{{ route('candidates.exam.instructions', $exam->id) }}" 
                                           class="btn btn-success btn-sm mb-1">
                                            <i class="fas fa-play"></i> Take Exam
                                        </a>
                                        @if($exam->exam_price && $exam->exam_price > 0)
                                            <div class="text-success small">
                                                <i class="fas fa-tag"></i> ${{ number_format($exam->exam_price, 2) }}
                                            </div>
                                        @else
                                            <div class="text-success small">
                                                <i class="fas fa-gift"></i> Free
                                            </div>
                                        @endif
                                    @else
                                        <button class="btn btn-secondary btn-sm" disabled>
                                            <i class="fas fa-lock"></i> Unavailable
                                        </button>
                                    @endif
                                </div>
                            </div>

                            <!-- Additional Exam Features -->
                            @if($exam->allow_retake || $exam->proctoring || $exam->system_check)
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="d-flex flex-wrap">
                                            @if($exam->allow_retake)
                                                <span class="badge badge-info mr-1 mb-1">
                                                    <i class="fas fa-redo"></i> Retake Allowed ({{ $exam->retake_count ?? 'Unlimited' }})
                                                </span>
                                            @endif
                                            @if($exam->proctoring)
                                                <span class="badge badge-warning mr-1 mb-1">
                                                    <i class="fas fa-video"></i> Proctored
                                                </span>
                                            @endif
                                            @if($exam->system_check)
                                                <span class="badge badge-primary mr-1 mb-1">
                                                    <i class="fas fa-desktop"></i> System Check Required
                                                </span>
                                            @endif
                                            @if($exam->allow_review)
                                                <span class="badge badge-success mr-1 mb-1">
                                                    <i class="fas fa-eye"></i> Review Allowed
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach

                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $exams->links() }}
                </div>
            @else
                <div class="alert alert-info text-center">
                    <i class="fas fa-info-circle fa-2x mb-3"></i>
                    <h5>{{ __('No upcoming exams found.') }}</h5>
                    <p class="mb-0">{{ __('There are currently no exams available for your group. Please check back later or contact your organization administrator.') }}</p>
                </div>
            @endif
        </div>
    </div>

    <style>
        .exam-icon {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 50%;
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }
        
        .exam-icon i {
            color: white !important;
        }
        
        .card {
            transition: transform 0.2s;
            border: none;
            border-left: 4px solid #007bff;
        }
        
        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1) !important;
        }
        
        .badge {
            font-size: 0.75em;
        }
    </style>
@endsection