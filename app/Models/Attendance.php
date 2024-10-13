<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = ['salesman_id', 'day', 'status'];

    protected $table='attendance';
}