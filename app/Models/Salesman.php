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
        'salesman_id',
        'email',
        'salary',
        'salesman_address',
        'address',
        'qualification',

        // Add any other fields you need to allow for mass assignment
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public $timestamps = true;
}
