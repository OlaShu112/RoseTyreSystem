<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display the Find a Branch page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Sample branches data (later replace with DB query)
        $branches = [
            [
                'id' => 1,
                'name' => 'Rose Tyre - Central London',
                'address' => '123 High Street, London, SW1A 1AA',
                'phone' => '020 7123 4567',
                'email' => 'central@rosetyre.co.uk',
                'hours' => [
                    'Monday - Friday' => '8:00 AM - 6:00 PM',
                    'Saturday' => '9:00 AM - 5:00 PM',
                    'Sunday' => '10:00 AM - 4:00 PM'
                ],
                'latitude' => 51.5074,
                'longitude' => -0.1278,
                'services' => ['Tyre Fitting', 'Wheel Alignment', 'Tyre Repair', 'Battery Service']
            ],
            [
                'id' => 2,
                'name' => 'Rose Tyre - North London',
                'address' => '456 Camden Road, London, NW1 7DP',
                'phone' => '020 7890 1234',
                'email' => 'north@rosetyre.co.uk',
                'hours' => [
                    'Monday - Friday' => '8:00 AM - 6:00 PM',
                    'Saturday' => '9:00 AM - 5:00 PM',
                    'Sunday' => 'Closed'
                ],
                'latitude' => 51.5446,
                'longitude' => -0.1534,
                'services' => ['Tyre Fitting', 'Wheel Alignment', 'Tyre Repair']
            ],
            [
                'id' => 3,
                'name' => 'Rose Tyre - East London',
                'address' => '789 Commercial Street, London, E1 6LY',
                'phone' => '020 3456 7890',
                'email' => 'east@rosetyre.co.uk',
                'hours' => [
                    'Monday - Friday' => '8:00 AM - 6:00 PM',
                    'Saturday' => '9:00 AM - 5:00 PM',
                    'Sunday' => '10:00 AM - 4:00 PM'
                ],
                'latitude' => 51.5200,
                'longitude' => -0.0750,
                'services' => ['Tyre Fitting', 'Wheel Alignment', 'Tyre Repair', 'Battery Service', 'Exhaust Service']
            ],
            [
                'id' => 4,
                'name' => 'Rose Tyre - West London',
                'address' => '321 King Street, London, W6 9JT',
                'phone' => '020 2345 6789',
                'email' => 'west@rosetyre.co.uk',
                'hours' => [
                    'Monday - Friday' => '8:00 AM - 6:00 PM',
                    'Saturday' => '9:00 AM - 5:00 PM',
                    'Sunday' => 'Closed'
                ],
                'latitude' => 51.4924,
                'longitude' => -0.1934,
                'services' => ['Tyre Fitting', 'Wheel Alignment', 'Tyre Repair']
            ],
        ];

        return view('branches.index', compact('branches'));
    }
}

