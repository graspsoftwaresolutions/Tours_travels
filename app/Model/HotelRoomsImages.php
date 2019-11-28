<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HotelRoomsImages extends Model
{
    protected $table = 'hotel_rooms';
    protected $fillable = ['id','hotel_id','image_name','status'];
    public $timestamps = true;
}
