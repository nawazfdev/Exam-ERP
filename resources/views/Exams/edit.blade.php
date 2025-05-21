@extends('layouts.app')
<style>
    .grading_box {
        margin-top: 15px;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        background-color: #f9f9f9;
    }

    .grading_inner {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .grad_text {
        width: 120px;
        font-weight: bold;
    }

    .input-group {
        flex-grow: 1;
        display: flex;
        max-width: 200px;
    }

    .input-group input {
        text-align: center;
    }

    .grading_to {
        margin: 0 10px;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 5px;
    }
</style>

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{ __('Edit Exam') }}</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('Exams.index') }}" class="btn btn-primary">{{ __('Back to Exams') }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <form action="{{ route('Exams.update', $exam->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="examTabs">
                                    @foreach (['basic' => 'Basic', 'grading' => 'Grading', 'settings' => 'Settings', 'security' => 'Security', 'pricing' => 'Pricing'] as $id => $label)
                                        <li class="nav-item">
                                            <a class="nav-link{{ $loop->first ? ' active' : '' }}" data-toggle="tab"
                                                href="#{{ $id }}">{{ __($label) }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="tab-content mt-3">
                                    @foreach (['basic' => ['title' => 'Exam Title', 'description' => 'Description', 'duration' => 'Duration (minutes)', 'candidate_group_id' => 'Assign Exam To', 'question_picking' => 'Question Selection Method', 'availability' => 'Exam Availability', 'display_countdown' => 'Show Countdown Timer', 'submit_before_end' => 'Force Submit Before Time Ends'], 'settings' => ['negative_marks' => 'Apply Negative Marking', 'allow_partial_marks' => 'Allow Partial Grading', 'allow_question_navigation' => 'Allow Question Navigation', 'allow_section_navigation' => 'Allow Section Navigation', 'allow_review' => 'Allow Review After Exam', 'allow_feedback_after_exam' => 'Allow Feedback After Exam', 'display_results' => 'Display Results', 'display_results_after_expiry' => 'Show Results After Expiry', 'display_ranking' => 'Display Ranking', 'allow_pause_resume' => 'Allow Pause & Resume', 'allow_download_paper' => 'Allow Download Question Paper', 'system_check' => 'System Compatibility Check', 'allow_retake' => 'Allow Retake'], 'security' => ['proctoring' => 'Enable Proctoring (Record Audio & Video)', 'terminate_on_unusual_behavior' => 'Terminate Exam on Unusual Behavior', 'live_chat_support' => 'Enable Live Chat Support', 'force_fullscreen' => 'Force Fullscreen Mode'], 'grading' => ['exam_type' => 'Exam Type'], 'pricing' => ['exam_price' => 'Exam Price (PKR)']] as $tab => $fields)
                                        <div class="tab-pane fade{{ $loop->first ? ' show active' : '' }}" id="{{ $tab }}">
                                            @foreach ($fields as $field => $label)
                                                <div class="form-group">
                                                    @if ($field === 'negative_marks')
                                                        <label for="{{ $field }}">{{ __($label) }}</label>
                                                        <select name="{{ $field }}" id="{{ $field }}" class="form-control">
                                                            <option value="none" {{ old($field, $exam->$field) === 'none' ? 'selected' : '' }}>Do Not Apply</option>
                                                            <option value="apply" {{ old($field, $exam->$field) === 'apply' ? 'selected' : '' }}>Apply</option>
                                                            <option value="10%" {{ old($field, $exam->$field) === '10%' ? 'selected' : '' }}>10% Apply</option>
                                                        </select>
                                                    @elseif ($field === 'question_picking')
                                                        <label for="{{ $field }}">{{ __($label) }}</label>
                                                        <select name="{{ $field }}" id="{{ $field }}" class="form-control">
                                                            <option value="auto" {{ old($field, $exam->$field) === 'auto' ? 'selected' : '' }}>Auto</option>
                                                            <option value="manual" {{ old($field, $exam->$field) === 'manual' ? 'selected' : '' }}>Manual</option>
                                                        </select>
                                                    @elseif ($field === 'submit_before_end' || $field === 'display_countdown')
                                                        <label>{{ __($label) }}</label>
                                                        <div>
                                                            <input type="radio" name="{{ $field }}" value="1" {{ old($field, $exam->$field) == 1 ? 'checked' : '' }}> Yes
                                                            <input type="radio" name="{{ $field }}" value="0" {{ old($field, $exam->$field) == 0 ? 'checked' : '' }}> No
                                                        </div>
                                                    @elseif ($field === 'availability')
                                                        <label>{{ __($label) }}</label>
                                                        <div>
                                                            <input type="radio" name="{{ $field }}" value="always" {{ old($field, $exam->$field) === 'always' ? 'checked' : '' }}> Always
                                                            <input type="radio" name="{{ $field }}" value="specific_time" {{ old($field, $exam->$field) === 'specific_time' ? 'checked' : '' }}> Available on
                                                            Specific Time
                                                        </div>
                                                    @elseif ($field === 'candidate_group_id')
                                                        <label>{{ __($label) }}</label>
                                                        <select name="{{ $field }}" id="{{ $field }}" class="form-control">
                                                            <option value="">Choose Group</option>
                                                            @foreach ($candidateGroups as $group)
                                                                <option value="{{ $group->id }}" {{ $exam->organization_id == $group->id ? 'selected' : '' }}>
                                                                    {{ $group->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    @elseif ($tab === 'pricing')
                                                        <label for="{{ $field }}">{{ __($label) }}</label>
                                                        <input type="text" name="{{ $field }}" id="{{ $field }}" class="form-control"
                                                            value="{{ old($field, $exam->$field) }}">
                                                    @elseif ($field === 'allow_retake')
                                                        <input type="checkbox" name="allow_retake" id="allow_retake" value="1" {{ old('allow_retake', $exam->$field) ? 'checked' : '' }}>
                                                        <label for="allow_retake">{{ __($label) }}</label>

                                                        <div id="retake_options" style="display: none;">
                                                            <label for="retake_count">Allow Retake For:</label>
                                                            <select name="retake_count" id="retake_count" class="form-control">
                                                                <option value="">Select Retake Limit</option>
                                                                <option value="1" {{ old('retake_count', $exam->retake_count) == '1' ? 'selected' : '' }}>1 Time</option>
                                                                <option value="2" {{ old('retake_count', $exam->retake_count) == '2' ? 'selected' : '' }}>2 Times</option>
                                                                <option value="3" {{ old('retake_count', $exam->retake_count) == '3' ? 'selected' : '' }}>3 Times</option>
                                                                <option value="4" {{ old('retake_count', $exam->retake_count) == '4' ? 'selected' : '' }}>4 Times</option>
                                                            </select>
                                                            <div id="retake_conditions"></div>
                                                        </div>
                                                    @elseif ($tab === 'settings' || $tab === 'security')
                                                        <input type="checkbox" name="{{ $field }}" id="{{ $field }}" value="1" {{ old($field, $exam->$field) ? 'checked' : '' }}>
                                                        <label for="{{ $field }}">{{ __($label) }}</label>
                                                    @elseif ($field === 'exam_type')
                                                        <select name="exam_type" id="exam_type" class="form-control">
                                                            <option value="pass_fail" {{ old('exam_type', $exam->exam_type) === 'pass_fail' ? 'selected' : '' }}>Pass/Fail</option>
                                                            <option value="grading" {{ old('exam_type', $exam->exam_type) === 'grading' ? 'selected' : '' }}>A-F Grading</option>
                                                            <option value="good_excellent" {{ old('exam_type', $exam->exam_type) === 'good_excellent' ? 'selected' : '' }}>Good/Excellent
                                                            </option>
                                                        </select>

                                                        <!-- Grading Box (A-F Grading) -->
                                                        <div id="grading_box" class="grading_box"
                                                            style="display: {{ old('exam_type', $exam->exam_type) === 'grading' ? 'block' : 'none' }}">
                                                            @foreach (['A', 'B', 'C', 'D', 'E', 'F'] as $grade)
                                                                <div class="grading_inner">
                                                                    <span class="grad_text">Grade <b>{{ $grade }}</b></span>
                                                                    <div class="input-group">
                                                                        <input type="number" name="grading[{{ $grade }}][min_score]"
                                                                            class="form-control" placeholder="Min Score"
                                                                            value="{{ old('grading.' . $grade . '.min_score', $exam->grading[$grade]['min_score'] ?? '') }}">
                                                                    </div>
                                                                    <span class="grading_to">to</span>
                                                                    <div class="input-group">
                                                                        <input type="number" name="grading[{{ $grade }}][max_score]"
                                                                            class="form-control" placeholder="Max Score"
                                                                            value="{{ old('grading.' . $grade . '.max_score', $exam->grading[$grade]['max_score'] ?? '') }}">
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>

                                                        <!-- Pass/Fail Box -->
                                                        <div id="pass_fail_box" class="grading_box"
                                                            style="display: {{ old('exam_type', $exam->exam_type) === 'pass_fail' ? 'block' : 'none' }}">
                                                            <label>Minimum Required Score</label>
                                                            <div class="input-group">
                                                                <input type="number" name="pass_fail_min_score" class="form-control"
                                                                    placeholder="Minimum Pass Score"
                                                                    value="{{ old('pass_fail_min_score', $exam->pass_fail_min_score ?? 50) }}">
                                                            </div>
                                                        </div>

                                                        <!-- Good/Excellent Box -->
                                                        <div id="good_excellent_box" class="grading_box"
                                                            style="display: {{ old('exam_type', $exam->exam_type) === 'good_excellent' ? 'block' : 'none' }}">
                                                            @foreach (['Excellent', 'Very Good', 'Good', 'Fair', 'Needs Improvement'] as $grade)
                                                                <div class="grading_inner">
                                                                    <span class="grad_text">{{ $grade }}</span>
                                                                    <div class="input-group">
                                                                        <input type="number" name="good_excellent[{{ $grade }}][min_score]"
                                                                            class="form-control" placeholder="Min Score"
                                                                            value="{{ old('good_excellent.' . $grade . '.min_score', $exam->good_excellent[$grade]['min_score'] ?? '') }}">
                                                                    </div>
                                                                    <span class="grading_to">to</span>
                                                                    <div class="input-group">
                                                                        <input type="number" name="good_excellent[{{ $grade }}][max_score]"
                                                                            class="form-control" placeholder="Max Score"
                                                                            value="{{ old('good_excellent.' . $grade . '.max_score', $exam->good_excellent[$grade]['max_score'] ?? '') }}">
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @else
                                                        <label for="{{ $field }}">{{ __($label) }}</label>
                                                        <input type="text" name="{{ $field }}" id="{{ $field }}" class="form-control"
                                                            placeholder="{{ __('Enter ' . $label) }}"
                                                            value="{{ old($field, $exam->$field) }}">
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let examType = document.getElementById("exam_type");
        let passFailBox = document.getElementById("pass_fail_box");
        let gradingBox = document.getElementById("grading_box");
        let goodExcellentBox = document.getElementById("good_excellent_box");

        function toggleBoxes() {
            // Hide all grading-related boxes
            passFailBox.style.display = "none";
            gradingBox.style.display = "none";
            goodExcellentBox.style.display = "none";

            // Show the relevant box based on the selected exam type
            if (examType.value === "pass_fail") {
                passFailBox.style.display = "block";
            } else if (examType.value === "grading") {
                gradingBox.style.display = "block";
            } else if (examType.value === "good_excellent") {
                goodExcellentBox.style.display = "block";
            }
        }

        // Listen for changes on the select field
        examType.addEventListener("change", toggleBoxes);

        // Trigger the initial state when the page loads
        toggleBoxes();
    });

    $(document).ready(function () {
        $('#exam_type').change(function () {
            var selectedExamType = $(this).val();

            // Hide all grading related boxes
            $('#grading_box').hide();
            $('#pass_fail_box').hide();
            $('#good_excellent_box').hide();

            // Show the relevant box based on selected exam type
            if (selectedExamType === 'grading') {
                $('#grading_box').show();
            } else if (selectedExamType === 'pass_fail') {
                $('#pass_fail_box').show();
            } else if (selectedExamType === 'good_excellent') {
                $('#good_excellent_box').show();
            }
        });

        // Trigger change to show the correct box on page load
        $('#exam_type').trigger('change');
    });

</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let allowRetake = document.getElementById("allow_retake");
        let retakeOptions = document.getElementById("retake_options");
        let retakeCount = document.getElementById("retake_count");
        let retakeConditions = document.getElementById("retake_conditions");

        allowRetake.addEventListener("change", function () {
            retakeOptions.style.display = this.checked ? "block" : "none";
            retakeConditions.innerHTML = "";
        });

        retakeCount.addEventListener("change", function () {
            retakeConditions.innerHTML = "";
            let count = parseInt(this.value);
            if (!isNaN(count) && count > 0) {
                for (let i = 1; i <= count; i++) {
                    let div = document.createElement("div");
                    div.classList.add("form-group");
                    div.innerHTML = `
                                        <label for="retake_condition_${i}">Condition for Retake ${i}:</label>
                                        <select name="retake_condition_${i}" class="form-control">
                                            <option value="none">No Condition</option>
                                            <option value="2%">If Result is >= 2%</option>
                                            <option value="4%">If Result is >= 4%</option>
                                            <option value="6%">If Result is >= 6%</option>
                                        </select>
                                    `;
                    retakeConditions.appendChild(div);
                }
            }
        });

        // Ensure the state persists on reload
        if (allowRetake.checked) {
            retakeOptions.style.display = "block";
        }
    });
</script>