<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PackageType extends Model
{
    protected $table = 'package_type';
    protected $fillable = ['id','package_type','status'];
    public $timestamps = true;

    public function savePackageTypedata($data=array())
    {
        if (!empty($data['masterid'])) {
            $savedata = PackageType::find($data['masterid'])->update($data);
        } else {
            $savedata = PackageType::create($data);
        }
        return $savedata;
    }

}