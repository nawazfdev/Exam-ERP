@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Upcoming Exams') }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            @if ($exams->count() > 0)
                @foreach ($exams as $exam)
                    <div class="row align-items-center border p-3 mb-3 shadow-sm rounded bg-light">
                        <div class="col-lg-1 text-center">
                            <svg width="38" height="38" viewBox="0 0 38 38" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M10 0C4.47715 0 0 4.47715 0 10V28C0 33.5228 4.47715 38 10 38H15V18.8752C15 14.3094 19.5836 11.1665 23.8426 12.812L38 18.2819V10C38 4.47715 33.5228 0 28 0H10ZM38 25.7862L22 19.6044V38H28C33.5228 38 38 33.5228 38 28V25.7862Z"
                                      fill="#007bff"/>
                            </svg>
                        </div>

                        <div class="col-lg-5">
                            <div><strong>ID: {{ $exam->id }}</strong></div>
                            <div class="h5">{{ $exam->title }}</div>
                            <div class="text-muted">
                                Group: {{ $exam->group->name ?? __('N/A') }}
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <span class="d-block text-muted">Duration</span>
                            <strong>{{ $exam->duration }} min</strong>
                        </div>

                        <div class="col-lg-2">
                            <span class="d-block text-muted">Questions</span>
                            <strong>{{ $exam->questions_count ?? 'N/A' }}</strong>
                        </div>

                        <div class="col-lg-2 text-end">
                            <a href="{{ route('candidates.exam.instructions', $exam->id) }}" class="btn btn-success btn-sm">
                                <i class="fa fa-play"></i> Take Exam
                            </a>
                        </div>
                    </div>
                @endforeach

                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $exams->links() }}
                </div>
            @else
                <div class="alert alert-info text-center">
                    {{ __('No upcoming exams found.') }}
                </div>
            @endif
        </div>
    </div>
@endsection
