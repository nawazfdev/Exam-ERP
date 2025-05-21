<head>
    <meta charset="utf-8">

    <!-- SEO Title - Based on your company and main keywords -->
    <title>{{ $siteSettings->meta_title ?? 'Klinger Kloppe - High-Quality Industrial Solutions' }}</title>

    <!-- Stylesheets -->
    <link href="{{ asset('plugins/revolution/css/settings.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/revolution/css/layers.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/revolution/css/navigation.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon"
        href="{{ $siteSettings->site_favicon ? asset($siteSettings->site_favicon) : asset('images/favicon.png') }}"
        type="image/x-icon">
    <link rel="icon"
        href="{{ $siteSettings->site_favicon ? asset($siteSettings->site_favicon) : asset('images/favicon.png') }}"
        type="image/x-icon">

    <!-- Meta Tags for SEO -->
    <meta name="description"
        content="{{ $siteSettings->meta_description ?? 'Klinger Kloppe offers high-quality industrial solutions, products, and services for manufacturing excellence and support in various industries.' }}">
    <meta name="keywords"
        content="{{ $siteSettings->meta_keywords ?? 'industrial solutions, manufacturing, process technologies, engineering, automation, maintenance support' }}">
    <meta name="author" content="{{ $siteSettings->meta_author ?? 'Klinger Kloppe' }}">
    <meta name="copyright" content="{{ $siteSettings->meta_copyright ?? 'Klinger Kloppe' }}">

    <!-- Open Graph Tags for Social Media Sharing -->
    <meta property="og:title"
        content="{{ $siteSettings->meta_title ?? 'Klinger Kloppe - High-Quality Industrial Solutions' }}">
    <meta property="og:description"
        content="{{ $siteSettings->meta_description ?? 'Klinger Kloppe offers high-quality industrial solutions, products, and services for manufacturing excellence and support in various industries.' }}">
    <meta property="og:image"
        content="{{ $siteSettings->meta_image ? asset('storage/' . $siteSettings->meta_image) : asset('images/default-og-image.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="{{ $siteSettings->site_name ?? 'Klinger Kloppe' }}">

    <!-- Social Media Links -->
    <meta name="facebook" content="{{ $siteSettings->facebook_link }}">
    <meta name="twitter" content="{{ $siteSettings->twitter_link }}">
    <meta name="whatsapp" content="{{ $siteSettings->whatsapp_link }}">
    <meta name="youtube" content="{{ $siteSettings->youtube_link }}">
    <meta name="linkedin" content="{{ $siteSettings->linkedin_link }}">
    <meta name="skype" content="{{ $siteSettings->skype_link }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <!-- Include Animation Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">


</head>

<body>
    <div class="page-wrapper">
        <!-- Preloader -->
        <div class="preloader">
            <div class="spinner"></div>
        </div>

        <header class="main-header">
            <!-- Header Upper -->
            <div class="header-upper">
                <div class="inner-container">
                    <div class="auto-container clearfix">
                        <!--Info-->
                        <div class="logo-outer">
                            <div class="logo">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset(($siteSettings->site_primary_logo ?? 'images/logo.png')) }}"
                                        alt="Logo" title="">
                                </a>
                            </div>
                        </div>
                        <!--Nav Box-->
                        <div class="nav-outer clearfix">
                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="navbar-header">
                                    <!-- Toggle Button -->
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="icon flaticon-menu-button"></span>
                                    </button>
                                </div>

                                <div class="collapse navbar-collapse clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        @foreach($pages as $page)
                                            <li
                                                class="{{ Request::is($page->slug) || Request::is($page->slug . '/*') ? 'current' : '' }}">
                                                <a href="{{ url($page->slug) }}">{{ $page->title }}</a>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </nav>
                            <!-- Main Menu End-->
                        </div>
                    </div>
                </div>
            </div>
            <!--End Header Upper-->

            <!-- Sticky Header -->
            <div class="sticky-header">
                <div class="auto-container clearfix">
                    <!--Logo-->
                    <div class="logo pull-left">
                        <a href="{{ url('/') }}" title=""><img
                                src="{{ asset(($siteSettings->site_primary_logo ?? 'images/logo.png')) }}" alt=""
                                title=""></a>
                    </div>
                    <!--Right Col-->
                    <div class="pull-right">
                        <!-- Main Menu -->
                        <nav class="main-menu">
                            <div class="navbar-collapse show collapse clearfix">
                                <ul class="navigation clearfix">
                                    @foreach($pages as $page)
                                        <li
                                            class="{{ Request::is($page->slug) || Request::is($page->slug . '/*') ? 'current' : '' }}">
                                            <a href="{{ url($page->slug) }}">{{ $page->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>

                            </div>
                        </nav>
                        <!-- Main Menu End-->
                    </div>
                </div>
            </div>
            <!-- End Sticky Menu -->
        </header>