<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use App\Model\Admin\PackagePlace;

class Package extends Model
{
    protected $table = 'package_master';
    protected $fillable = ['id','package_name','adult_count','child_count','infant_count','from_country_id',
                        'from_state_id','from_city_id','to_country_id','to_state_id','to_city_id', 'status'];
    public $timestamps = true;

    public function places() {
        return $this->hasMany('App\Model\Admin\PackagePlace','package_id');
    }
}
