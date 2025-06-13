<?php

namespace App\Http\Controllers;
use App\Models\Exam;
use App\Models\Answer;
use App\Models\CandidateAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ExamAttempt;

class CandidateExamController extends Controller
{
    /**
     * Show upcoming exams for the authenticated candidate
     */
    public function upcomingExams()
    {
        $candidate = Auth::guard('candidate')->user();
        
        // Check if candidate is authenticated
        if (!$candidate) {
            return redirect()->route('candidates.login')->with('error', 'Please login first.');
        }
        
        // Get exams for the candidate's group from their organization
        $exams = Exam::with(['group', 'organization', 'questions'])
            ->where('availability', 1) // assuming 1 means available
            ->withCount('questions')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            // dd($exams);
        return view('UpcomingExams.index', compact('exams'));
    }

    /**
     * Show exam instructions
     */
    public function instructions($id)
    {
        $candidate = Auth::guard('candidate')->user();
        $exam = Exam::findOrFail($id);
         return view('Exams.instructions', compact('exam'));
    }

    /**
     * Start the exam
     */
    public function start($examId, Request $request)
    {
        $candidate = Auth::guard('candidate')->user();
         
        $exam = Exam::with('questions')->findOrFail($examId);
        // dd($candidate,$exam);
        
        // Check if candidate belongs to the exam's group and organization (if these fields exist)
        // if (isset($candidate->candidate_group_id) && isset($candidate->organization_id)) {
        //     if ($exam->candidate_group_id !== $candidate->candidate_group_id || 
        //         $exam->organization_id !== $candidate->organization_id) {
        //         return redirect()->route('candidates.exam.upcoming')
        //             ->with('error', 'You are not authorized to take this exam.');
        //     }
        // }

        $questions = $exam->questions;

        if ($questions->isEmpty()) {
            return redirect()->route('candidates.exam.upcoming')
                ->with('error', 'No questions available for this exam.');
        }

        // Get current question index from the query, default to 1
        $currentQuestionIndex = (int) $request->query('question', 1);
        $currentQuestionIndex = max(1, min($currentQuestionIndex, count($questions)));

        // Get the current question
        $question = $questions[$currentQuestionIndex - 1];

        // Store selected answers in session (if any)
        $selectedAnswer = session("answer_{$question->id}", null);

        return view('Exams.start', compact('exam', 'questions', 'question', 'currentQuestionIndex', 'selectedAnswer'));
    }

    /**
     * Store answers temporarily in session (without submission to the database yet)
     */
    public function storeAnswer(Request $request, $examId)
    {
        dd($request->all());
        $candidate = Auth::guard('candidate')->user();
        
        // Check if candidate is authenticated
        if (!$candidate) {
            return redirect()->route('candidates.login')->with('error', 'Please login first.');
        }
        
        $exam = Exam::findOrFail($examId);
        $question = $exam->questions()->findOrFail($request->question_id);
        
        // Store answer in session
        session(["answer_{$question->id}" => $request->answer]);

        // Get the current question index
        $currentQuestionIndex = (int) $request->query('question', 1);
        $totalQuestions = $exam->questions->count();

        // Check if this is the last question
        if ($currentQuestionIndex >= $totalQuestions) {
            return redirect()->route('candidates.exam.review', ['exam' => $examId]);
        }

        // Redirect to the next question
        return redirect()->route('candidates.exam.start', ['exam' => $examId, 'question' => $currentQuestionIndex + 1]);
    }
public function submitExam(Request $request, $examId)
{
    $exam = Exam::findOrFail($examId);
    $questions = $exam->questions;

    // Find or create the exam attempt for this user
    $examAttempt = ExamAttempt::firstOrCreate([
        'exam_id' => $exam->id,
        'user_id' => auth()->id(),
    ]);

    foreach ($questions as $question) {
        $answer = session("answer_{$question->id}");

        if ($answer !== null) {
            CandidateAnswer::updateOrCreate(
                [
                    'exam_attempt_id' => $examAttempt->id,
                    'question_id' => $question->id,
                ],
                [
                    'answer' => $answer,
                ]
            );
        }
    }

    // Clear session answers
    foreach ($questions as $question) {
        session()->forget("answer_{$question->id}");
    }

    return redirect()->route('candidates.exam.completed', $examId)
                     ->with('success', 'Your exam has been submitted successfully.');
}

public function completed(){
     return view('Exams.completed');
}
    /**
     * Show exam review page before final submission
     */
    public function review($examId)
    {
        $candidate = Auth::guard('candidate')->user();
        
        // Check if candidate is authenticated
        if (!$candidate) {
            return redirect()->route('candidates.login')->with('error', 'Please login first.');
        }
        
        $exam = Exam::findOrFail($examId);
        $questions = $exam->questions;

        // Get all answers from session
        $answers = [];
        foreach ($questions as $index => $question) {
            $answers[$question->id] = [
                'question' => $question,
                'answer' => session("answer_{$question->id}"),
                'question_number' => $index + 1
            ];
        }

        return view('candidates.exams.review', compact('exam', 'answers'));
    }

    /**
     * Submit the exam after all questions have been answered
     */
    public function submit(Request $request, $examId)
    {
        $candidate = Auth::guard('candidate')->user();
        
        // Check if candidate is authenticated
        if (!$candidate) {
            return redirect()->route('candidates.login')->with('error', 'Please login first.');
        }
        
        $exam = Exam::findOrFail($examId);
        $questions = $exam->questions;

        // Retrieve all answers stored in session and save to database
        $score = 0;
        $totalQuestions = $questions->count();

        foreach ($questions as $question) {
            $answerText = session("answer_{$question->id}");
            
            // Create answer record
            Answer::create([
                'candidate_id' => $candidate->id,
                'exam_id' => $examId,
                'question_id' => $question->id,
                'answer_text' => $answerText,
                'is_correct' => $answerText === $question->correct_answer
            ]);

            // Calculate score
            if ($answerText === $question->correct_answer) {
                $score++;
            }
        }

        // Calculate percentage
        $percentage = ($score / $totalQuestions) * 100;

        // Store exam result
        $examResult = \App\Models\ExamResult::create([
            'candidate_id' => $candidate->id,
            'exam_id' => $examId,
            'score' => $score,
            'total_questions' => $totalQuestions,
            'percentage' => $percentage,
            'completed_at' => now()
        ]);

        // Clear session data for this exam
        foreach ($questions as $question) {
            session()->forget("answer_{$question->id}");
        }

        return redirect()->route('candidates.exam.result', ['exam' => $examId])
            ->with('success', 'Exam submitted successfully!');
    }

    /**
     * Show exam result
     */
    public function result($examId)
    {
        $candidate = Auth::guard('candidate')->user();
        
        // Check if candidate is authenticated
        if (!$candidate) {
            return redirect()->route('candidates.login')->with('error', 'Please login first.');
        }
        
        $exam = Exam::findOrFail($examId);
        
        $examResult = \App\Models\ExamResult::where('candidate_id', $candidate->id)
            ->where('exam_id', $examId)
            ->latest()
            ->first();

        if (!$examResult) {
            return redirect()->route('candidates.exam.upcoming')
                ->with('error', 'No result found for this exam.');
        }

        return view('candidates.exams.result', compact('exam', 'examResult'));
    }
}