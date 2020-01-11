<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class CustomerDetails extends Model
{
    protected $table = 'customer_details';
    protected $fillable = ['id','name','user_id','email','phone','country_id','state_id','city_id','address_one','address_two','zipcode','updated_at','created_at','status'];
    public $timestamps = true;
}
