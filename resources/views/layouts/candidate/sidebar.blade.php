<aside class="candidate-sidebar" id="candidateSidebar">
    <ul class="sidebar-menu">
        <li class="{{ request()->routeIs('candidates.dashboard') ? 'active' : '' }}">
            <a href="{{ route('candidates.dashboard') }}">
                <i class="fas fa-tachometer-alt"></i>
                <span>Dashboard</span>
            </a>
        </li>
        
        <li class="{{ request()->routeIs('candidates.exam.upcoming') ? 'active' : '' }}">
            <a href="{{ route('candidates.exam.upcoming') }}">
                <i class="fas fa-calendar-alt"></i>
                <span>Upcoming Exams</span>
            </a>
        </li>
        
        <li class="{{ request()->routeIs('candidates.results*') ? 'active' : '' }}">
            <a href="{{ route('candidates.results') }}">
                <i class="fas fa-history"></i>
                <span>Exam History</span>
            </a>
        </li>
        
        <li class="{{ request()->routeIs('candidates.results') ? 'active' : '' }}">
            <a href="{{ route('candidates.results') }}">
                <i class="fas fa-chart-line"></i>
                <span>Results</span>
            </a>
        </li>
        
        <li>
            <a href="#" onclick="alert('Feature coming soon!')">
                <i class="fas fa-certificate"></i>
                <span>Certificates</span>
            </a>
        </li>
        
        <li>
            <a href="#" onclick="alert('Feature coming soon!')">
                <i class="fas fa-dumbbell"></i>
                <span>Practice Tests</span>
            </a>
        </li>
        
        <li>
            <a href="#" onclick="alert('Feature coming soon!')">
                <i class="fas fa-book"></i>
                <span>Study Materials</span>
            </a>
        </li>
        
        <li>
            <a href="#" onclick="alert('Feature coming soon!')">
                <i class="fas fa-bullhorn"></i>
                <span>Announcements</span>
            </a>
        </li>
        
        <li class="{{ request()->routeIs('candidates.profile*') ? 'active' : '' }}">
            <a href="{{ route('candidates.profile.show') }}">
                <i class="fas fa-user"></i>
                <span>Profile</span>
            </a>
        </li>
        
        <li>
            <a href="#" onclick="alert('Feature coming soon!')">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
            </a>
        </li>
        
        <li>
            <a href="#" onclick="alert('Feature coming soon!')">
                <i class="fas fa-question-circle"></i>
                <span>Help & Support</span>
            </a>
        </li>

        <!-- Logout -->
        <li>
            <a href="#" onclick="event.preventDefault(); document.getElementById('candidate-logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>

    <!-- Hidden logout form -->
    <form id="candidate-logout-form" action="{{ route('candidates.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</aside>