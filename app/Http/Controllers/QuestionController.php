<?php

namespace App\Http\Controllers;
use App\Models\Exam;
use App\Models\Question;
use App\Models\QuestionCategory;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::with('exam')->paginate(10);
        return view('Questions.index', compact('questions'));
    }

    public function create()
    {
        $exams = Exam::all();
        $questionCategories = QuestionCategory::all();
        return view('Questions.create', compact('exams', 'questionCategories'));
    }

    public function store(Request $request)
    {
       // dd($request->all());
       // dd(1);
        // Validate the incoming data
        $request->validate([
            'exam_id' => 'required|exists:exams,id',
            'question_type' => 'required|string',
            'question_text' => 'required|string',
            'correct_option' => 'required|string',
            'options' => 'nullable|array',
            'explanation' => 'nullable|string',
        ]);

        // Prepare the question data
        $questionData = [
            'exam_id' => $request->exam_id,
            'question_type' => $request->question_type,
            'question_text' => $request->question_text,
            'correct_option' => $request->correct_option,
            'options' => json_encode($request->options), // Store options as JSON
            'explanation' => $request->explanation,
        ];

        // Create the new question
        Question::create($questionData);

        return redirect()->route('Questions.index')->with('success', 'Question created successfully.');
   
    }

    public function edit($id)
{
    $question = Question::findOrFail($id);
    $exams = Exam::all();
    $questionCategories = QuestionCategory::all();

    // Ensure options is an array and only decode if it's a string
    if (is_string($question->options)) {
        $question->options = json_decode($question->options, true) ?? [];
    }

    // If options is null, set it to an empty array
    if (is_null($question->options)) {
        $question->options = [];
    }

    return view('Questions.edit', compact('question', 'exams', 'questionCategories'));
}

    

    // public function update(Request $request, $id)
    // {
    //     $question = Question::findOrFail($id);
    
    //     // Validate common fields
    //     $request->validate([
    //         'exam_id' => 'required|exists:exams,id',
    //         'question_type' => 'required|string',
    //         'question_text' => 'required|string',
    //     ]);
    
    //     $question->exam_id = $request->exam_id;
    //     $question->question_type = $request->question_type;
    //     $question->question_text = $request->question_text;
    //     $question->explanation = $request->explanation;
    
    //     // Handle different question types
    //     if ($request->question_type === 'multiple_choice') {
    //         $request->validate([
    //             'options' => 'required|array|min:2',
    //             'correct_option' => 'required|numeric|in:' . implode(',', array_keys($request->options))
    //         ]);
    
    //         $question->options = json_encode($request->options);
    //         $question->correct_option = $request->correct_option;
    
    //     } elseif ($request->question_type === 'true_false') {
    //         $request->validate([
    //             'correct_option' => 'required|in:True,False',
    //         ]);
    //         $question->options = null;
    //         $question->correct_option = $request->correct_option;
    
    //     } elseif ($request->question_type === 'paragraph') {
    //         $request->validate([
    //             'correct_option' => 'nullable|string',
    //         ]);
    //         $question->options = null;
    //         $question->correct_option = $request->correct_option;
    
    //     } elseif ($request->question_type === 'fill_in_the_blank') {
    //         $request->validate([
    //             'correct_option' => 'required|string',
    //         ]);
    //         $question->options = null;
    //         $question->correct_option = $request->correct_option;
    
    //     } else {
    //         return back()->withErrors(['question_type' => 'Invalid question type.']);
    //     }
    
    //     $question->save();
    
    //     return redirect()->route('Questions.index')->with('success', 'Question updated successfully.');
    // }
    
    public function update(Request $request, $id)
    {
       // dd($request->all());
        $question = Question::findOrFail($id);
    
        // Normalize the type
        $type = preg_replace('/[^a-z0-9]+/', '_', strtolower($request->question_type));

        switch ($type) {
            case 'multiple_choice':
                $question->options = $request->options;
                $question->correct_option = $request->correct_option;
                break;
        
            case 'true_false':
                $question->options = ['True', 'False'];
                $question->correct_option = $request->correct_option;
                break;
        
            case 'fill_in_the_blank':
            case 'paragraph':
                $question->options = null;
                $question->correct_option = $request->correct_option;
                break;
        }
        
        $question->exam_id = $request->exam_id;
        $question->question_type = $type;
        $question->question_text = $request->question_text;
        $question->explanation = $request->explanation;
        $question->save();
        return redirect()->route('Questions.index')->with('success', 'Question updated successfully!');
    }
    

    public function destroy(Question $question)
    {
        $question->delete();
        return redirect()->route('Questions.index')->with('success', 'Question deleted successfully!');
    }
}
