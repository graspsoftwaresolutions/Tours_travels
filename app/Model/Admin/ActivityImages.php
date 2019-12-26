<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class ActivityImages extends Model
{
    protected $table = 'activity_images';
    protected $fillable = ['id','activity_id','image_name','status'];
    public $timestamps = true;
}
