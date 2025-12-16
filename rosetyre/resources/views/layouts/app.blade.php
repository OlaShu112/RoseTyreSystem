<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Rose Tyre')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Apply professional font */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            height: 100%;
        }

        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            font-family: 'Roboto', sans-serif;
        }

        h1, h2 {
            font-weight: 700;
        }

        p {
            font-weight: 400;
        }

        /* Header */
        header {
            background-color: #1e7e34; /* dark green */
            color: white;
            padding: 15px 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            flex-shrink: 0;
        }

        .logo img {
            height: 50px;
            width: auto;
            object-fit: contain;
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .nav-link {
            color: white !important;
            padding: 8px 15px !important;
            transition: background-color 0.3s;
        }

        .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 5px;
        }

        header nav ul {
            margin-bottom: 0;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        header nav ul li {
            list-style: none;
        }

        /* Main Content */
        main {
            flex: 1 0 auto;
            min-height: 0;
        }

        /* Footer */
        footer {
            background-color: #1e7e34;
            color: white;
            padding: 30px 20px;
            flex-shrink: 0;
            width: 100%;
        }

        footer .footer-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 15px;
        }

        footer .footer-links {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
            margin: 10px 0;
        }

        footer a {
            color: white;
            text-decoration: none;
            transition: opacity 0.3s;
        }

        footer a:hover {
            opacity: 0.8;
            text-decoration: underline;
        }

        footer .copyright {
            margin-top: 10px;
            font-size: 0.9rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                padding: 15px;
            }

            header nav ul {
                flex-direction: column;
                width: 100%;
                margin-top: 15px;
            }

            header nav ul li {
                width: 100%;
                text-align: center;
            }

            .logo img {
                height: 40px;
            }

            footer .footer-links {
                flex-direction: column;
                gap: 10px;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Header -->
    <header class="d-flex justify-content-between align-items-center">
        <div class="logo">
            <a href="{{ route('home') }}" style="text-decoration: none; display: flex; align-items: center;">
                <img src="{{ asset('images/logo1.jpeg') }}" alt="Rose Tyre Logo">
            </a>
        </div>
        <nav>
            <ul class="nav">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ route('tyres') }}" class="nav-link">Tyres</a></li>
                <li class="nav-item"><a href="{{ route('booking') }}" class="nav-link">Booking a Fitting</a></li>
                <li class="nav-item"><a href="{{ route('offers') }}" class="nav-link">Special Offers</a></li>
                <li class="nav-item"><a href="{{ route('branches') }}" class="nav-link">Find a Branch</a></li>
                <li class="nav-item"><a href="{{ route('dashboard.customer') }}" class="nav-link">Customer Dashboard</a></li>
                <li class="nav-item"><a href="{{ route('dashboard.admin') }}" class="nav-link">Admin Dashboard</a></li>
                @auth
                    <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link">Logout</a></li>
                @else
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login/Register</a></li>
                @endauth
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-links">
                <a href="{{ route('home') }}">Home</a>
                <a href="{{ route('tyres') }}">Tyres</a>
                <a href="{{ route('booking') }}">Booking</a>
                <a href="{{ route('offers') }}">Offers</a>
                <a href="{{ route('branches') }}">Branches</a>
                <a href="{{ route('login') }}">Login/Register</a>
                <a href="#">Terms & Conditions</a>
                <a href="#">Privacy Policy</a>
            </div>
            <div class="copyright">
                <p>&copy; {{ date('Y') }} Rose Tyre. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
