<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin User
        User::updateOrCreate(
            ['email' => 'admin@rosetyre.co.uk'],
            [
                'name' => 'Admin User',
                'first_name' => 'Admin',
                'last_name' => 'User',
                'password' => Hash::make('password'),
                'phone' => '020 1234 5678',
                'address1' => '123 Admin Street',
                'address2' => 'Admin Building',
                'postcode' => 'SW1A 1AA',
                'country' => 'United Kingdom',
                'company' => 'Rose Tyre',
                'is_admin' => true,
            ]
        );

        // Create Customer Users
        User::updateOrCreate(
            ['email' => 'customer@rosetyre.co.uk'],
            [
                'name' => 'John Doe',
                'first_name' => 'John',
                'last_name' => 'Doe',
                'password' => Hash::make('password'),
                'phone' => '07123 456789',
                'address1' => '456 Customer Road',
                'address2' => 'Apartment 5',
                'postcode' => 'NW1 7DP',
                'country' => 'United Kingdom',
                'company' => null,
                'is_admin' => false,
            ]
        );

        User::updateOrCreate(
            ['email' => 'jane@rosetyre.co.uk'],
            [
                'name' => 'Jane Smith',
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'password' => Hash::make('password'),
                'phone' => '07234 567890',
                'address1' => '789 High Street',
                'address2' => null,
                'postcode' => 'E1 6LY',
                'country' => 'United Kingdom',
                'company' => 'Smith Ltd',
                'is_admin' => false,
            ]
        );
    }
}

