@extends('layouts.candidate')

@section('title', 'Taking Exam')

@section('content')
<div class="container-fluid">
    <!-- Exam Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mb-1">{{ $exam->title ?? 'Exam Title' }}</h4>
                            <small>Duration: {{ $exam->duration ?? 'N/A' }} minutes</small>
                        </div>
                        <div class="text-right">
                            <h5 class="mb-0">Question {{ $currentQuestionIndex }} of {{ $questions->count() }}</h5>
                            <div class="progress mt-2" style="width: 200px;">
                                <div class="progress-bar" role="progressbar" 
                                     style="width: {{ ($currentQuestionIndex / $questions->count()) * 100 }}%"
                                     aria-valuenow="{{ $currentQuestionIndex }}" 
                                     aria-valuemin="0" 
                                     aria-valuemax="{{ $questions->count() }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Question Card -->
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-light border-0">
                    <div class="d-flex align-items-center">
                        <span class="badge badge-primary badge-pill mr-2">Q{{ $currentQuestionIndex }}</span>
                        <h6 class="mb-0 text-muted">{{ ucfirst(str_replace('_', ' ', $question->question_type)) }}</h6>
                    </div>
                </div>
                
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('candidates.exam.submitExam', $exam->id) }}" id="answerForm">
                        @csrf
                        <input type="hidden" name="question_id" value="{{ $question->id }}">
                        <input type="hidden" name="question" value="{{ $currentQuestionIndex }}">

                        <!-- Question Text -->
                        <div class="mb-4">
                            <div class="question-text p-3 bg-light rounded">
                                <h5 class="mb-0">{{ $question->question_text }}</h5>
                            </div>
                        </div>

                        <!-- Answer Options -->
                        <div class="answer-options">
                            @php
                                // Safely decode options if it's not already an array
                                $options = is_array($question->options) ? $question->options : json_decode($question->options, true);
                                $currentAnswer = session("answer_{$question->id}");
                            @endphp

                            @if($question->question_type === 'multiple_choice' && is_array($options))
                                @foreach($options as $index => $option)
                                    <div class="form-check mb-3 option-card">
                                        <input class="form-check-input" type="radio" name="answer" 
                                               id="option_{{ $index }}" value="{{ $option }}"
                                               {{ ($currentAnswer == $option) ? 'checked' : '' }}>
                                        <label class="form-check-label w-100 p-3" for="option_{{ $index }}">
                                            <span class="option-letter">{{ chr(65 + $index) }}.</span>
                                            {{ $option }}
                                        </label>
                                    </div>
                                @endforeach

                            @elseif($question->question_type === 'true_false')
                                <div class="form-check mb-3 option-card">
                                    <input class="form-check-input" type="radio" name="answer" 
                                           id="true" value="True"
                                           {{ ($currentAnswer == 'True') ? 'checked' : '' }}>
                                    <label class="form-check-label w-100 p-3" for="true">
                                        <span class="option-letter">A.</span>
                                        <i class="fas fa-check text-success mr-2"></i>True
                                    </label>
                                </div>
                                <div class="form-check mb-3 option-card">
                                    <input class="form-check-input" type="radio" name="answer" 
                                           id="false" value="False"
                                           {{ ($currentAnswer == 'False') ? 'checked' : '' }}>
                                    <label class="form-check-label w-100 p-3" for="false">
                                        <span class="option-letter">B.</span>
                                        <i class="fas fa-times text-danger mr-2"></i>False
                                    </label>
                                </div>

                            @elseif($question->question_type === 'fill_in_the_blank')
                                <div class="form-group">
                                    <input type="text" name="answer" class="form-control form-control-lg" 
                                           placeholder="Type your answer here..."
                                           value="{{ $currentAnswer }}" id="textAnswer">
                                </div>

                            @else
                                <div class="alert alert-warning">
                                    <i class="fas fa-exclamation-triangle mr-2"></i>
                                    Invalid question type or no options available.
                                </div>
                            @endif
                        </div>

                        <!-- Navigation Buttons -->
                        <div class="d-flex justify-content-between mt-5 pt-3 border-top">
                            <div>
                                @if ($currentQuestionIndex > 1)
                                    <a href="{{ route('candidates.exam.start', ['exam' => $exam->id, 'question' => $currentQuestionIndex - 1]) }}" 
                                       class="btn btn-outline-secondary btn-lg">
                                        <i class="fas fa-chevron-left mr-2"></i>Previous
                                    </a>
                                @endif
                            </div>

                            <div>
                                @if ($currentQuestionIndex < $questions->count())
                                    <button type="button" onclick="saveAndNext()" class="btn btn-primary btn-lg">
                                        Next<i class="fas fa-chevron-right ml-2"></i>
                                    </button>
                                @else
                                    <button type="submit" class="btn btn-success btn-lg" onclick="return confirmSubmit()">
                                        <i class="fas fa-check mr-2"></i>Submit Exam
                                    </button>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Question Navigator -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Question Navigator</h6>
                </div>
                <div class="card-body">
                    <div class="question-navigator">
                        @for ($i = 1; $i <= $questions->count(); $i++)
                            @php
                                $questionObj = $questions[$i-1];
                                $hasAnswer = session("answer_{$questionObj->id}") !== null;
                            @endphp
                            <a href="{{ route('candidates.exam.start', ['exam' => $exam->id, 'question' => $i]) }}" 
                               class="btn btn-sm mr-2 mb-2 
                                      {{ $i == $currentQuestionIndex ? 'btn-primary' : ($hasAnswer ? 'btn-success' : 'btn-outline-secondary') }}">
                                {{ $i }}
                            </a>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.option-card {
    border: 2px solid #e9ecef;
    border-radius: 8px;
    transition: all 0.3s ease;
    cursor: pointer;
}

