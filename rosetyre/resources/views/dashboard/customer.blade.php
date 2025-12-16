@extends('layouts.app')

@section('title', 'Customer Dashboard - Rose Tyre')

@push('styles')
<style>
    .dashboard-page {
        padding: 40px 20px 60px 20px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: calc(100vh - 200px);
    }

    .dashboard-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .welcome-header {
        background: linear-gradient(135deg, #1e7e34 0%, #28a745 100%);
        color: white;
        padding: 30px;
        border-radius: 15px;
        margin-bottom: 30px;
        box-shadow: 0 6px 20px rgba(30, 126, 52, 0.3);
    }

    .welcome-header h1 {
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .welcome-header p {
        opacity: 0.95;
        font-size: 1.1rem;
    }

    .dashboard-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
        margin-bottom: 30px;
    }

    .dashboard-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        transition: transform 0.3s, box-shadow 0.3s;
        cursor: pointer;
        border-top: 4px solid #1e7e34;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }

    .dashboard-card-icon {
        font-size: 2.5rem;
        margin-bottom: 15px;
    }

    .dashboard-card h3 {
        color: #1e7e34;
        font-size: 1.3rem;
        margin-bottom: 10px;
    }

    .dashboard-card p {
        color: #666;
        margin: 0;
    }

    .recent-section {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .section-title {
        color: #1e7e34;
        font-size: 1.5rem;
        margin-bottom: 20px;
        padding-bottom: 15px;
        border-bottom: 2px solid #e9ecef;
    }

    .booking-item {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 15px;
        border-left: 4px solid #1e7e34;
    }

    .booking-item-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
    }

    .booking-item-title {
        font-weight: 600;
        color: #1e7e34;
    }

    .booking-item-date {
        color: #666;
        font-size: 0.9rem;
    }

    .empty-state {
        text-align: center;
        padding: 40px 20px;
        color: #999;
    }

    @media (max-width: 768px) {
        .dashboard-cards {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
<div class="dashboard-page">
    <div class="dashboard-container">
        <div class="welcome-header">
            <h1>Welcome back, {{ Auth::check() ? Auth::user()->first_name : 'Guest' }}!</h1>
            <p>Manage your tyres, bookings, and orders from your dashboard</p>
            @guest
                <p style="margin-top: 10px; font-size: 0.9rem; opacity: 0.9;">Demo Mode - <a href="{{ route('login') }}" style="color: white; text-decoration: underline;">Login</a> to access your account</p>
            @endguest
        </div>

        <div class="dashboard-cards">
            <a href="{{ route('tyres') }}" style="text-decoration: none;">
                <div class="dashboard-card">
                    <div class="dashboard-card-icon">🛞</div>
                    <h3>Browse Tyres</h3>
                    <p>Find the perfect tyres for your vehicle from our wide selection</p>
                </div>
            </a>

            <a href="{{ route('booking') }}" style="text-decoration: none;">
                <div class="dashboard-card">
                    <div class="dashboard-card-icon">📅</div>
                    <h3>Book a Fitting</h3>
                    <p>Schedule your tyre fitting appointment at your convenience</p>
                </div>
            </a>

            <a href="{{ route('offers') }}" style="text-decoration: none;">
                <div class="dashboard-card">
                    <div class="dashboard-card-icon">🎁</div>
                    <h3>Special Offers</h3>
                    <p>Check out our latest deals and special promotions</p>
                </div>
            </a>

            <a href="{{ route('branches') }}" style="text-decoration: none;">
                <div class="dashboard-card">
                    <div class="dashboard-card-icon">📍</div>
                    <h3>Find a Branch</h3>
                    <p>Locate the nearest Rose Tyre branch to you</p>
                </div>
            </a>
        </div>

        <div class="recent-section">
            <h2 class="section-title">Recent Bookings</h2>
            <div class="empty-state">
                <div style="font-size: 3rem; margin-bottom: 15px;">📋</div>
                <p>No recent bookings</p>
                <p style="font-size: 0.9rem; margin-top: 10px;">Book your first tyre fitting appointment to get started</p>
                <a href="{{ route('booking') }}" class="btn-submit" style="display: inline-block; margin-top: 20px; text-decoration: none; padding: 12px 30px;">Book Now</a>
            </div>
        </div>
    </div>
</div>
@endsection
