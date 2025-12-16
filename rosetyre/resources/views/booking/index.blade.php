@extends('layouts.app')

@section('title', 'Book Tyre Fitting - Rose Tyre')

@push('styles')
<style>
    .booking-page {
        padding: 40px 20px 60px 20px;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }

    .booking-container {
        max-width: 1000px;
        margin: 0 auto;
    }

    .page-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .page-header h1 {
        color: #1e7e34;
        font-size: 2.5rem;
        margin-bottom: 15px;
    }

    .page-header p {
        color: #666;
        font-size: 1.1rem;
    }

    .booking-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 30px;
        margin-bottom: 40px;
    }

    .booking-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .booking-card h2 {
        color: #1e7e34;
        font-size: 1.8rem;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #1e7e34;
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

    .form-select {
        width: 100%;
        padding: 12px 15px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 1rem;
        background-color: white;
        transition: border-color 0.3s, box-shadow 0.3s;
    }

    .form-select:focus {
        outline: none;
        border-color: #1e7e34;
        box-shadow: 0 0 0 3px rgba(30, 126, 52, 0.1);
    }

    .btn-submit {
        background-color: #1e7e34;
        color: white;
        padding: 15px 40px;
        border: none;
        border-radius: 8px;
        font-size: 1.1rem;
        font-weight: 600;
        width: 100%;
        transition: background-color 0.3s, transform 0.2s;
        cursor: pointer;
    }

    .btn-submit:hover {
        background-color: #16692c;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(30, 126, 52, 0.3);
    }

    .btn-submit:active {
        transform: translateY(0);
    }

    .upcoming-bookings {
        background: white;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    }

    .upcoming-bookings h2 {
        color: #1e7e34;
        font-size: 1.8rem;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #1e7e34;
    }

    .booking-item {
        background: #f8f9fa;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 15px;
        border-left: 4px solid #1e7e34;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .booking-item:hover {
        transform: translateX(5px);
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .booking-item-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    .booking-item-title {
        font-weight: 600;
        color: #1e7e34;
        font-size: 1.1rem;
    }

    .booking-item-date {
        color: #666;
        font-size: 0.9rem;
    }

    .booking-item-details {
        color: #666;
        font-size: 0.95rem;
    }

    .booking-item-details span {
        margin-right: 15px;
    }

    .alert {
        padding: 15px 20px;
        border-radius: 8px;
        margin-bottom: 25px;
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .empty-state {
        text-align: center;
        padding: 40px 20px;
        color: #999;
    }

    .empty-state-icon {
        font-size: 3rem;
        margin-bottom: 15px;
    }

    @media (max-width: 768px) {
        .booking-content {
            grid-template-columns: 1fr;
        }

        .page-header h1 {
            font-size: 2rem;
        }

        .booking-card, .upcoming-bookings {
            padding: 20px;
        }
    }
</style>
@endpush

@section('content')
<div class="booking-page">
    <div class="booking-container">
        <div class="page-header">
            <h1>Book Your Tyre Fitting</h1>
            <p>Schedule your tyre fitting appointment with our expert team</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="booking-content">
            <!-- Booking Form -->
            <div class="booking-card">
                <h2>Booking Details</h2>
                <form method="POST" action="{{ route('booking.store') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label for="customer_name">Full Name <span class="required">*</span></label>
                        <input type="text" 
                               id="customer_name" 
                               name="customer_name" 
                               class="form-control" 
                               placeholder="Enter your full name"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address <span class="required">*</span></label>
                        <input type="email" 
                               id="email" 
                               name="email" 
                               class="form-control" 
                               placeholder="your.email@example.com"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="phone">Phone Number <span class="required">*</span></label>
                        <input type="tel" 
                               id="phone" 
                               name="phone" 
                               class="form-control" 
                               placeholder="07123 456789"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="tyre_size">Tyre Size <span class="required">*</span></label>
                        <select id="tyre_size" name="tyre_size" class="form-select" required>
                            <option value="">Select tyre size</option>
                            <option value="195/65 R15">195/65 R15</option>
                            <option value="205/55 R16">205/55 R16</option>
                            <option value="215/60 R17">215/60 R17</option>
                            <option value="225/50 R17">225/50 R17</option>
                            <option value="235/45 R18">235/45 R18</option>
                            <option value="245/40 R19">245/40 R19</option>
                            <option value="Other">Other (Specify in notes)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="vehicle_make">Vehicle Make</label>
                        <input type="text" 
                               id="vehicle_make" 
                               name="vehicle_make" 
                               class="form-control" 
                               placeholder="e.g., Toyota, Ford, BMW">
                    </div>

                    <div class="form-group">
                        <label for="vehicle_model">Vehicle Model</label>
                        <input type="text" 
                               id="vehicle_model" 
                               name="vehicle_model" 
                               class="form-control" 
                               placeholder="e.g., Corolla, Focus, 3 Series">
                    </div>

                    <div class="form-group">
                        <label for="booking_date">Preferred Date <span class="required">*</span></label>
                        <input type="date" 
                               id="booking_date" 
                               name="booking_date" 
                               class="form-control"
                               min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                               required>
                    </div>

                    <div class="form-group">
                        <label for="booking_time">Preferred Time <span class="required">*</span></label>
                        <select id="booking_time" name="booking_time" class="form-select" required>
                            <option value="">Select time</option>
                            <option value="09:00">09:00 AM</option>
                            <option value="10:00">10:00 AM</option>
                            <option value="11:00">11:00 AM</option>
                            <option value="12:00">12:00 PM</option>
                            <option value="13:00">01:00 PM</option>
                            <option value="14:00">02:00 PM</option>
                            <option value="15:00">03:00 PM</option>
                            <option value="16:00">04:00 PM</option>
                            <option value="17:00">05:00 PM</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="notes">Additional Notes</label>
                        <textarea id="notes" 
                                  name="notes" 
                                  class="form-control" 
                                  rows="3"
                                  placeholder="Any special requirements or notes..."></textarea>
                    </div>

                    <button type="submit" class="btn-submit">Book Appointment</button>
                </form>
            </div>

            <!-- Upcoming Bookings -->
            <div class="upcoming-bookings">
                <h2>Upcoming Fittings</h2>
                @if(isset($upcomingBookings) && count($upcomingBookings) > 0)
                    @foreach($upcomingBookings as $booking)
                        <div class="booking-item">
                            <div class="booking-item-header">
                                <div class="booking-item-title">{{ $booking['tyre_size'] ?? 'N/A' }}</div>
                                <div class="booking-item-date">{{ date('M d, Y', strtotime($booking['booking_date'])) }}</div>
                            </div>
                            <div class="booking-item-details">
                                <span><strong>Time:</strong> {{ $booking['booking_time'] ?? 'N/A' }}</span>
                                @if(isset($booking['vehicle_make']))
                                    <span><strong>Vehicle:</strong> {{ $booking['vehicle_make'] }} {{ $booking['vehicle_model'] ?? '' }}</span>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="empty-state">
                        <div class="empty-state-icon">📅</div>
                        <p>No upcoming bookings</p>
                        <p style="font-size: 0.9rem; margin-top: 10px;">Book your first appointment using the form</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
