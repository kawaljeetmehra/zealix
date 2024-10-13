<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RouteTracking extends Model
{
    use HasFactory;

   protected $fillable = ['salesman_id', 'travel_date', 'start_location', 'end_location', 'distance_traveled', 'mode_of_transportation', 'ta_rate', 'ta_amount', 'da_amount'];
    protected $table="route_tracking";
}
