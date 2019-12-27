<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Model\Admin\Amenities;
use App\Model\Admin\RoomType;
use App\Model\Admin\HotelImages;

class Hotel extends Model
{
    public function amenities() {
        return $this->belongsToMany('App\Model\Admin\Amenities','hotel_amenities','hotel_id','amenity_id');
    }
    public function roomtypes() {
        return $this->belongsToMany('App\Model\Admin\RoomType','hotel_roomtypes','hotel_id','roomtype_id')->withPivot('price','description','roomtype_id');
    }
    public function hotelimages() {
        return $this->hasMany('App\Model\Admin\HotelImages','hotel_id');
    }
}
