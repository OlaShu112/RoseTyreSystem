<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // Removed auth middleware for demo purposes
    public function admin() {
        return view('dashboard.admin');
    }

    public function customer() {
        return view('dashboard.customer');
    }
}
