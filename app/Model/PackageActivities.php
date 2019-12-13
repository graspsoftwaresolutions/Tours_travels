<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PackageActivities extends Model
{
    protected $table = 'package_activities';
    protected $fillable = ['id','package_id','city_id','activity_id'];
    public $timestamps = true;
}
