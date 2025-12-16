<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index() {
        // Sample upcoming bookings (later replace with DB query)
        $upcomingBookings = [
            [
                'tyre_size' => '205/55 R16',
                'booking_date' => '2025-12-10',
                'booking_time' => '10:00',
                'vehicle_make' => 'Toyota',
                'vehicle_model' => 'Corolla'
            ],
            [
                'tyre_size' => '195/65 R15',
                'booking_date' => '2025-12-15',
                'booking_time' => '14:00',
                'vehicle_make' => 'Ford',
                'vehicle_model' => 'Focus'
            ],
        ];

        return view('booking.index', compact('upcomingBookings'));
    }

    public function store(Request $request) {
        // TODO: Save booking
        return redirect()->back()->with('success', 'Booking confirmed!');
    }
}
