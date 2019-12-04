<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    protected $table = 'settings_tax';
    protected $fillable = ['id','tax_name','tax_value','updated_at','created_at','status'];
    public $timestamps = true;
}
