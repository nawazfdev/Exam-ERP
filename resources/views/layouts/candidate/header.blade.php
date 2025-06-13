<nav class="candidate-header navbar navbar-expand-lg">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="navbar-brand" href="">
            <i class="fas fa-graduation-cap me-2"></i>
            Candidate Portal
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler d-lg-none" type="button" id="mobileSidebarToggle">
            <i class="fas fa-bars text-white"></i>
        </button>

        <!-- Desktop Toggle -->
        <button class="btn btn-link text-white d-none d-lg-block" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Right Side Navigation -->
        <div class="navbar-nav ms-auto">
            <!-- Notifications -->
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                    <i class="fas fa-bell"></i>
                    <span class="badge bg-danger badge-sm">3</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><h6 class="dropdown-header">Notifications</h6></li>
                    <li><a class="dropdown-item" href="#">New exam available</a></li>
                    <li><a class="dropdown-item" href="#">Result published</a></li>
                    <li><a class="dropdown-item" href="#">Exam reminder</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-center" href="#">View All</a></li>
                </ul>
            </div>

            <!-- User Profile -->
            <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                    <div class="avatar me-2">
                        <i class="fas fa-user-circle fa-lg"></i>
                    </div>
                    <!-- <span>{{ auth()->user()->first_name ?? 'Candidate' }}</span> -->
                    <span>Canidate</span>

                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><h6 class="dropdown-header">{{ auth()->user()->first_name }} {{ auth()->user()->last_name }}</h6></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href=" ">
                        <i class="fas fa-user me-2"></i>Profile
                    </a></li>
                    <li><a class="dropdown-item" href="">
                        <i class="fas fa-cog me-2"></i>Settings
                    </a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="" class="d-inline">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>