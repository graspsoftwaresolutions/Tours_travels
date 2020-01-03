<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
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
use DB;
use Session;
use Illuminate\Support\Facades\Crypt;
use App\Helpers\CommonHelper;

class PackageController extends Controller
{
     public function ViewPackage($encid){
        $packageid = crypt::decrypt($encid);
        $data['country_view'] = Country::where('status','=','1')->get();
        $data['package_info'] = Package::where('id','=',$packageid)->first();
        $data['package_type'] = DB::table('package_type')->where('status','=','1')->get();
        $data['package_place'] = PackagePlace::where('package_id','=',$packageid)->get();
        //$data['package_hotel'] = PackageHotel::where('package_id','=',$packageid)->get();
        //$data['package_activities'] = PackageActivities::where('package_id','=',$packageid)->get();
        return view('web.package_view',compact('data',$data));
    }

    public function PackagesList(){
    	$packages = Package::with(
            array(
                // 'amenities'=>function($query){
                //     $query->select('amenities_name');
                // },
                'places'
            ))->where('status','=',1)->limit(50)->get();
        $data['packages'] = $packages;
     	return view('web.all_packages',compact('data',$data));
    }
}
