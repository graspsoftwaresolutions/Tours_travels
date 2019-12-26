<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    protected $table = 'room_type';
    protected $fillable = ['id','room_type','status'];
    public $timestamps = true;

    public function saveRoomTypesdata($data=array())
    {
        if (!empty($data['masterid'])) {
            $savedata = RoomType::find($data['masterid'])->update($data);
        } else {
            $savedata = RoomType::create($data);
        }
        return $savedata;
    }
}
