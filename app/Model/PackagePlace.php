<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PackagePlace extends Model
{
    protected $table = 'package_place';
    protected $fillable = ['id','package_id','state_id','city_id','infant_count','nights_count','status'];
    public $timestamps = true;
}
