<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Specify the table name (optional, Laravel uses plural form by default)
    protected $table = 'categories';

    // Define the fields that are mass assignable
    protected $fillable = ['name'];

    // Enable timestamps
    public $timestamps = true;
}
