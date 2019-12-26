<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class HotelRoomsImages extends Model
{
    protected $table = 'hotel_room_images';
    protected $fillable = ['id','hotel_id','image_name','status'];
    public $timestamps = true;
}
