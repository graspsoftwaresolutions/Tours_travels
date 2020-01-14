<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class PackageTransports extends Model
{
    protected $table = 'package_transports';
    protected $fillable = ['id','package_id','city_id','day_numbers','airportpickup_amount','driverbeta_amount','tollparking_amount','interestrate_amount'];
    public $timestamps = true;
}
