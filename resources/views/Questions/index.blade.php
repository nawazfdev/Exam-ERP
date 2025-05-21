@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Questions List</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('Questions.create') }}" class="btn btn-success">Add New Question</a>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Exam</th>
                            <th>Question Type</th>
                            <th>Question</th>
                            <th>Correct Answer</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($questions as $index => $question)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $question->exam->title ?? 'N/A' }}</td>
                                <td>{{ ucwords(str_replace('_', ' ', $question->question_type)) }}</td>
                                <td>{{ Str::limit($question->question_text, 50) }}</td>
                                <td>
                                    @php
                                        // Ensure $options is properly decoded if it's a string (JSON format)
                                        $options = is_string($question->options) ? json_decode($question->options, true) : $question->options;
                                        $correct = $question->correct_option;
                                        $correctAnswer = '';

                                        if (is_array($options)) {
                                            // For options that are numeric and available in the options array
                                            if (is_numeric($correct) && isset($options[$correct])) {
                                                $correctAnswer = $options[$correct];
                                            }
                                            // For true/false questions
                                            elseif (in_array($correct, ['True', 'False'])) {
                                                $correctAnswer = $correct;
                                            }
                                            // Default case for fill-in-the-blank or paragraph questions
                                            else {
                                                $correctAnswer = $correct;
                                            }
                                        } else {
                                            $correctAnswer = $correct;
                                        }
                                    @endphp
                                    {{ $correctAnswer }}
                                </td>
                                <td>
                                    <a href="{{ route('Questions.edit', $question->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <form action="{{ route('Questions.destroy', $question->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Are you sure?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No questions found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-3">
                    {{ $questions->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
