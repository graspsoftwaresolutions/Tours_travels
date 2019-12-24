<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BookingActivities extends Model
{
    protected $table = 'booking_activities';
    protected $fillable = ['id','booking_id','city_id','activity_id'];
}
