<?php

namespace App\Http\Controllers;
use App\Helpers\CommonHelper;

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
use Illuminate\Support\Facades\Crypt;

use App\Model\Admin\Hotel;
use DB;

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
        $data['from_country_id'] ='';
        $data['from_state_id'] ='';
        $data['from_city_id'] = '';
        $data['to_country_id'] = '';
        $data['to_state_id'] ='';
        $data['to_city_id'] ='';
        $data['fr_details'] = '';
        $data['todetails'] = '';
        $data['type'] = '';
        $data['adult_count'] = '';
        $data['pacakge_type'] = DB::table('package_type')->where('status','=','1')->get();
     	return view('web.welcome')->with('data',$data);
    }
    public function sightSeeing()
    {
        $data['fr_details'] = '';
        $data['activities_view'] = Activity::where('status','=','1')->limit(12)->get();
      //  dd($data['activities_view']);
        return view('web.sight_seeing')->with('data',$data);
    }
    public function activitySearch(Request $request)
    {
        $data = $request->all();
        $data['city_id'] = $request->from_city_id;
        $data['state_id']= $request->from_state_id;
        $data['country_id']= $request->from_country_id;
        $data['fr_country_name'] = CommonHelper::getCountryName($data['country_id']);
        $data['fr_state_name'] = CommonHelper::getstateName($data['state_id']);
        $data['fr_city_name'] = CommonHelper::getcityName($data['city_id']);
        if($data['fr_country_name']!='')
        {
            $data['fr_details'] = $data['fr_country_name'].'-'.$data['fr_state_name'].'-'.$data['fr_city_name'];
        }
        else{
            $data['fr_details'] ='';
        }
        $data['activities_view']  = Activity::where([ 'country_id'=>$data['country_id'] , 'state_id'=>$data['state_id'] , 'city_id'=>$data['city_id'], 'status'=>'1' ])->get();
        return view('web.sight_seeing')->with('data',$data);
    }
    public function sightSeeingViewMore($id)
    {
        $activityid = crypt::decrypt($id); 
        $data['activities_view'] = Activity::where('status','=','1')->where('id','=',$activityid)->get();
       // dd($data['activities_view']);
        $data['package_id'] =  DB::table('package_activities as pa')->select('package_id')
                                    ->where('pa.activity_id','=',$activityid)
                                    ->get();
        return view('web.sight_seeing_view')->with('data',$data);
    }
    public function hotelDetails($id,$packid)
    {
        $hotelid = crypt::decrypt($id);
        $packageid = crypt::decrypt($packid);
        
        // $data['hotels'] = Hotel::with(
        //     array(
        //         'amenities'=>function($query){
        //             $query->select('amenities_name');
        //         },
        //         'roomtypes',
        //         'hotelimages'
        //     ))->where('id','=',$hotelid)->first();
            
        // $data['hotel_roomtypes'] = DB::table('hotel_roomtypes')->where('hotel_id','=',$hotelid)->pluck('roomtype_id');
        $data['hotel_data'] = Hotel::where('id','=',$hotelid)->first(); 
       $city_id =  $data['hotel_data']->city_id;
       
        $data['package_info'] = Package::where('id','=',$packageid)->first();
        $data['related_package'] = Package::where('id','=',$packageid)->where('to_city_id','=',$city_id)->limit(3)->get();
        $data['package_type'] = DB::table('package_type')->where('status','=','1')->get();
        $data['package_place'] = PackagePlace::where('package_id','=',$packageid)->get();
        return view("web.hotel_view",compact('data',$data));
    }
}
