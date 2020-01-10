<?php

namespace App\Model\Admin;
use Auth;

use Illuminate\Database\Eloquent\Model;

class InterestTaxRate extends Model
{
    protected $table = 'interest_tax_rate';
    protected $fillable = ['id','country_id','state_id','tax','created_by','updated_by',
                        'created_at','updated_at','status'];
    public $timestamps = true;

    public function SaveInterestTaxRate($data=array())
    {
        if (!empty($data['masterid'])) {
            
            $savedata = InterestTaxRate::find($data['masterid'])->update($data);
        } else {
            $data['created_by'] = Auth::guard('admin')->user()->id;
            $savedata = InterestTaxRate::create($data);
        }
        return $savedata;
    }
}
