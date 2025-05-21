<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'USCSC') }}</title>
    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <!-- Custom Icons -->
    <link href="{{ asset('assets/icons/style.css') }}" rel="stylesheet">
    <!-- Additional Styles -->
    @yield('styles')

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>


</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                        {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('profile.show') }}" class="dropdown-item">
                                <i class="mr-2 fas fa-user"></i> {{ __('My Profile') }}
                            </a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="#" class="dropdown-item"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="mr-2 fas fa-sign-out-alt"></i> {{ __('Log Out') }}
                                </a>
                            </form>
                        </div>
                    </li>
                @endauth
            </ul>
        </nav>
        <!-- /.navbar -->
        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light elevation-4">
            <!-- Brand Logo -->
            <a href="/" class="brand-link text-center">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="max-width: 55px;">
            </a>
            @include('layouts.navigation')
        </aside>
        <!-- Content Wrapper -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Control Sidebar</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->
        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- Default to the left -->
            <strong>&copy; 2024 <a href="https://izeesoftsolutions.com/" target="_blank">IzeeSoft
                    Solutions</a>.</strong> All rights reserved.
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                Powered by IzeeSoft
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->
    <!-- REQUIRED SCRIPTS -->
    @vite('resources/js/app.js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/adminlte.min.js') }}" defer></script>

    @yield('scripts')
</body>

</html>