<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Dashboard') - {{ config('app.name', 'Pandu Admin') }}</title>

    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=DM+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Dashboard CSS -->
    <link rel="stylesheet" href="{{ asset('/') }}assets/css/dashboard.css">

    <!-- Additional Styles -->
    @stack('styles')
</head>
<body>
    <!-- Background Decorations -->
    <div class="bg-decoration">
        <div class="bg-grid"></div>
        <div class="bg-dots"></div>
    </div>

    <!-- Dashboard Wrapper -->
    <div class="dashboard-wrapper">

        <!-- Sidebar Overlay (Mobile) -->
        <div class="sidebar-overlay"></div>

        <!-- Sidebar -->
        @include('layouts.partials.sidebar')

        <!-- Main Content -->
        <div class="main-content">

            <!-- Header -->
            @include('layouts.partials.header')

            <!-- Page Content -->
            <main class="page-content page-enter">
                @yield('content')
            </main>

        </div>
    </div>

    <!-- Logout Modal -->
    @include('layouts.partials.logout-modal')

    <!-- Dashboard JavaScript -->
    <script src="{{ asset('/') }}assets/js/dashboard.js"></script>

    <!-- Additional Scripts -->
    @stack('scripts')
</body>
</html>
