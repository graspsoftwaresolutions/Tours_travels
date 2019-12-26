<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;

class Country extends Model
{
    protected $table = 'country';
    protected $fillable = ['id','country_name','status'];
    public $timestamps = true;

    public function saveCountrydata($data=array())
    {
        if (!empty($data['masterid'])) {
            $savedata = Country::find($data['masterid'])->update($data);
        } else {
            $savedata = Country::create($data);
        }
        return $savedata;
    }
    public function states(){   
        return $this->hasMany('App\Model\State');
    }
    public function cities(){
        return $this->hasManyThrough(
            'App\Model\City', 'App\Model\State',
            'country_id', 'state_id', 'id'
        );
    }
}
