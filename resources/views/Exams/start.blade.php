@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4">{{ $exam->title ?? 'Exam Title' }}</h2>
        <h5>Question {{ $currentQuestionIndex }} of {{ $questions->count() }}</h5>

        <form method="POST" action="{{ route('candidates.exam.storeAnswer', $exam->id) }}">
            @csrf
            <input type="hidden" name="question_id" value="{{ $question->id }}">

            <div class="mb-3">
                <label class="form-label">
                    <strong>{{ $question->question_text }}</strong>
                </label>

                @php
                    // Safely decode options if it's not already an array
                    $options = is_array($question->options) ? $question->options : json_decode($question->options, true);
                @endphp

                @if($question->question_type === 'multiple_choice' && is_array($options))
                    @foreach($options as $index => $option)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="answer" id="option_{{ $index }}" value="{{ $option }}"
                                {{ (session("answer_{$question->id}") == $option) ? 'checked' : '' }}>
                            <label class="form-check-label" for="option_{{ $index }}">
                                {{ $option }}
                            </label>
                        </div>
                    @endforeach

                @elseif($question->question_type === 'true_false')
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answer" id="true" value="True"
                               {{ (session("answer_{$question->id}") == 'True') ? 'checked' : '' }}>
                        <label class="form-check-label" for="true">True</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="answer" id="false" value="False"
                               {{ (session("answer_{$question->id}") == 'False') ? 'checked' : '' }}>
                        <label class="form-check-label" for="false">False</label>
                    </div>

                @elseif($question->question_type === 'fill_in_the_blank')
                    <input type="text" name="answer" class="form-control" placeholder="Type your answer here"
                           value="{{ session("answer_{$question->id}") }}">

                @else
                    <p class="text-danger">Invalid question type.</p>
                @endif
            </div>

            <div class="d-flex justify-content-between mt-4">
                @if ($currentQuestionIndex > 1)
                    <a href="{{ route('candidates.exam.start', ['exam' => $exam->id, 'question' => $currentQuestionIndex - 1]) }}" class="btn btn-secondary">Previous</a>
                @endif

                @if ($currentQuestionIndex < $questions->count())
                    <!-- Next button that redirects to the next question without submitting the form -->
                    <a href="{{ route('candidates.exam.start', ['exam' => $exam->id, 'question' => $currentQuestionIndex + 1]) }}" class="btn btn-primary">Next</a>
                @else
                    <button type="submit" class="btn btn-success">Submit Exam</button>
                @endif
            </div>
        </form>
    </div>
</div>
@endsection
