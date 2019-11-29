<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ActivityImages extends Model
{
    protected $table = 'activity_images';
    protected $fillable = ['id','activity_id','activity_images','status'];
    public $timestamps = true;
}
