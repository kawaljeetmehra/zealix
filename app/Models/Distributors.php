<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributors extends Model
{
    use HasFactory;

    protected $fillable=[ 'name',
    'contact_name',
    'contact',
    'email',
    'geographic_coverage',
    'location',
    'shipping_location',
    'terms_of_agreement'];
    protected $table = 'distributors';
    public $timestamps = true;
}
