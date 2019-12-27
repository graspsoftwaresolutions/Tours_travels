<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class HotelImages extends Model
{
    protected $table = 'hotel_images';
    protected $fillable = ['id','hotel_id','image_name'];

    public function hotels()
    {
        return $this->belongsToMany('App\Model\Admin\Hotel','hotel_id');
    }
}
