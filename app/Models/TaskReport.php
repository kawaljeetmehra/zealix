<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskReport extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'Task_id','Salesman_id','Assign_Date','Due_Date',
    ];
    protected $primaryKey = 'Report_id';
    protected $table = 'Task_Report';


}
