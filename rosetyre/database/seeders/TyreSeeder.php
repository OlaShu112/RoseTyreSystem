<?php

namespace Database\Seeders;

use App\Models\Tyre;
use Illuminate\Database\Seeder;

class TyreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tyres = [
            [
                'brand' => 'Michelin',
                'size' => '205/55 R16',
                'price' => 120.00,
                'stock' => 15,
                'image' => 'tier1.jpeg',
                'description' => 'Premium tyres for maximum performance and safety',
            ],
            [
                'brand' => 'Bridgestone',
                'size' => '195/65 R15',
                'price' => 95.00,
                'stock' => 8,
                'image' => 'tier2.jpeg',
                'description' => 'Reliable tyres for everyday driving',
            ],
            [
                'brand' => 'Goodyear',
                'size' => '215/60 R17',
                'price' => 130.00,
                'stock' => 12,
                'image' => 'tier3.jpeg',
                'description' => 'High-quality tyres with excellent grip',
            ],
            [
                'brand' => 'Continental',
                'size' => '225/50 R17',
                'price' => 125.00,
                'stock' => 10,
                'image' => 'tier5.jpeg',
                'description' => 'Premium tyres with superior handling',
            ],
            [
                'brand' => 'Pirelli',
                'size' => '235/45 R18',
                'price' => 145.00,
                'stock' => 6,
                'image' => 'tier1.jpeg',
                'description' => 'Luxury tyres for high-performance vehicles',
            ],
            [
                'brand' => 'Dunlop',
                'size' => '245/40 R19',
                'price' => 150.00,
                'stock' => 4,
                'image' => 'tier2.jpeg',
                'description' => 'Sport tyres with exceptional performance',
            ],
            [
                'brand' => 'Hankook',
                'size' => '205/55 R16',
                'price' => 85.00,
                'stock' => 20,
                'image' => 'tier3.jpeg',
                'description' => 'Affordable tyres without compromising quality',
            ],
            [
                'brand' => 'Yokohama',
                'size' => '195/65 R15',
                'price' => 90.00,
                'stock' => 18,
                'image' => 'tier5.jpeg',
                'description' => 'Durable tyres for long-lasting performance',
            ],
        ];

        foreach ($tyres as $tyre) {
            Tyre::create($tyre);
        }
    }
}
