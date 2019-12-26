<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class HotelRooms extends Model
{
    protected $table = 'hotel_rooms';
    protected $fillable = ['id','hotel_id','roomtype_id','room_number','room_no_of_beds','room_description','status'];
    public $timestamps = true;
}
