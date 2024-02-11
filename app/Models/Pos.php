<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pos extends Model
{

    protected $casts = [
    'selected_products' => 'array',
];

    protected $fillable = [
        'customer_name',
        'discount',
        'selected_products', // Add this line
        // Add other attributes if needed
    ];
 }