.option-card:hover {
    border-color: #007bff;
    background-color: #f8f9fa;
}

.option-card input[type="radio"]:checked + label {
    background-color: #007bff;
    color: white;
    border-radius: 6px;
}

.option-letter {
    font-weight: bold;
    margin-right: 10px;
    display: inline-block;
    width: 25px;
}

.question-text {
    font-size: 1.1em;
    line-height: 1.6;
}

.question-navigator .btn {
    width: 40px;
    height: 40px;
}

.progress {
    height: 8px;
    border-radius: 4px;
}

#textAnswer {
    border: 2px solid #e9ecef;
    border-radius: 8px;
    padding: 15px;
    font-size: 1.1em;
}

#textAnswer:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}
</style>

<script>
function saveAndNext() {
    // Auto-save the current answer before moving to next question
    const form = document.getElementById('answerForm');
    const formData = new FormData(form);
    
    // Save answer via AJAX (optional)
    fetch(form.action, {
        method: 'POST',
        body: formData,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    }).then(() => {
        // Navigate to next question
        window.location.href = "{{ route('candidates.exam.start', ['exam' => $exam->id, 'question' => $currentQuestionIndex + 1]) }}";
    }).catch(() => {
        // If AJAX fails, submit form normally
        form.submit();
    });
}

function confirmSubmit() {
    return confirm('Are you sure you want to submit this exam? You cannot change your answers after submission.');
}

// Auto-save functionality for text inputs
document.getElementById('textAnswer')?.addEventListener('input', function() {
    // Debounced auto-save (optional)
    clearTimeout(this.saveTimeout);
    this.saveTimeout = setTimeout(() => {
        sessionStorage.setItem('answer_{{ $question->id }}', this.value);
    }, 1000);
});

// Keyboard navigation
document.addEventListener('keydown', function(e) {
    if (e.key === 'ArrowLeft' && {{ $currentQuestionIndex }} > 1) {
        window.location.href = "{{ route('candidates.exam.start', ['exam' => $exam->id, 'question' => $currentQuestionIndex - 1]) }}";
    } else if (e.key === 'ArrowRight' && {{ $currentQuestionIndex }} < {{ $questions->count() }}) {
        saveAndNext();
    }
});
</script>
@endsection