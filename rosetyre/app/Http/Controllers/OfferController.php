<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display the Special Offers page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Sample offers data (later replace with DB query)
        $offers = [
            [
                'id' => 1,
                'title' => 'Winter Tyre Special',
                'description' => 'Get 20% off on all winter tyres. Perfect for safe driving in cold conditions.',
                'discount' => 20,
                'valid_until' => '2025-12-31',
                'image' => 'tier1.jpeg',
                'badge' => 'Hot Deal'
            ],
            [
                'id' => 2,
                'title' => 'Buy 3 Get 1 Free',
                'description' => 'Purchase 3 premium tyres and get the 4th one absolutely free! Limited time offer.',
                'discount' => 25,
                'valid_until' => '2025-12-25',
                'image' => 'tier2.jpeg',
                'badge' => 'Best Value'
            ],
            [
                'id' => 3,
                'title' => 'Student Discount',
                'description' => 'Special 15% discount for students. Show your student ID and save on all tyre purchases.',
                'discount' => 15,
                'valid_until' => '2026-01-31',
                'image' => 'tier3.jpeg',
                'badge' => 'Student Offer'
            ],
            [
                'id' => 4,
                'title' => 'Premium Tyre Package',
                'description' => 'Complete tyre package with fitting, balancing, and alignment. Save up to £50!',
                'discount' => 30,
                'valid_until' => '2025-12-20',
                'image' => 'tier5.jpeg',
                'badge' => 'Package Deal'
            ],
        ];

        return view('offers.index', compact('offers'));
    }
}

