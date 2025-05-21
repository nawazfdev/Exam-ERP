<!-- resources/views/layouts/main.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Default Title')</title>
    <!-- Add your other meta tags, stylesheets, etc. -->
</head>
<body>
    <!-- Header -->
    @include('front.header')

    <!-- Dynamic Content -->
    <div class="content">
        @yield('content')  <!-- This is where the page content will go -->
    </div>

    <!-- Footer -->
    @include('front.footer')
</body>
</html>
