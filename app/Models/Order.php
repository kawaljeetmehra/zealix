<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_date', 'order_id', 'total_cost', 'location', 'distributor_name', 'order_by', 'order_status','email','contact',
    ];
    protected $table = 'orders';
}
