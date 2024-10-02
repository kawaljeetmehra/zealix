<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignStock extends Model
{
    use HasFactory;

    protected $fillable=[
        'product_id',
        'distributor_id'
    ];
    protected $table='assign_stock';
}
