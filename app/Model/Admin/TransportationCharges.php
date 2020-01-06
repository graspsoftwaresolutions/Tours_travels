<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class TransportationCharges extends Model
{
    protected $table = 'transportation_charges';
    protected $fillable = ['id','from_country_id','from_state_id','from_city_id','to_country_id','to_state_id','to_city_id','distance','amount_per_km','total_distance_amount','status'];
    public $timestamps = true;
}
