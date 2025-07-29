<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sistema de Biblioteca')</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/atyles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;700;900&family=Noto+Sans:wght@400;500;700;900&display=swap" rel="stylesheet" />
    <style>body { font-family: Lexend, "Noto Sans", sans-serif; }</style>
</head>
<body class="bg-white">
    <div class="d-flex flex-column min-vh-100">
        @include('admin/dashboard/dashboard_admin/nav')
        <div class="container-fluid flex-grow-1 d-flex">
            @include('admin/dashboard/dashboard_admin/sidebar')
            <main class="flex-grow-1 p-4" id="main-content">
                @yield('content')
            </main>
            
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>