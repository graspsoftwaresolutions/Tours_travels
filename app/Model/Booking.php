<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = 'booking_master';
    protected $fillable = ['id','package_id','adult_count','child_count','infant_count', 'status'];
}
