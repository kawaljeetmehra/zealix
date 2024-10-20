<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salesman extends Model
{
    use HasFactory;

    protected $table = 'salesmans';
    protected $fillable = [
        'name',
        'contact',
        'email',
        'salary',
        'salesman_address',
        // Add any other fields you need to allow for mass assignment
    ];
    public $timestamps = true;
}
