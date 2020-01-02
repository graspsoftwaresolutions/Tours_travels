<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class EnquiryPackages extends Model
{
    protected $table = 'enquiry_packages';
    protected $fillable = ['id','enquiry_id','package_id','updated_at','pdf_file','created_at','status'];
    public $timestamps = true;
}
