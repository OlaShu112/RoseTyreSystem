<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'hours',
        'services',
        'latitude',
        'longitude',
        'is_active',
    ];

    protected $casts = [
        'hours' => 'array',
        'services' => 'array',
        'is_active' => 'boolean',
    ];
}
