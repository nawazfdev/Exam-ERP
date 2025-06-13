<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\Exam;
use App\Models\ExamAttempt;
use App\Models\CandidateGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CandidateController extends Controller
{
    /**
     * Show candidate dashboard
     */
    public function dashboard()
    {
        $candidate = auth()->guard('candidate')->user();
        
        // Get candidate's upcoming exams
        $upcomingExams = Exam::where('candidate_group_id', $candidate->candidate_group_id)
                            ->with(['group', 'organization'])
                            ->withCount('questions')
                            ->get();
        
        // Get candidate's exam attempts/history
        $examAttempts = ExamAttempt::where('candidate_id', $candidate->id)
                                   ->with('exam')
                                   ->latest()
                                   ->get();
        
        return view('candidates.dashboard', compact('upcomingExams', 'examAttempts'));
    }

    /**
     * Show exam history
     */
    public function examHistory()
    {
        $candidate = auth()->guard('candidate')->user();
        
        $examAttempts = ExamAttempt::where('candidate_id', $candidate->id)
                                   ->with(['exam', 'exam.organization'])
                                   ->latest()
                                   ->paginate(10);
        
        return view('candidates.exam-history', compact('examAttempts'));
    }

    /**
     * Show results
     */
    public function results()
    {
        $candidate = auth()->guard('candidate')->user();
        
        $results = ExamAttempt::where('candidate_id', $candidate->id)
                              ->with(['exam', 'exam.organization'])
                              ->where('status', '!=', null)
                              ->latest()
                              ->paginate(10);
        
        return view('candidates.results', compact('results'));
    }

    /**
     * Show certificates
     */
    public function certificates()
    {
        $candidate = auth()->guard('candidate')->user();
        
        $certificates = ExamAttempt::where('candidate_id', $candidate->id)
                                   ->where('status', 'pass')
                                   ->with(['exam', 'exam.organization'])
                                   ->latest()
                                   ->paginate(10);
        
        return view('candidates.certificates', compact('certificates'));
    }

    /**
     * Show practice tests
     */
    public function practiceTests()
    {
        $candidate = auth()->guard('candidate')->user();
        
        // Get practice exams (you might want to add a 'type' field to exams table)
        $practiceTests = Exam::where('candidate_group_id', $candidate->candidate_group_id)
                             ->where('exam_type', 'practice') // Assuming you add this field
                             ->with(['group', 'organization'])
                             ->withCount('questions')
                             ->paginate(10);
        
        return view('candidates.practice-tests', compact('practiceTests'));
    }

    /**
     * Show study materials
     */
    public function studyMaterials()
    {
        $candidate = auth()->guard('candidate')->user();
        
        // This would typically come from a study_materials table
        $materials = []; // Placeholder - implement based on your requirements
        
        return view('candidates.study-materials', compact('materials'));
    }

    /**
     * Show announcements
     */
    public function announcements()
    {
        $candidate = auth()->guard('candidate')->user();
        
        // This would typically come from an announcements table
        $announcements = []; // Placeholder - implement based on your requirements
        
        return view('candidates.announcements', compact('announcements'));
    }

    /**
     * Show profile
     */
    public function profile()
    {
        $candidate = auth()->guard('candidate')->user();
        $candidateGroups = CandidateGroup::where('organization_id', $candidate->organization_id)->get();
        
        return view('candidates.profile', compact('candidate', 'candidateGroups'));
    }

    /**
     * Update profile
     */
    public function updateProfile(Request $request)
    {
        $candidate = auth()->guard('candidate')->user();
        
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:candidates,email,' . $candidate->id,
            'mobile' => 'nullable|string|max:20',
            'national_id' => 'nullable|string|max:50|unique:candidates,national_id,' . $candidate->id,
        ]);

        $candidate->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'national_id' => $request->national_id,
        ]);

        return redirect()->route('candidates.profile')->with('success', 'Profile updated successfully.');
    }

    /**
     * Show settings
     */
    public function settings()
    {
        $candidate = auth()->guard('candidate')->user();
        
        return view('candidates.settings', compact('candidate'));
    }

    /**
     * Update settings
     */
    public function updateSettings(Request $request)
    {
        $candidate = auth()->guard('candidate')->user();
        
        $request->validate([
            'current_password' => 'required_with:new_password',
            'new_password' => 'nullable|min:8|confirmed',
        ]);

        // Update password if provided
        if ($request->filled('new_password')) {
            if (!Hash::check($request->current_password, $candidate->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect.']);
            }
            
            $candidate->update([
                'password' => Hash::make($request->new_password)
            ]);
        }

        return redirect()->route('candidates.settings')->with('success', 'Settings updated successfully.');
    }

    /**
     * Show help page
     */
    public function help()
    {
        return view('candidates.help');
    }

    // Existing methods...
    public function index()
    {
        $candidates = Candidate::with('group', 'createdBy')->paginate(10);
        return view('Candidates.index', compact('candidates'));
    }

    public function create()
    {
        $candidateGroups = CandidateGroup::all();
        $users = User::all();
        return view('Candidates.create', compact('candidateGroups', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:candidates,email',
            'username' => 'required|string|max:255|unique:candidates,username',
            'password' => 'required|string|min:6',
            'candidate_group' => 'required|exists:candidate_groups,id',
            'mobile' => 'required|digits_between:10,15',
            'national_id' => 'required|digits_between:10,20|unique:candidates,national_id',
            'special_needs' => 'required|in:disable,enable',
            'status' => 'required|in:active,inactive',
        ]);

        Candidate::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'candidate_group_id' => $request->candidate_group,
            'mobile' => $request->mobile,
            'national_id' => $request->national_id,
            'special_needs' => $request->special_needs,
            'status' => $request->status,
            'created_by' => auth()->id(),
            'organization_id' => auth()->user()->organization_id,
        ]);

        return redirect()->route('Candidates.index')->with('success', 'Candidate created successfully!');
    }

    public function edit($id)
    {
        $candidate = Candidate::findOrFail($id);
        $candidateGroups = CandidateGroup::all();

        return view('candidates.edit', compact('candidate', 'candidateGroups'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:candidates,email,' . $id,
            'username' => 'required|string|max:255|unique:candidates,username,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
            'candidate_group' => 'required|exists:candidate_groups,id',
            'mobile' => 'nullable|numeric',
            'national_id' => 'nullable|numeric',
            'special_needs' => 'required|in:enable,disable',
            'status' => 'required|in:active,inactive',
        ]);

        $candidate = Candidate::findOrFail($id);
        $candidate->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password ? bcrypt($request->password) : $candidate->password,
            'candidate_group' => $request->candidate_group,
            'mobile' => $request->mobile,
            'national_id' => $request->national_id,
            'special_needs' => $request->special_needs,
            'status' => $request->status,
        ]);

        return redirect()->route('Candidates.index')->with('success', 'Candidate updated successfully.');
    }

    public function destroy($id)
    {
        $candidate = Candidate::findOrFail($id);
        $candidate->delete();

        return redirect()->route('Candidates.index')->with('success', 'Candidate deleted successfully.');
    }
}

