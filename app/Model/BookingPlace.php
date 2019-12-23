<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BookingPlace extends Model
{
    protected $table = 'booking_place';
    protected $fillable = ['id','booking_id','state_id','city_id','infant_count','nights_count','status'];
}
