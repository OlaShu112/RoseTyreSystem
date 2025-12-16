<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TyreController extends Controller
{
    /**
     * Display the Tyres page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Example tyres data (later replace with DB query)
        $tyres = [
            [
                'brand' => 'Michelin',
                'size' => '205/55 R16',
                'price' => 120,
                'stock' => 10
            ],
            [
                'brand' => 'Bridgestone',
                'size' => '195/65 R15',
                'price' => 95,
                'stock' => 5
            ],
            [
                'brand' => 'Goodyear',
                'size' => '215/60 R17',
                'price' => 130,
                'stock' => 8
            ],
        ];

        return view('tyres.index', compact('tyres'));
    }
}