// =======================================================================================
// app/Http/Controllers/CandidateAuthController.php - New Controller for Candidate Auth
// =======================================================================================

<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\CandidateGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CandidateAuthController extends Controller
{
    /**
     * Show candidate login form
     */
    public function showLoginForm()
    {
        return view('candidates.auth.login');
    }

    /**
     * Handle candidate login
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('candidate')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('candidates.dashboard'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Handle candidate logout
     */
    public function logout(Request $request)
    {
        Auth::guard('candidate')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('candidate.login');
    }

    /**
     * Show candidate registration form
     */
    public function showRegistrationForm()
    {
        $candidateGroups = CandidateGroup::where('is_public', true)->get(); // Assuming public groups
        return view('candidates.auth.register', compact('candidateGroups'));
    }

    /**
     * Handle candidate registration
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:candidates',
            'username' => 'required|string|max:255|unique:candidates',
            'password' => 'required|string|min:8|confirmed',
            'candidate_group_id' => 'required|exists:candidate_groups,id',
            'mobile' => 'nullable|string|max:20',
            'national_id' => 'nullable|string|max:50|unique:candidates',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $candidateGroup = CandidateGroup::findOrFail($request->candidate_group_id);

        $candidate = Candidate::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'candidate_group_id' => $request->candidate_group_id,
            'organization_id' => $candidateGroup->organization_id,
            'mobile' => $request->mobile,
            'national_id' => $request->national_id,
            'status' => 'active',
            'special_needs' => 'disable',
            'created_by' => 1, // System created
        ]);

        Auth::guard('candidate')->login($candidate);

        return redirect()->route('candidates.dashboard')->with('success', 'Registration successful!');
    }
}

// =======================================================================================
// app/Http/Middleware/CandidateAuth.php - New Middleware for Candidate Authentication
// =======================================================================================

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CandidateAuth
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::guard('candidate')->check()) {
            return redirect()->route('candidate.login');
        }

        // Check if candidate is active
        $candidate = Auth::guard('candidate')->user();
        if ($candidate->status !== 'active') {
            Auth::guard('candidate')->logout();
            return redirect()->route('candidate.login')
                           ->withErrors(['account' => 'Your account has been deactivated.']);
        }

        return $next($request);
    }
}