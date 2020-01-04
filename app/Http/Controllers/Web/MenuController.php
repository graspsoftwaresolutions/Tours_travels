<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Package;

class MenuController extends Controller
{
    public function enquiryView()
    {
        $data['packages_view'] = Package::all();
        return view('web.enquiry')->with('data',$data);
    }
}
