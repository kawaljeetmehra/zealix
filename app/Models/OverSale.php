<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OverSale extends Model
{
    use HasFactory;

    protected $fillable = [
        'salesman_id',
        'total_sales',
        'number_of_sales',
        'average_sales_value',
        'total_customer',
    ];

    protected $table="oversales";
    // Define a relationship if there's a Salesman model
    public function salesman()
    {
        return $this->belongsTo(Salesman::class);
    }
}
