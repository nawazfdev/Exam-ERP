<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Exam;
use App\Models\ExamAttempt;
use App\Models\CandidateGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizationAdminController extends Controller
{
    public function dashboard()
    {
        $organizationId = Auth::user()->organization_id;

        $stats = [
            'total_candidates' => Candidate::where('organization_id', $organizationId)->count(),
            'active_candidates' => Candidate::where('organization_id', $organizationId)
                                          ->where('status', 'active')->count(),
            'total_exams' => Exam::where('organization_id', $organizationId)->count(),
            'total_attempts' => ExamAttempt::whereHas('exam', function($query) use ($organizationId) {
                $query->where('organization_id', $organizationId);
            })->count(),
            'candidate_groups' => CandidateGroup::where('organization_id', $organizationId)->count(),
        ];

        $recentCandidates = Candidate::where('organization_id', $organizationId)
                                   ->with('group')
                                   ->latest()
                                   ->take(5)
                                   ->get();

        $recentExamAttempts = ExamAttempt::whereHas('exam', function($query) use ($organizationId) {
                                         $query->where('organization_id', $organizationId);
                                     })
                                     ->with(['candidate', 'exam'])
                                     ->latest()
                                     ->take(5)
                                     ->get();

        return view('organization.dashboard', compact('stats', 'recentCandidates', 'recentExamAttempts'));
    }

    public function results()
    {
        $organizationId = Auth::user()->organization_id;

        $results = ExamAttempt::whereHas('exam', function($query) use ($organizationId) {
                              $query->where('organization_id', $organizationId);
                          })
                          ->with(['candidate', 'exam'])
                          ->latest()
                          ->paginate(20);

        return view('organization.results', compact('results'));
    }

    public function reports()
    {
        $organizationId = Auth::user()->organization_id;

        // Generate various reports for the organization
        $passRates = ExamAttempt::whereHas('exam', function($query) use ($organizationId) {
                                $query->where('organization_id', $organizationId);
                            })
                            ->selectRaw('
                                COUNT(*) as total_attempts,
                                SUM(CASE WHEN status = "pass" THEN 1 ELSE 0 END) as passed,
                                ROUND((SUM(CASE WHEN status = "pass" THEN 1 ELSE 0 END) / COUNT(*)) * 100, 2) as pass_rate
                            ')
                            ->first();

        $examStats = Exam::where('organization_id', $organizationId)
                        ->withCount('examAttempts')
                        ->get();

        return view('organization.reports', compact('passRates', 'examStats'));
    }
}