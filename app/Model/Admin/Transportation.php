<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Transportation extends Model
{
    protected $table = 'new_transportation';
    protected $fillable = ['country_id','state_id','type','pack_name','transport_pack_amount','unpack_amount_per_km','unpack_amount_per_hr','status','created_by','updated_by','created_at','updated_at'];
    public $timestamps = true;
}
