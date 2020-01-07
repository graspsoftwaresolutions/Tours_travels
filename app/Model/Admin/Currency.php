<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $table = 'currency_settings';
    protected $fillable = ['id','currency_name','currency_code','company_symbol','currency_status','updated_at','created_at'];
    public $timestamps = true;
}
