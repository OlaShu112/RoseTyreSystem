<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rose Tyre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Apply professional font */
        body {
            font-family: 'Roboto', sans-serif;
        }
        h1, h2 {
            font-weight: 700;
        }
        p {
            font-weight: 400;
        }

        /* Header & Footer */
        header {
            background-color: #1e7e34; /* dark green */
            color: white;
            padding: 15px 30px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        footer {
            background-color: #1e7e34; /* dark green */
            color: white;
            padding: 30px 20px;
            margin-top: 50px;
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

        /* Intro Section */
        .intro-section {
            padding: 80px 20px;
            text-align: center;
            background: #f8f9fa;
        }

        .intro-section h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .intro-section p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        /* Browse Button */
        .btn-browse {
            background-color: #1e7e34;
            color: white;
            padding: 12px 25px;
            font-size: 1.1rem;
            margin-bottom: 50px;
        }

        .btn-browse:hover {
            background-color: #16692c;
            color: white;
        }

        /* Booking Tyres Section */
        .booking-section {
            padding: 60px 20px;
            background-color: #dc3545; /* red background */
            color: white;
            text-align: center;
        }

        .booking-section h2 {
            margin-bottom: 20px;
        }

        .booking-section p {
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .tyres-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
            padding: 0 20px;
        }

        .tyre-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            transition: transform 0.3s, box-shadow 0.3s;
            cursor: pointer;
        }

        .tyre-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.25);
        }

        .tyre-card img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            display: block;
        }

        .tyre-card .tyre-info {
            padding: 20px;
            text-align: center;
        }

        .tyre-card .tyre-info h3 {
            color: #1e7e34;
            margin-bottom: 10px;
            font-size: 1.3rem;
        }

        .tyre-card .tyre-info p {
            color: #666;
            margin: 0;
        }

        /* Footer Links */
        footer {
            background-color: #1e7e34;
            color: white;
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

            .intro-section h1 {
                font-size: 2rem;
            }

            .tyres-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .tyre-card img {
                height: 200px;
            }
        }
    </style>
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
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login/Register</a></li>
            </ul>
        </nav>
    </header>

    <!-- Intro Section -->
    <section class="intro-section">
        <h1>Find and Book Your Tyres</h1>
        <p>Trusted by thousands of drivers, Rose Tyre offers premium tyres and expert fitting services tailored to your needs. Your safety and satisfaction are our priority.</p>
        <a href="{{ route('tyres') }}" class="btn btn-browse">Browse Tyres</a>
    </section>

    <!-- Booking Tyres Section -->
    <section class="booking-section">
        <h2>Book Tyre and Fitting</h2>
        <p>Ready to upgrade your tyres? Browse our range, choose your fitment slot, and get on the road safely with Rose Tyre's professional service.</p>
        <div class="tyres-grid">
            <div class="tyre-card" onclick="window.location.href='{{ route('tyres') }}'">
                <img src="{{ asset('images/tier1.jpeg') }}" alt="Premium Tyre">
                <div class="tyre-info">
                    <h3>Premium Tyres</h3>
                    <p>Top quality tyres for maximum performance</p>
                </div>
            </div>
            <div class="tyre-card" onclick="window.location.href='{{ route('tyres') }}'">
                <img src="{{ asset('images/tier2.jpeg') }}" alt="Standard Tyre">
                <div class="tyre-info">
                    <h3>Standard Tyres</h3>
                    <p>Reliable tyres for everyday driving</p>
                </div>
            </div>
            <div class="tyre-card" onclick="window.location.href='{{ route('tyres') }}'">
                <img src="{{ asset('images/tier3.jpeg') }}" alt="Economy Tyre">
                <div class="tyre-info">
                    <h3>Economy Tyres</h3>
                    <p>Affordable tyres without compromising safety</p>
                </div>
            </div>
            <div class="tyre-card" onclick="window.location.href='{{ route('tyres') }}'">
                <img src="{{ asset('images/tier5.jpeg') }}" alt="Special Tyre">
                <div class="tyre-info">
                    <h3>Special Tyres</h3>
                    <p>Specialized tyres for unique requirements</p>
                </div>
            </div>
        </div>
        <div style="margin-top: 40px;">
            <a href="{{ route('booking') }}" class="btn btn-browse" style="background-color: white; color: #dc3545;">Book Your Fitting Now</a>
        </div>
    </section>

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
