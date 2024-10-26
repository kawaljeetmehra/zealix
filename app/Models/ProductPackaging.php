<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPackaging extends Model
{
    use HasFactory;

    protected $fillable = ['packaging_name'];

    protected $table = 'product_packaging';
}
