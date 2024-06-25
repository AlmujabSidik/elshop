<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'price',
        'status',
        'pembayaran',
        'total_item',
        'product',
        'image',
        'discount'
    ];

    protected $casts = [
        'discount' => 'boolean'
    ];
}
