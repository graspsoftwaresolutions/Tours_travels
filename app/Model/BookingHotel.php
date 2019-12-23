<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BookingHotel extends Model
{
    protected $table = 'booking_hotel';
    protected $fillable = ['id','booking_id','city_id','hotel_id'];
}
