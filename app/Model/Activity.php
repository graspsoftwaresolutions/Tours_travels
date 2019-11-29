<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activities';
    protected $fillable = ['id','title_name','duartion_hours','amount','country_id','state_id','city_id','address_one','address_two','zip_code','latitude',
    'langitude','short_description','overview','additional_info','inclusion_name','exclusion_name','status'];
    public $timestamps = true;
}
