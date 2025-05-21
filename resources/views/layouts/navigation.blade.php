<style>
    [class*=sidebar-dark-] .sidebar a {
        color: #222324;
    }

    .nav-pills .nav-link:not(.active):hover {
        color: #023e88 !important;
        background: lightgrey !important;
    }

    [class*=sidebar-dark-] .user-panel a:hover {
        color: #023e88;
    }

    .card-primary:not(.card-outline)>.card-header {
        background-color: #17317a;
    }

    .btn-primary {
        color: #fff;
        background-color: #07213c;
        border-color: #07213c;
        box-shadow: none;
    }

    [type='text'],
    [type='email'],
    [type='url'],
    [type='password'],
    [type='number'],
    [type='date'],
    [type='datetime-local'],
    [type='month'],
    [type='search'],
    [type='tel'],
    [type='time'],
    [type='week'],
    [multiple],
    textarea,
    select {
        border-radius: 10px;
    }
</style>
<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('images/user.png') }}" class="" alt="User Image">
        </div>
        <div class="info">
            <a href="{{ route('profile.show') }}" class="d-block">{{ Auth::user()->name }}</a>
        </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Dashboard -->
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('SiteSettings.index') }}"
                    class="nav-link {{ request()->is('admin/SiteSettings') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Site Settings</p>
                </a>
            </li>
            <!-- Content Management -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>
                        Content Management
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @php
                        $menuItems = [
                          //  'HomeSections' => 'fas fa-home',                 // For the home section
                            'Organizations'     => 'fas fa-building',
                            'CandidateGroups'   => 'fas fa-users',            
                            'Candidates'        => 'fas fa-user-graduate', 
                            'Exams'             => 'fas fa-file-alt',
                            'QuestionCategories'=> 'fas fa-list-alt',
                            'Questions'         => 'fas fa-question-circle',
                           // 'Pages' => 'fas fa-file-alt',                    // For pages (general file)
                           // 'AboutUs' => 'fas fa-info-circle',               // About us (info or info-circle)
                           // 'Products' => 'fas fa-box',                      // Products (box)
                           // 'ProcessTechnologies' => 'fas fa-cogs',          // Process technologies (cogs)
                            //'Investors' => 'fas fa-handshake',               // Investors (handshake for partnership)
                            //'IndustryCategories' => 'fas fa-industry',      // Industry categories (industry icon)
                            //'Industries' => 'fas fa-building',               // Industries (building icon)
                           // 'Stories' => 'fas fa-book',                     // Stories (book or article)
                           // 'Testimonials' => 'fas fa-comment-dots',         // Testimonials (speech bubble or comment)
                           // 'BlogCategories' => 'fas fa-th-large',           // Blog categories (grid view)
                           // 'BlogPosts' => 'fas fa-pen-alt',                 // Blog posts (pen or writing)
                        ];
                    @endphp
                    @foreach ($menuItems as $key => $icon)
                        <li class="nav-item {{ request()->is('admin/' . $key . '*') ? 'menu-open' : '' }}">
                            <a href="#" class="nav-link {{ request()->is('admin/' . $key . '*') ? 'active' : '' }}">
                                <i class="nav-icon {{ $icon }}"></i>
                                <p>
                                    {{ $key }}
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route($key . '.create') }}"
                                        class="nav-link {{ request()->is('admin/' . $key . '/create') ? 'active' : '' }}">
                                        <i class="far fa-plus-square nav-icon"></i>
                                        <p>Create</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route($key . '.index') }}"
                                        class="nav-link {{ request()->is('admin/' . $key) ? 'active' : '' }}">
                                        <i class="far fa-eye nav-icon"></i>
                                        <p>Show</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endforeach
                </ul>

            </li>
            <!-- User Management -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-user-cog"></i>
                    <p>
                        User Management
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    @php
                        $userMenuItems = [
                            'users' => ['fas fa-user', 'User'],
                            'Roles' => ['fas fa-user-shield', 'Role']
                        ];
                    @endphp
                    @foreach ($userMenuItems as $key => $item)
                        <li class="nav-item {{ request()->is('admin/' . $key . '*') ? 'menu-open' : '' }}">
                            <a href="{{ route($key . '.index') }}"
                                class="nav-link {{ request()->is('admin/' . $key) ? 'active' : '' }}">
                                <i class="nav-icon {{ $item[0] }}"></i>
                                <p>{{ $item[1] }}</p>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
            <!-- Other sections can be added here following the same pattern -->
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->