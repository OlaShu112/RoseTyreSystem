<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tyre extends Model
{
    protected $fillable = [
        'brand',
        'size',
        'price',
        'stock',
        'image',
        'description',
    ];
}
