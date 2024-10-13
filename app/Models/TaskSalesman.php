<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskSalesman extends Model
{
    use HasFactory;

    protected $fillable = [
        'task_id',
        'salesman_id',
    ];

    protected $table = 'task_salesman';
}
