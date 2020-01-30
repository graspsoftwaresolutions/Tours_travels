<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class BookingActivities extends Model
{
    protected $table = 'booking_activities';
    protected $fillable = ['id','booking_id','city_id','activity_id','day_numbers'];
}
