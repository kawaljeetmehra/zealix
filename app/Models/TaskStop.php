<?php

// app/Models/TaskStop.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskStop extends Model
{
    use HasFactory;

    protected $table = 'task_stops';

    protected $fillable = [
        'task_id',
        'salesman_id',
        'stop_1',
        'stop_2',
        'stop_3',
        'stop_4',
    ];
}
