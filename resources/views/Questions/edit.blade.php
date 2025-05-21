@extends('layouts.app')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Edit Question</h1>
            </div>
            <div class="col-sm-6 text-right">
                <a href="{{ route('Questions.index') }}" class="btn btn-primary">Back to Questions</a>
            </div>
        </div>
    </div>
</div>

<div class="content">
    <div class="container-fluid">
        <form action="{{ route('Questions.update', $question->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card">
                <div class="card-body">

                    <!-- Exam -->
                    <div class="mb-3">
                        <label class="form-label">Exam</label>
                        <select name="exam_id" class="form-control" required>
                            @foreach($exams as $exam)
                                <option value="{{ $exam->id }}" {{ $question->exam_id == $exam->id ? 'selected' : '' }}>
                                    {{ $exam->title }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Question Type -->
                    <div class="mb-3">
                        <label class="form-label">Question Type</label>
                        <select name="question_type" id="questionType" class="form-control" required>
                            @foreach($questionCategories as $category)
                                @php
                                    $value = preg_replace('/[^a-z0-9]+/', '_', strtolower($category->name));
                                @endphp
                                <option value="{{ $value }}" {{ $value == $question->question_type ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Question Text -->
                    <div class="mb-3">
                        <label class="form-label">Question</label>
                        <textarea name="question_text" class="form-control" rows="3" required>{{ $question->question_text }}</textarea>
                    </div>

                    <!-- Multiple Choice -->
                    <div id="multiple_choiceForm" class="type-form d-none">
                        <label class="form-label">Options</label>
                        <div id="mcqOptionsWrapper">
                            @foreach($question->options as $index => $option)
                                <div class="input-group mb-2 option-row">
                                    <div class="input-group-text">
                                        <input type="radio" name="correct_option" value="{{ $index }}" {{ $question->correct_option == $index ? 'checked' : '' }}>
                                    </div>
                                    <input type="text" name="options[]" class="form-control" value="{{ $option }}" placeholder="Option {{ chr(65 + $index) }}">
                                    <button type="button" class="btn btn-danger remove-option">X</button>
                                </div>
                            @endforeach
                        </div>
                        <button type="button" class="btn btn-sm btn-outline-primary" id="addOptionBtn">Add More Option</button>
                    </div>

                    <!-- True / False -->
                    <div id="true_falseForm" class="type-form d-none">
                        <label class="form-label">Select Answer</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="correct_option" value="True" {{ $question->correct_option === 'True' ? 'checked' : '' }}>
                            <label class="form-check-label">True</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="correct_option" value="False" {{ $question->correct_option === 'False' ? 'checked' : '' }}>
                            <label class="form-check-label">False</label>
                        </div>
                    </div>

                    <!-- Fill in the Blank -->
                    <div id="fill_in_the_blankForm" class="type-form d-none">
                        <label class="form-label">Correct Answer</label>
                        <input type="text" name="correct_option" class="form-control" value="{{ $question->correct_option }}">
                    </div>

                    <!-- Paragraph -->
                    <div id="paragraphForm" class="type-form d-none">
                        <label class="form-label">Expected Answer</label>
                        <textarea name="correct_option" class="form-control" rows="4">{{ $question->correct_option }}</textarea>
                    </div>

                    <!-- Explanation -->
                    <div class="mb-3 mt-3">
                        <label class="form-label">Explanation (Optional)</label>
                        <textarea name="explanation" class="form-control" rows="2">{{ $question->explanation }}</textarea>
                    </div>
                </div>

                <div class="card-footer text-end bg-white">
                    <button type="submit" class="btn btn-primary">Update Question</button>
                    <a href="{{ route('Questions.index') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- JS -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const typeSelector = document.getElementById('questionType');
        const typeForms = document.querySelectorAll('.type-form');

        function toggleForms() {
            const selected = typeSelector.value;
            typeForms.forEach(form => {
                form.classList.add('d-none');
                form.querySelectorAll('input, textarea, select').forEach(input => input.disabled = true);
            });

            const selectedForm = document.getElementById(selected + 'Form');
            if (selectedForm) {
                selectedForm.classList.remove('d-none');
                selectedForm.querySelectorAll('input, textarea, select').forEach(input => input.disabled = false);
            }
        }

        typeSelector.addEventListener('change', toggleForms);
        toggleForms();

        let optionIndex = {{ count($question->options ?? []) }};
        const wrapper = document.getElementById("mcqOptionsWrapper");
        const addBtn = document.getElementById("addOptionBtn");

        addBtn?.addEventListener("click", function () {
            const optionChar = String.fromCharCode(65 + optionIndex);
            const row = document.createElement("div");
            row.classList.add("input-group", "mb-2", "option-row");
            row.innerHTML = `
                <div class="input-group-text">
                    <input type="radio" name="correct_option" value="${optionIndex}">
                </div>
                <input type="text" name="options[]" class="form-control" placeholder="Option ${optionChar}">
                <button type="button" class="btn btn-danger remove-option">X</button>
            `;
            wrapper.appendChild(row);
            optionIndex++;
        });

        wrapper?.addEventListener("click", function (e) {
            if (e.target.classList.contains("remove-option")) {
                e.target.closest(".option-row").remove();
            }
        });
    });
</script>
@endsection
