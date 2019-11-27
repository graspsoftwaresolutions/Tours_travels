<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Amenities extends Model
{
    protected $table = 'amenities';
    protected $fillable = ['id','amenities_name','status'];
    public $timestamps = true;

    public function saveAmenitiesdata($data=array())
    {
        if (!empty($data['masterid'])) {
            $savedata = Amenities::find($data['masterid'])->update($data);
        } else {
            $savedata = Amenities::create($data);
        }
        return $savedata;
    }
}
