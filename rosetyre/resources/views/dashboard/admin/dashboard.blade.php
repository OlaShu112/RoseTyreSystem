{{-- resources/views/admin/dashboard.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="d-flex">

    {{-- Sidebar --}}
    <div class="sidebar d-flex flex-column">
        <h2>Menu</h2>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-link text-white text-start">Dashboard</a>
        <a href="{{ route('admin.orders') }}" class="btn btn-link text-white text-start">Manage Orders</a>
        <a href="{{ route('admin.reports') }}" class="btn btn-link text-white text-start">Reports & Analytics</a>
        <a href="{{ route('admin.returns') }}" class="btn btn-link text-white text-start">Returns</a>
        <a href="{{ route('admin.stock_requests') }}" class="btn btn-link text-white text-start">Stock Requests</a>
        <a href="{{ route('admin.tyres') }}" class="btn btn-link text-white text-start">Manage Tyres</a>
        <a href="#user-management" class="btn btn-link text-white text-start">User Management</a>
        <a href="{{ route('admin.settings') }}" class="btn btn-link text-white text-start">Settings</a>
        <form method="POST" action="{{ route('logout') }}" class="mt-auto">
            @csrf
            <button type="submit" class="logout btn w-100">Logout</button>
        </form>
    </div>

    {{-- Main Content --}}
    <div class="main-content flex-1">
        {{-- Header --}}
        <div class="header">
            <h1>System Administration Dashboard</h1>
            <p>Welcome back, System Administrator — Manage entire system</p>
        </div>

        {{-- Top Summary --}}
        <div class="d-flex justify-content-around gap-4 mb-4">
            <div class="summary-card bg-primary flex-1">
                <p>Orders</p>
                <h2>{{ $ordersCount ?? 0 }}</h2>
            </div>
            <div class="summary-card bg-success flex-1">
                <p>Bookings</p>
                <h2>{{ $bookingsCount ?? 0 }}</h2>
            </div>
            <div class="summary-card bg-warning flex-1">
                <p>Total Users</p>
                <h2>{{ $usersCount ?? 0 }}</h2>
            </div>
        </div>

        {{-- User Management Section --}}
        <div id="user-management" class="chart-container mb-4">
            <h4 class="mb-3">User Management</h4>

            {{-- Create New User --}}
            <div class="mb-4 p-3 border rounded">
                <h5>Create New User</h5>
                <form method="POST" action="{{ route('admin.users.store') }}">
                    @csrf
                    <div class="row mb-2">
                        <div class="col">
                            <input type="text" name="first_name" class="form-control" placeholder="First Name" required>
                        </div>
                        <div class="col">
                            <input type="text" name="last_name" class="form-control" placeholder="Last Name" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <input type="email" name="email" class="form-control" placeholder="Email" required>
                        </div>
                        <div class="col">
                            <input type="password" name="password" class="form-control" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <select name="role" class="form-select" required>
                                <option value="">Select Role</option>
                                <option value="admin">Admin</option>
                                <option value="staff">Staff</option>
                                <option value="customer">Customer</option>
                            </select>
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-success w-100">Create User</button>
                        </div>
                    </div>
                </form>
            </div>

            {{-- Users Table --}}
            <h5 class="mt-4">All Users</h5>
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ ucfirst($user->role) }}</td>
                                <td>{{ $user->created_at->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection
