@extends('layouts.app')

@section('title', 'Register - Rose Tyre')

@push('styles')
<style>
    .auth-page {
        padding: 60px 20px;
        min-height: calc(100vh - 200px);
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .auth-container {
        max-width: 600px;
        width: 100%;
    }

    .auth-card {
        background: white;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.1);
    }

    .auth-header {
        text-align: center;
        margin-bottom: 30px;
    }

    .auth-header h1 {
        color: #1e7e34;
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .auth-header p {
        color: #666;
        font-size: 0.95rem;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #333;
        font-weight: 500;
        font-size: 0.95rem;
    }

    .form-group label .required {
        color: #dc3545;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 15px;
    }

    .form-control {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 1rem;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .form-control:focus {
        outline: none;
        border-color: #1e7e34;
        box-shadow: 0 0 0 3px rgba(30, 126, 52, 0.1);
    }

    .btn-submit {
        background: linear-gradient(135deg, #1e7e34 0%, #28a745 100%);
        color: white;
        padding: 14px 30px;
        border: none;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: 600;
        width: 100%;
        transition: transform 0.2s, box-shadow 0.2s;
        cursor: pointer;
    }

    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(30, 126, 52, 0.4);
    }

    .auth-footer {
        text-align: center;
        margin-top: 25px;
        padding-top: 25px;
        border-top: 1px solid #e9ecef;
    }

    .auth-footer a {
        color: #1e7e34;
        text-decoration: none;
        font-weight: 500;
    }

    .auth-footer a:hover {
        text-decoration: underline;
    }

    .alert {
        padding: 12px 15px;
        border-radius: 8px;
        margin-bottom: 20px;
    }

    .alert-danger {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    @media (max-width: 768px) {
        .form-row {
            grid-template-columns: 1fr;
        }

        .auth-card {
            padding: 25px;
        }
    }
</style>
@endpush

@section('content')
<div class="auth-page">
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h1>Create Account</h1>
                <p>Join Rose Tyre and start booking your tyre fittings</p>
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul style="margin: 0; padding-left: 20px;">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register.post') }}">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label for="first_name">First Name <span class="required">*</span></label>
                        <input type="text" 
                               id="first_name" 
                               name="first_name" 
                               class="form-control" 
                               placeholder="John"
                               value="{{ old('first_name') }}"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name <span class="required">*</span></label>
                        <input type="text" 
                               id="last_name" 
                               name="last_name" 
                               class="form-control" 
                               placeholder="Doe"
                               value="{{ old('last_name') }}"
                               required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email Address <span class="required">*</span></label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           class="form-control" 
                           placeholder="your.email@example.com"
                           value="{{ old('email') }}"
                           required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number <span class="required">*</span></label>
                    <input type="tel" 
                           id="phone" 
                           name="phone" 
                           class="form-control" 
                           placeholder="07123 456789"
                           value="{{ old('phone') }}"
                           required>
                </div>

                <div class="form-group">
                    <label for="address1">Address Line 1 <span class="required">*</span></label>
                    <input type="text" 
                           id="address1" 
                           name="address1" 
                           class="form-control" 
                           placeholder="123 Main Street"
                           value="{{ old('address1') }}"
                           required>
                </div>

                <div class="form-group">
                    <label for="address2">Address Line 2</label>
                    <input type="text" 
                           id="address2" 
                           name="address2" 
                           class="form-control" 
                           placeholder="Apartment, Suite, etc."
                           value="{{ old('address2') }}">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="postcode">Postcode <span class="required">*</span></label>
                        <input type="text" 
                               id="postcode" 
                               name="postcode" 
                               class="form-control" 
                               placeholder="SW1A 1AA"
                               value="{{ old('postcode') }}"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="country">Country <span class="required">*</span></label>
                        <input type="text" 
                               id="country" 
                               name="country" 
                               class="form-control" 
                               placeholder="United Kingdom"
                               value="{{ old('country', 'United Kingdom') }}"
                               required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="company">Company Name</label>
                    <input type="text" 
                           id="company" 
                           name="company" 
                           class="form-control" 
                           placeholder="Optional"
                           value="{{ old('company') }}">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="password">Password <span class="required">*</span></label>
                        <input type="password" 
                               id="password" 
                               name="password" 
                               class="form-control" 
                               placeholder="Minimum 8 characters"
                               required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password <span class="required">*</span></label>
                        <input type="password" 
                               id="password_confirmation" 
                               name="password_confirmation" 
                               class="form-control" 
                               placeholder="Re-enter password"
                               required>
                    </div>
                </div>

                <button type="submit" class="btn-submit">Create Account</button>
            </form>

            <div class="auth-footer">
                <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
            </div>
        </div>
    </div>
</div>
@endsection
