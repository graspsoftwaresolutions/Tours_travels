<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class BookigTransports extends Model
{
    protected $table = 'booking_transports';
    protected $fillable = ['id','booking_id','city_id','day_numbers','airportpickup_amount','driverbeta_amount','tollparking_amount','interestrate_amount'];
    public $timestamps = true;
}
