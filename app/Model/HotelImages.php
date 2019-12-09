<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HotelImages extends Model
{
    protected $table = 'hotel_images';
    protected $fillable = ['id','hotel_id','image_name'];

    public function hotels()
    {
        return $this->belongsToMany('App\Model\Hotel','hotel_id');
    }
}
