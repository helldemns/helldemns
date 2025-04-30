<!DOCTYPE html>
<html lang="en" id="htmlTag" data-bs-theme="light">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Monarch Store</title>

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css/animate.min.css">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Custom Style -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            color: #212529;
            transition: background-color 0.5s, color 0.5s;
        }

        .navbar {
            background-color: transparent !important;
            color: #000 !important;
        }

        .navbar .navbar-brand,
        .navbar .menu-icon,
        .navbar .dropdown-item,
        .navbar .dropdown-item-text,
        .navbar .form-control {
            color: #000 !important;
        }

        .dark-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 50px;
            padding: 10px 20px;
            font-weight: bold;
            cursor: pointer;
            z-index: 9999;
            box-shadow: 0 2px 6px rgba(0,0,0,0.3);
            transition: background-color 0.3s, color 0.3s;
        }

        /* Dark Mode */
        .dark-mode {
            background-color: #121212;
            color: #ffffff;
        }

        .dark-mode .navbar {
            color: #fff !important;
        }

        .dark-mode .navbar .navbar-brand,
        .dark-mode .navbar .menu-icon,
        .dark-mode .navbar .dropdown-item,
        .dark-mode .navbar .dropdown-item-text,
        .dark-mode .navbar .form-control {
            color: #fff !important;
        }

        .dark-mode .table {
            background-color: #1e1e1e;
            color: #fff;
        }

        .dark-mode thead th {
            background-color: #2c2c2c !important;
        }

        .dark-mode .btn-outline-dark {
            color: #ffffff;
            border-color: #ffffff;
        }

        .dark-mode .btn-outline-dark:hover {
            background-color: #ffffff;
            color: #121212;
        }

        .dark-mode .bg-light {
            background-color: #2c2c2c !important;
        }

        .dark-mode .alert {
            background-color: #1e1e1e;
            color: #fff;
            border-color: #333;
        }

        .table {
            border-radius: 15px;
            overflow: hidden;
        }

        thead th {
            background-color: #f1f1f1;
            font-weight: 600;
        }

        footer {
            text-align: center;
            padding: 20px 0;
        }

        .dark-mode footer {
            color: #ffffff;
            box-shadow: none;
        }
    </style>
</head>

<body class="animate__animated animate__fadeIn">

    <!-- Dark Mode Toggle -->
    <button id="darkToggle" class="dark-toggle">🌙 Dark</button>

    <div id="app">
        @include('layouts.navbar')
        <main class="py-4">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer>
            <div class="container">
                <small>© {{ date('Y') }} Monarch. All rights reserved.</small>
            </div>
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const darkToggle = document.getElementById('darkToggle');
        const body = document.body;
        const htmlTag = document.getElementById('htmlTag');

        if (localStorage.getItem('theme') === 'dark') {
            body.classList.add('dark-mode');
            htmlTag.setAttribute('data-bs-theme', 'dark');
            darkToggle.innerHTML = '☀️ Light';
        }

        darkToggle.addEventListener('click', function () {
            body.classList.toggle('dark-mode');
            const isDark = body.classList.contains('dark-mode');
            localStorage.setItem('theme', isDark ? 'dark' : 'light');
            htmlTag.setAttribute('data-bs-theme', isDark ? 'dark' : 'light');
            darkToggle.innerHTML = isDark ? '☀️ Light' : '🌙 Dark';
        });
    </script>

    @stack('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
