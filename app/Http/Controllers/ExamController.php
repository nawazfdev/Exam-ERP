<?php

namespace App\Http\Controllers;
use App\Models\Exam;
use App\Models\ExamGrading;
use App\Models\Organization;
use App\Models\CandidateGroup;

use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exams = Exam::latest()->paginate(10);
        // dd($exams);
        return view('Exams.index', compact('exams'));
    }

    public function create()
    {
        $userOrganizationId = auth()->user()->organization_id;
        // Fetch only the candidate groups associated with the logged-in user's organization
        $candidateGroups = CandidateGroup::where('organization_id', $userOrganizationId)
            ->get();
        return view('Exams.create', compact('candidateGroups'));
    }

    public function store(Request $request)
    {
      //  dd($request->all());
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration' => 'nullable|integer',
            'candidate_group_id' => 'required|exists:candidate_groups,id', 
            'question_picking' => 'required|string|in:auto,manual',
            'availability' => 'required|string|in:always,specific_time',
            'display_countdown' => 'boolean',
            'submit_before_end' => 'boolean',
            'negative_marks' => 'required|string|in:none,apply,10%',
            'allow_partial_marks' => 'boolean',
            'allow_question_navigation' => 'boolean',
            'allow_section_navigation' => 'boolean',
            'allow_review' => 'boolean',
            'allow_feedback_after_exam' => 'boolean',
            'display_results' => 'boolean',
            'display_results_after_expiry' => 'boolean',
            'display_ranking' => 'boolean',
            'allow_pause_resume' => 'boolean',
            'allow_download_paper' => 'boolean',
            'system_check' => 'boolean',
            'allow_retake' => 'boolean',
            'retake_count' => 'nullable|integer',
            'proctoring' => 'boolean',
            'terminate_on_unusual_behavior' => 'boolean',
            'live_chat_support' => 'boolean',
            'force_fullscreen' => 'boolean',
            'exam_price' => 'nullable|numeric|min:0',
            // Add validation for the exam grading fields if needed
            'grading' => 'nullable|array',  // Grading is optional for other exam types
            'grading.*.min_score' => 'nullable|integer',
            'grading.*.max_score' => 'nullable|integer',
            'pass_fail_min_score' => 'nullable|integer',  // For pass/fail type
            'good_excellent' => 'nullable|array',  // For good/excellent type
            'good_excellent.*.min_score' => 'nullable|integer',
            'good_excellent.*.max_score' => 'nullable|integer',
        ]);

        // Assign organization_id from authenticated user
        $validatedData['organization_id'] = auth()->user()->organization_id;
        

        // Create the exam
        $exam = Exam::create($validatedData);
        // Handle grading type
        if ($request->input('exam_type') === 'grading') {
            $gradingData = $request->input('grading', []);

            foreach ($gradingData as $grade => $scores) {
                ExamGrading::create([
                    'exam_id' => $exam->id,
                    'exam_type' => 'grading',
                    'grade' => $grade,
                    'min_score' => $scores['min_score'] ?? 0,  // Default min_score if not provided
                    'max_score' => $scores['max_score'] ?? 100,  // Default max_score if not provided
                ]);
            }
        }

        // Handle pass/fail type
        elseif ($request->input('exam_type') === 'pass_fail') {
            ExamGrading::create([
                'exam_id' => $exam->id,
                'exam_type' => 'pass_fail',
                'grade' => 'Pass',  // For pass/fail, you can use 'Pass' or 'Fail'
                'min_score' => $request->input('pass_fail_min_score', 50),  // Default to 50 if not provided
                'max_score' => 100,  // Pass/fail, so max score is not relevant
            ]);
        }

        // Handle good/excellent type
        elseif ($request->input('exam_type') === 'good_excellent') {
            $goodExcellentData = $request->input('good_excellent', []);

            foreach ($goodExcellentData as $grade => $scores) {
                ExamGrading::create([
                    'exam_id' => $exam->id,
                    'exam_type' => 'good_excellent',
                    'grade' => $grade,
                    'min_score' => $scores['min_score'] ?? 0,  // Default min_score if not provided
                    'max_score' => $scores['max_score'] ?? 100,  // Default max_score if not provided
                ]);
            }
        }

        return redirect()->route('Exams.index')->with('success', 'Exam created successfully!');
    }


    public function show(Exam $exam)
    {
        return view('Exams.show', compact('exam'));
    }

    public function edit($id)
    {
        // Fetch the exam by ID
        $exam = Exam::findOrFail($id);

        // Get the organization_id of the authenticated user
        $userOrganizationId = auth()->user()->organization_id;

        // Fetch the candidate groups associated with the user's organization
        $candidateGroups = CandidateGroup::where('organization_id', $userOrganizationId)->get();

        // Pass the exam and candidate groups to the view
        return view('Exams.edit', compact('exam', 'candidateGroups'));
    }


    public function update(Request $request, $examId)
    {
        // Validate the request
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'duration' => 'nullable|integer',
            'candidate_group_id' => 'required|exists:candidate_groups,id', 
            'question_picking' => 'required|string|in:auto,manual',
            'availability' => 'required|string|in:always,specific_time',
            'display_countdown' => 'boolean',
            'submit_before_end' => 'boolean',
            'negative_marks' => 'required|string|in:none,apply,10%',
            'allow_partial_marks' => 'boolean',
            'allow_question_navigation' => 'boolean',
            'allow_section_navigation' => 'boolean',
            'allow_review' => 'boolean',
            'allow_feedback_after_exam' => 'boolean',
            'display_results' => 'boolean',
            'display_results_after_expiry' => 'boolean',
            'display_ranking' => 'boolean',
            'allow_pause_resume' => 'boolean',
            'allow_download_paper' => 'boolean',
            'system_check' => 'boolean',
            'allow_retake' => 'boolean',
            'retake_count' => 'nullable|integer',
            'proctoring' => 'boolean',
            'terminate_on_unusual_behavior' => 'boolean',
            'live_chat_support' => 'boolean',
            'force_fullscreen' => 'boolean',
            'exam_price' => 'nullable|numeric|min:0',
            // Grading fields validation
            'grading' => 'nullable|array',
            'grading.*.min_score' => 'nullable|integer',
            'grading.*.max_score' => 'nullable|integer',
            'pass_fail_min_score' => 'nullable|integer',
            'good_excellent' => 'nullable|array',
            'good_excellent.*.min_score' => 'nullable|integer',
            'good_excellent.*.max_score' => 'nullable|integer',
        ]);

        // Find the existing exam
        $exam = Exam::findOrFail($examId);

        // Update exam fields
        $exam->update($validatedData);

        // Update grading data based on exam type
        if ($request->input('exam_type') === 'grading') {
            // Delete existing grading data
            ExamGrading::where('exam_id', $exam->id)->where('exam_type', 'grading')->delete();

            $gradingData = $request->input('grading', []);

            foreach ($gradingData as $grade => $scores) {
                ExamGrading::create([
                    'exam_id' => $exam->id,
                    'exam_type' => 'grading',
                    'grade' => $grade,
                    'min_score' => $scores['min_score'] ?? 0,
                    'max_score' => $scores['max_score'] ?? 100,
                ]);
            }
        }

        // Handle pass/fail type
        elseif ($request->input('exam_type') === 'pass_fail') {
            // Delete existing grading data for pass/fail
            ExamGrading::where('exam_id', $exam->id)->where('exam_type', 'pass_fail')->delete();

            ExamGrading::create([
                'exam_id' => $exam->id,
                'exam_type' => 'pass_fail',
                'grade' => 'Pass',
                'min_score' => $request->input('pass_fail_min_score', 50),
                'max_score' => 100,
            ]);
        }

        // Handle good/excellent type
        elseif ($request->input('exam_type') === 'good_excellent') {
            // Delete existing grading data for good/excellent
            ExamGrading::where('exam_id', $exam->id)->where('exam_type', 'good_excellent')->delete();

            $goodExcellentData = $request->input('good_excellent', []);

            foreach ($goodExcellentData as $grade => $scores) {
                ExamGrading::create([
                    'exam_id' => $exam->id,
                    'exam_type' => 'good_excellent',
                    'grade' => $grade,
                    'min_score' => $scores['min_score'] ?? 0,
                    'max_score' => $scores['max_score'] ?? 100,
                ]);
            }
        }

        return redirect()->route('Exams.index')->with('success', 'Exam updated successfully!');
    }


    public function destroy($id)
    {
        // Find the exam by ID
        $exam = Exam::findOrFail($id);

        // Check if the exam has related gradings
        if ($exam->grading()->exists()) {
            // Optionally, delete related gradings first (if you want)
            $exam->grading()->delete();

            // Now delete the exam
            $exam->delete();

            return redirect()->route('Exams.index')->with('success', 'Exam and related gradings deleted successfully!');
        }

        // If there are no related gradings, just delete the exam
        $exam->delete();

        return redirect()->route('Exams.index')->with('success', 'Exam deleted successfully!');
    }

}
