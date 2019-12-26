<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class PackageHotel extends Model
{
    protected $table = 'package_hotel';
    protected $fillable = ['id','package_id','city_id','hotel_id'];
    public $timestamps = true;
}
