<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class BookingHotelConfirmation extends Model
{
    protected $table = 'booking_hotel_confirmation';
    protected $fillable = ['id','booking_id','city_id','hotel_id'];
}
