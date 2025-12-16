@extends('layouts.app')

@section('title', 'Admin Dashboard - Rose Tyre')

@push('styles')
<style>
    .dashboard-page {
        padding: 40px 20px 60px 20px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: calc(100vh - 200px);
    }

    .dashboard-container {
        max-width: 1400px;
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

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
        margin-bottom: 30px;
    }

    .stat-card {
        background: white;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        border-top: 4px solid;
    }

    .stat-card.primary {
        border-top-color: #1e7e34;
    }

    .stat-card.success {
        border-top-color: #28a745;
    }

    .stat-card.warning {
        border-top-color: #ffc107;
    }

    .stat-card.danger {
        border-top-color: #dc3545;
    }

    .stat-card-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .stat-card-label {
        color: #666;
        font-size: 0.95rem;
        font-weight: 500;
    }

    .stat-card-icon {
        font-size: 2rem;
    }

    .stat-card-value {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1e7e34;
    }

    .stat-card-change {
        font-size: 0.85rem;
        color: #28a745;
    }

    .dashboard-sections {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 25px;
    }

    .dashboard-section {
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

    .quick-action {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 15px;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 15px;
        transition: background 0.3s;
        cursor: pointer;
        text-decoration: none;
        color: inherit;
    }

    .quick-action:hover {
        background: #e9ecef;
    }

    .quick-action-icon {
        font-size: 1.5rem;
    }

    .quick-action-text {
        flex: 1;
    }

    .quick-action-text h4 {
        color: #1e7e34;
        margin: 0 0 5px 0;
        font-size: 1rem;
    }

    .quick-action-text p {
        color: #666;
        margin: 0;
        font-size: 0.9rem;
    }

    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }

        .dashboard-sections {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
<div class="dashboard-page">
    <div class="dashboard-container">
        <div class="welcome-header">
            <h1>Admin Dashboard</h1>
            <p>Welcome back, {{ Auth::check() ? Auth::user()->first_name : 'Admin' }}! Manage your entire system from here</p>
            @guest
                <p style="margin-top: 10px; font-size: 0.9rem; opacity: 0.9;">Demo Mode - <a href="{{ route('login') }}" style="color: white; text-decoration: underline;">Login</a> as admin to access full features</p>
            @endguest
        </div>

        <div class="stats-grid">
            <div class="stat-card primary">
                <div class="stat-card-info">
                    <div class="stat-card-label">Total Orders</div>
                    <div class="stat-card-icon">📦</div>
                </div>
                <div class="stat-card-value">156</div>
                <div class="stat-card-change">↑ 12% from last month</div>
            </div>

            <div class="stat-card success">
                <div class="stat-card-info">
                    <div class="stat-card-label">Active Bookings</div>
                    <div class="stat-card-icon">📅</div>
                </div>
                <div class="stat-card-value">42</div>
                <div class="stat-card-change">↑ 8% from last week</div>
            </div>

            <div class="stat-card warning">
                <div class="stat-card-info">
                    <div class="stat-card-label">Total Customers</div>
                    <div class="stat-card-icon">👥</div>
                </div>
                <div class="stat-card-value">1,234</div>
                <div class="stat-card-change">↑ 5% from last month</div>
            </div>

            <div class="stat-card danger">
                <div class="stat-card-info">
                    <div class="stat-card-label">Pending Tasks</div>
                    <div class="stat-card-icon">⚠️</div>
                </div>
                <div class="stat-card-value">8</div>
                <div class="stat-card-change">↓ 3 from yesterday</div>
            </div>
        </div>

        <div class="dashboard-sections">
            <div class="dashboard-section">
                <h2 class="section-title">Quick Actions</h2>
                <a href="{{ route('tyres') }}" class="quick-action">
                    <div class="quick-action-icon">🛞</div>
                    <div class="quick-action-text">
                        <h4>Manage Tyres</h4>
                        <p>Add, edit, or remove tyres from inventory</p>
                    </div>
                </a>
                <a href="{{ route('booking') }}" class="quick-action">
                    <div class="quick-action-icon">📅</div>
                    <div class="quick-action-text">
                        <h4>View Bookings</h4>
                        <p>Manage all customer bookings and appointments</p>
                    </div>
                </a>
                <a href="{{ route('offers') }}" class="quick-action">
                    <div class="quick-action-icon">🎁</div>
                    <div class="quick-action-text">
                        <h4>Manage Offers</h4>
                        <p>Create and manage special offers and promotions</p>
                    </div>
                </a>
                <a href="{{ route('branches') }}" class="quick-action">
                    <div class="quick-action-icon">📍</div>
                    <div class="quick-action-text">
                        <h4>Manage Branches</h4>
                        <p>Add or update branch locations and information</p>
                    </div>
                </a>
            </div>

            <div class="dashboard-section">
                <h2 class="section-title">Recent Activity</h2>
                <div style="padding: 20px; text-align: center; color: #999;">
                    <div style="font-size: 2rem; margin-bottom: 10px;">📊</div>
                    <p>No recent activity to display</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
