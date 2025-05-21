<?php

namespace App\Http\Controllers;
use App\Models\Exam;
use Illuminate\Http\Request;

class UpcomingExamController extends Controller
{
    //
    public function index()
    {
        // Optional: pass exams data here
        $exams = Exam::with(['group', 'organization'])->withCount('questions')->paginate(10);
       // dd($exams);
        return view('UpcomingExams.index', compact('exams'));
    }
}
