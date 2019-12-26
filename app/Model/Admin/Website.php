<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    protected $table = 'website_settings';
    protected $fillable = ['id','company_name','company_website','company_email','company_phone','country_id','state_id','city_id','zipcode','company_address_one','company_address_two','company_logo','updated_at','created_at','status'];
    public $timestamps = true;
}
