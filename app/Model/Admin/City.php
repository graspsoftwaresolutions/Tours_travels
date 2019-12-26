<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;

class City extends Model
{
    protected $table = 'city';
    protected $fillable = ['id','country_id','state_id','country_name','city_name','city_image','status'];
    public $timestamps = true;

    public function saveCitydata($data=array())
    {
        if (!empty($data['masterid'])) {
            if($data['city_image']) {
                $file = $data['city_image'];
                $name = time().'.'.$file->getClientOriginalExtension();
                $file->move('storage/app/city',$name);
                $data['city_image'] = $name;
            }
            $savedata = City::find($data['masterid'])->update($data);
        } else {
            if($data['city_image']) {
                $file = $data['city_image'];
                $name = time().'.'.$file->getClientOriginalExtension();
                $file->move('storage/app/city',$name);
                $data['city_image'] = $name;
            }
            $savedata = City::create($data);
        }
        return $savedata;
    }
    public function state()
    {
        return $this->belongsTo('App\Model\State');
    }
}
