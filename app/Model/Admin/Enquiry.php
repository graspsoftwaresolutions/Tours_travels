<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    protected $table = 'enquiry';
    protected $fillable = ['id','name','customer_id','email','phone','country_id','state_id','city_id','address','type','message','enquiry_status','remarks','updated_at','created_at','status'];
    public $timestamps = true;

    public function enquirypackages() {
        return $this->belongsToMany('App\Model\Admin\Enquiry','enquiry_packages','enquiry_id','package_id');
    }

}
