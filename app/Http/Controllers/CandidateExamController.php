<?php

namespace App\Http\Controllers;
use App\Models\Exam;
use Illuminate\Http\Request;

class CandidateExamController extends Controller
{
    //
    public function instructions($id)
    {
        $exam = Exam::findOrFail($id);
        return view('exams.instructions', compact('exam'));
    }
    // public function start($examId)
    // {
    //     // Only load the 'questions' relationship
    //     $exam = Exam::with('questions')->findOrFail($examId);
    
    //     $questions = $exam->questions;
    //     $currentQuestionIndex = 1;
    //     $question = $questions->first();
    
    //     return view('exams.start', compact('exam', 'question', 'questions', 'currentQuestionIndex'));
    // }
    public function start($examId, Request $request)
    {
        $exam = Exam::findOrFail($examId);
        $questions = $exam->questions;

        // Get current question index from the query, default to 1
        $currentQuestionIndex = (int) $request->query('question', 1);
        $currentQuestionIndex = max(1, min($currentQuestionIndex, count($questions)));

        // Get the current question
        $question = $questions[$currentQuestionIndex - 1];

        // Store selected answers in session (if any)
        $selectedAnswer = session("answer_{$question->id}", null);

        return view('exams.start', compact('exam', 'questions', 'question', 'currentQuestionIndex', 'selectedAnswer'));
    }

    // Store answers temporarily in session (without submission to the database yet)
    public function storeAnswer(Request $request, $examId)
    {
        $exam = Exam::findOrFail($examId);
        $question = $exam->questions()->findOrFail($request->question_id);
        
        // Store answer in session
        session(["answer_{$question->id}" => $request->answer]);

        // Get the current question index
        $currentQuestionIndex = (int) $request->query('question', 1);

        // Redirect to the next question
        return redirect()->route('candidates.exam.start', ['exam' => $examId, 'question' => $currentQuestionIndex + 1]);
    }

    // Submit the exam after all questions have been answered
    public function submitExam(Request $request, $examId)
    {
        $exam = Exam::findOrFail($examId);
        $questions = $exam->questions;

        // Retrieve all answers stored in session
        $answers = [];
        foreach ($questions as $question) {
            $answers[] = [
                'question_id' => $question->id,
                'answer' => session("answer_{$question->id}")
            ];
        }

        // Now you can store these answers in the database
        foreach ($answers as $answerData) {
            $answer = new Answer();
            $answer->exam_id = $examId;
            $answer->question_id = $answerData['question_id'];
            $answer->answer_text = $answerData['answer'];
            $answer->save();
        }

        // Clear session data
        session()->forget('answer_*');

        return redirect()->route('exams.complete', ['exam' => $examId]);
    }
}
