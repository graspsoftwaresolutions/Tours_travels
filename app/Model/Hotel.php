<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Amenities;
use App\Model\RoomType;
use App\Model\HotelImages;

class Hotel extends Model
{
    public function amenities() {
        return $this->belongsToMany('App\Model\Amenities','hotel_amenities','hotel_id','amenity_id');
    }
    public function roomtypes() {
        return $this->belongsToMany('App\Model\RoomType','hotel_roomtypes','hotel_id','roomtype_id');
    }
    public function hotelimages() {
        return $this->hasMany('App\Model\HotelImages','hotel_id');
    }
}
