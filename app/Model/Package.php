<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'package_master';
    protected $fillable = ['id','package_name','adult_count','child_count','infant_count','from_country_id',
                        'from_state_id','from_city_id','to_country_id','to_state_id','to_city_id', 'status'];
    public $timestamps = true;
}
