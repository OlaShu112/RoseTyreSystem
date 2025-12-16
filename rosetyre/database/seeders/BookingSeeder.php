<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get customer users (non-admin)
        $customers = User::where('is_admin', false)->get();

        if ($customers->isEmpty()) {
            return; // No customers to create bookings for
        }

        $bookings = [
            [
                'customer_name' => $customers->first()->name,
                'email' => $customers->first()->email,
                'phone' => $customers->first()->phone ?? '07123 456789',
                'tyre_size' => '205/55 R16',
                'vehicle_make' => 'Toyota',
                'vehicle_model' => 'Corolla',
                'booking_date' => now()->addDays(5),
                'booking_time' => '10:00',
                'notes' => 'Please ensure proper alignment',
                'status' => 'confirmed',
            ],
            [
                'customer_name' => $customers->first()->name,
                'email' => $customers->first()->email,
                'phone' => $customers->first()->phone ?? '07123 456789',
                'tyre_size' => '195/65 R15',
                'vehicle_make' => 'Ford',
                'vehicle_model' => 'Focus',
                'booking_date' => now()->addDays(10),
                'booking_time' => '14:00',
                'notes' => null,
                'status' => 'pending',
            ],
        ];

        foreach ($bookings as $booking) {
            Booking::create([
                ...$booking,
                'user_id' => $customers->first()->id,
            ]);
        }

        // Create additional bookings if there are more customers
        if ($customers->count() > 1) {
            $secondCustomer = $customers->skip(1)->first();
            Booking::create([
                'user_id' => $secondCustomer->id,
                'customer_name' => $secondCustomer->name,
                'email' => $secondCustomer->email,
                'phone' => $secondCustomer->phone ?? '07234 567890',
                'tyre_size' => '215/60 R17',
                'vehicle_make' => 'BMW',
                'vehicle_model' => '3 Series',
                'booking_date' => now()->addDays(7),
                'booking_time' => '11:00',
                'notes' => 'Premium service required',
                'status' => 'confirmed',
            ]);
        }
    }
}
