<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $offers = [
            [
                'title' => 'Winter Tyre Special',
                'description' => 'Get 20% off on all winter tyres. Perfect for safe driving in cold conditions.',
                'discount' => 20,
                'valid_until' => '2025-12-31',
                'image' => 'tier1.jpeg',
                'badge' => 'Hot Deal',
                'is_active' => true,
            ],
            [
                'title' => 'Buy 3 Get 1 Free',
                'description' => 'Purchase 3 premium tyres and get the 4th one absolutely free! Limited time offer.',
                'discount' => 25,
                'valid_until' => '2025-12-25',
                'image' => 'tier2.jpeg',
                'badge' => 'Best Value',
                'is_active' => true,
            ],
            [
                'title' => 'Student Discount',
                'description' => 'Special 15% discount for students. Show your student ID and save on all tyre purchases.',
                'discount' => 15,
                'valid_until' => '2026-01-31',
                'image' => 'tier3.jpeg',
                'badge' => 'Student Offer',
                'is_active' => true,
            ],
            [
                'title' => 'Premium Tyre Package',
                'description' => 'Complete tyre package with fitting, balancing, and alignment. Save up to £50!',
                'discount' => 30,
                'valid_until' => '2025-12-20',
                'image' => 'tier5.jpeg',
                'badge' => 'Package Deal',
                'is_active' => true,
            ],
        ];

        foreach ($offers as $offer) {
            Offer::create($offer);
        }
    }
}
