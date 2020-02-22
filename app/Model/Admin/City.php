<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;
use DB;

class City extends Model
{
    protected $table = 'city';
    protected $fillable = ['id','country_id','state_id','country_name','city_name','city_image','status'];
    public $timestamps = true;

    // public function saveCitydata($data=array())
    // {
       
    //     if ($data['masterid']!='') {
    //         $old_image =  City::where('id','=',$data['masterid'])->pluck('city_image')->first();
           
    //         if($old_image == $data['cityimage']) {
    //            // dd($data);
    //            return 1;
    //             $name = $data['cityimage'];
    //             $data['cityimage'] = $name;
    //         }
    //         elseif($old_image!=$data['cityimage']){
    //             dd($data['cityimage']);
    //             $file = $data['city_image'];
    //             $name = time().'.'.$file->getClientOriginalExtension();
    //             $file->move('storage/app/city',$name);
    //             $data['cityimage'] = $name;
    //         }
    //         else{
    //             dd($data['cityimage']);
    //             $file = $data['city_image'];
    //             $name = time().'.'.$file->getClientOriginalExtension();
    //             $file->move('storage/app/city',$name);
    //             $data['city_image'] = $name;
    //         }
    //         $savedata = City::find($data['masterid'])->update($data);
    //     } else {
            
    //         if($data['city_image']) {
    //             $file = $data['city_image'];
    //             $name = time().'.'.$file->getClientOriginalExtension();
    //             $file->move('storage/app/city',$name);
    //             $data['city_image'] = $name;
    //             //dd($data['city_image']);
    //         }
    //         $savedata = City::create($data);
    //     }
    //     return $savedata;
    // }
    public function state()
    {
        return $this->belongsTo('App\Model\State');
    }
}
