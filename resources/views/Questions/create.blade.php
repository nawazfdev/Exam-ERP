@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Create Question</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('Questions.index') }}" class="btn btn-primary">Back to Questions</a>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <form action="{{ route('Questions.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">

                        <!-- Exam -->
                        <div class="mb-3">
                            <label class="form-label">Exam</label>
                            <select name="exam_id" class="form-control" required>
                                @foreach($exams as $exam)
                                    <option value="{{ $exam->id }}">{{ $exam->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Question Type -->
                        <!-- <div class="mb-3">
                            <label class="form-label">Question Type</label>
                            <select name="question_type" id="questionType" class="form-control" required>
                                <option value="multiple_choice">Multiple Choice</option>
                                <option value="true_false">True / False</option>
                                <option value="fill_in_the_blank">Fill in the Blank</option>
                                <option value="paragraph">Paragraph</option>
                            </select>
                        </div> -->
                         <!-- Question Type -->
                         <div class="mb-3">
                            <label class="form-label">Question Type</label>
                            <select name="question_type" id="questionType" class="form-control" required>
                                @foreach($questionCategories as $category)
                                    <option value="{{ strtolower(str_replace(' ', '_', $category->name)) }}">
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Question -->
                        <div class="mb-3">
                            <label class="form-label">Question</label>
                            <textarea name="question_text" class="form-control" rows="3" required></textarea>
                        </div>

                        <!-- MULTIPLE CHOICE -->
                        <div id="multiple_choiceForm" class="type-form d-none">
                            <label class="form-label">Options</label>
                            <div id="mcqOptionsWrapper">
                                @for ($i = 0; $i < 4; $i++)
                                    <div class="input-group mb-2 option-row">
                                        <div class="input-group-text">
                                            <input type="radio" name="correct_option" value="{{ $i }}">
                                        </div>
                                        <input type="text" name="options[]" class="form-control"
                                            placeholder="Option {{ chr(65 + $i) }}">
                                        <button type="button" class="btn btn-danger remove-option d-none">X</button>
                                    </div>
                                @endfor
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-primary" id="addOptionBtn">Add More Option</button>
                            <small class="form-text text-muted">Select the correct option.</small>
                        </div>

                        <!-- TRUE / FALSE -->
                        <div id="true_falseForm" class="type-form d-none">
                            <label class="form-label">Select Answer</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="correct_option" value="True">
                                <label class="form-check-label">True</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="correct_option" value="False">
                                <label class="form-check-label">False</label>
                            </div>
                        </div>

                        <!-- FILL IN THE BLANK -->
                        <div id="fill_in_the_blankForm" class="type-form d-none">
                            <label class="form-label">Correct Answer</label>
                            <input type="text" name="correct_option" class="form-control"
                                placeholder="Type the correct answer">
                        </div>

                        <!-- PARAGRAPH -->
                        <div id="paragraphForm" class="type-form d-none">
                            <label class="form-label">Expected Answer</label>
                            <textarea name="correct_option" class="form-control" rows="4"
                                placeholder="Expected answer from student"></textarea>
                        </div>

                        <!-- Optional Explanation -->
                        <div class="mb-3 mt-3">
                            <label class="form-label">Explanation (Optional)</label>
                            <textarea name="explanation" class="form-control" rows="2"></textarea>
                        </div>

                    </div>

                    <div class="card-footer text-end bg-white">
                        <button type="submit" class="btn btn-primary">Save & Publish</button>
                        <button type="reset" class="btn btn-secondary">Clear</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- JavaScript Section -->
    <!-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            const typeSelector = document.getElementById('questionType');
            const typeForms = document.querySelectorAll('.type-form');

            function toggleForms() {
                const selected = typeSelector.value;

                typeForms.forEach(form => {
                    form.classList.add('d-none');
                    form.querySelectorAll('input, textarea, select').forEach(input => {
                        input.disabled = true;
                    });
                });

                const selectedForm = document.getElementById(selected + 'Form');
                if (selectedForm) {
                    selectedForm.classList.remove('d-none');
                    selectedForm.querySelectorAll('input, textarea, select').forEach(input => {
                        input.disabled = false;
                    });
                }
            }

            typeSelector.addEventListener('change', toggleForms);
            toggleForms(); // Trigger on page load

            // Add more options for MCQ
            let optionIndex = 4;
            const wrapper = document.getElementById("mcqOptionsWrapper");
            const addBtn = document.getElementById("addOptionBtn");

            addBtn.addEventListener("click", function () {
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

            wrapper.addEventListener("click", function (e) {
                if (e.target.classList.contains("remove-option")) {
                    e.target.closest(".option-row").remove();
                }
            });
        });
    </script> -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const typeSelector = document.getElementById('questionType');
        const typeForms = document.querySelectorAll('.type-form');

        function toggleForms() {
            const selected = typeSelector.value;

            // Hide all forms and disable inputs
            typeForms.forEach(form => {
                form.classList.add('d-none');
                form.querySelectorAll('input, textarea, select').forEach(input => {
                    input.disabled = true;
                });
            });

            // Handle 'True / False' specifically to match value 'true_/_false'
            let normalizedId = selected;
            if (selected === "true_/_false") {
                normalizedId = "true_false"; // Convert 'true_/_false' to 'true_false' for the form ID
            }

            // Get the corresponding form by the normalized ID
            const selectedForm = document.getElementById(normalizedId + 'Form');

            // Show the selected form and enable its inputs
            if (selectedForm) {
                selectedForm.classList.remove('d-none');
                selectedForm.querySelectorAll('input, textarea, select').forEach(input => {
                    input.disabled = false;
                });
            }
        }

        // Trigger the toggleForms function whenever the question type changes
        typeSelector.addEventListener('change', toggleForms);
        toggleForms(); // Trigger on page load to display the correct form

        // Add more options for MCQ
        let optionIndex = 4;
        const wrapper = document.getElementById("mcqOptionsWrapper");
        const addBtn = document.getElementById("addOptionBtn");

        if (addBtn && wrapper) {
            addBtn.addEventListener("click", function () {
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

            wrapper.addEventListener("click", function (e) {
                if (e.target.classList.contains("remove-option")) {
                    e.target.closest(".option-row").remove();
                }
            });
        }
    });
</script>

@endsection
