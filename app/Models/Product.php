<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'manufacturing_date',
        'expiry_date',
        'batch_number',
        'packaging',
        'stock_count',
        'category',
        'quantity',
        'quantity_unit',
        'mrp',
        'description',
    ];

    protected $table='products';
}
