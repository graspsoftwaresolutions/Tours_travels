<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use Session;

use App\Model\Admin\Country;
use App\Model\Admin\State;
use App\Model\Admin\City;
use App\Model\Admin\ActivityImages;
use App\Model\Admin\Activity;
use App\Model\Admin\Package;
use App\Model\Admin\PackagePlace;
use App\Model\Admin\PackageHotel;
use App\Model\Admin\PackageActivities;
use App\Model\Admin\Amenities;

use App\Model\Admin\Hotel;

class PageController extends Controller
{
    public function __construct()
    {

    }

    public function homePage()
    {
    	$packages = Package::with(
            array(
                // 'amenities'=>function($query){
                //     $query->select('amenities_name');
                // },
                'places'
            ))->where('status','=',1)->where('user_package','!=',1)->limit(12)->get();
        $data['packages'] = $packages;
     	return view('web.welcome',compact('data',$data));
    }
}
