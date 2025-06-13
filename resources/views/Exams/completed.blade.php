@extends('layouts.candidate')

@section('title', 'Exam Completed')

@section('content')
<div class="container mt-5">
    <div class="alert alert-success">
        <h2>Exam Completed Successfully!</h2>
        <p>Thank you for completing the exam.</p>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <a href="" class="btn btn-primary mt-3">Go to Dashboard</a>
        <a href="" class="btn btn-secondary mt-3">View Result</a>
    </div>
</div>
@endsection
