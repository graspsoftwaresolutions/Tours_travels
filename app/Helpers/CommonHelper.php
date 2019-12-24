<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use DB;
use Carbon\Carbon;
use App\Model\Country;
use App\Model\State;
use App\Model\City;
use App\Model\ActivityImages;
use App\Model\Activity;
use App\Model\Package;
use App\Model\PackagePlace;
use App\Model\PackageHotel;
use App\Model\PackageActivities;
use App\Model\Hotel;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Log;


class CommonHelper
{
	public function __construct() {
        
    }
	
    public static function encryption(string $string)
    {
        return strtoupper($string);
    } 
	
	public static function decryption(string $string)
    {
        return strtoupper($string);
    }
	
	public static function random_password($length,$alpha=false)
    {
		$random = str_shuffle('1234567890');
		if($alpha){
			$random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ1234567890!$%^&!$%^&');
		}
		
		$password = substr($random, 0, 10);

        return $password;
    }

   

     public static function convert_date_database($date){
        $date_array = explode("/",$date);           							
        $date_format = $date_array[2]."-".$date_array[1]."-".$date_array[0];
        $converted_date = date('Y-m-d', strtotime($date_format));
        return $converted_date;
     }

    public static function convert_date_datepicker($date){
        return date('d/M/Y', strtotime($date));
    }

     public static function getExistingCountry($countryname)
     {
         $country_exists = Country::where('country_name','=',$countryname)->count();    
         return  $country_exists;
     }

     public static function DefaultCountry()
     {
         return 130;
     }
	 
    
    public static function getStateList($countryid){
        return DB::table('state')->select('id','state_name')->where('status','=','1')->where('country_id','=',$countryid)->get();
    }

    public static function getCCTestMail(){
        $ccmail = env("MAIL_CC",'test@gmail.com');
        return $ccmail;
    }
	
	public static function getCountryName($countryid){
		return $country_name = Country::find($countryid)->country_name;
    }
	public static function getstateName($stateid){
		return $state_name = State::find($stateid)->state_name;
    }
	public static function getcityName($cityid){
		return $city_name = City::find($cityid)->city_name;
    }
	
	public static function ConvertdatetoDBFormat($date){
		if($date!=""){
			$date = str_replace('/', '-', $date );
			$new_date = date("Y-m-d", strtotime($date));
		}else{
			$new_date = '0000-00-00';
		}
		return $new_date;
    }
	
	public static function getUserName($userid){
        return $status_data = DB::table('users')->where('id', $userid)->pluck('name')->first();
    }
	
	public static function getMonthDifference($fromdate,$todate){
		$date1 = strtotime($fromdate." 00:00:00");  
		$date2 = strtotime($todate." 00:00:00");  
		$diff_sign = $date2 - $date1;  
		$months = 0;
		if($diff_sign>0){
			$diff = abs($date2 - $date1);  
			$years = floor($diff / (365*60*60*24));  
			$months = floor(($diff - $years * 365*60*60*24) 
								   / (30*60*60*24));
		}
		
		/* $date = Carbon::parse($fromdate.' 01:00:00');
		$now = Carbon::parse($todate.' 01:00:00');

		$diff = $date->diffInMonths($now); */
		return $months;
	}

	public static function getCityList($stateid){
        return DB::table('city')->select('id','city_name','city_image')->where('status','=','1')->where('state_id','=',$stateid)->get();
    }
    public static function getroomtypename($values)
    {
        
    }
    public static function getHotelnames($hotelid)
    {
        return $hotelid;
        $data = DB::table('hotels')->select('id','hotel_name')->where('status','=','1')->where('id','=',$hotelid)->get();
            dd($data);
   
    }

    public static function getcityDetails($cityid){
        return City::where('id','=',$cityid)->first();
    }

    public static function getPackageHotel($packageid,$cityid){
        $hotel_data = DB::table('package_hotel as ph')->select('hotel_id','roomtype_id','total_rooms','total_amount')
                    ->where('ph.package_id','=',$packageid)
                    ->where('ph.city_id','=',$cityid)->first();
      
        $hotels = null;
        if(!empty($hotel_data)){
            $hotels = Hotel::with(
            array(
                'amenities'=>function($query){
                    $query->select('amenities_name');
                },
                'roomtypes',
                'hotelimages'
            ))->where('id','=',$hotel_data->hotel_id)->first();
            $hotels['roomtype_id'] = $hotel_data->roomtype_id;
            $hotels['total_rooms'] = $hotel_data->total_rooms;
            $hotels['total_amount'] = $hotel_data->total_amount;
              //dd( $hotels);
            //return json_encode(['hotels' => $hotels, 'roomtype' => $hotel_data->roomtype_id]);
        }
        return $hotels;
        
    }

    public static function getPackageActivities($packageid,$cityid){
        //dd($packageid);
        $activity_ids = DB::table('package_activities as pa')
                    ->where('pa.package_id','=',$packageid)
                    ->where('pa.city_id','=',$cityid)
                    ->pluck('pa.activity_id');
       // dd($activity_ids);
        $activities = Activity::with(
            array(
                'activity_images'
            ))->whereIn('id',$activity_ids)->get();
       // dd($activities);
        return $activities;
    }
	
    public static function getPackageActivityCost($packageid,$activityid){
         $activity_amount = DB::table('package_activities as pa')
                    ->where('pa.package_id','=',$packageid)
                    ->where('pa.activity_id','=',$activityid)
                    ->pluck('pa.total_amount')->first();
                   // dd(  $activity_amount);
        return $activity_amount==null ? 0 : $activity_amount;
    }
    public static function getHotelImages($hotel_id)
    {
        $hotel_images = DB::table('hotel_images')->where('hotel_id','=',$hotel_id)->select('image_name')->take(3)->get();
        return $hotel_images;
    }
    public static function getPackageInfo($packageid)
    {
        // $activity_ids = DB::table('package_activities as pa')
        //             ->where('pa.package_id','=',$packageid)
        //             ->select('pa.activity_id');
        $additionalInfo = DB::table('activities as a')
                    ->leftjoin('package_activities as pa','a.id','=','pa.activity_id')
                    ->where('pa.package_id','=',$packageid)->get();
        //dd($additionalInfo);
    }
    public static function getPackagetypename($packagetypeid)
    {
        $packagetype = DB::table('package_type')->where('id','=',$packagetypeid)->pluck('package_type')->first();
        return $packagetype;
    }
    public static function getActivityImages($activityid)
    {
        $activity_images = DB::table('activity_images')->where('activity_id','=',$activityid)->select('image_name')->take(3)->get();
        return $activity_images;
    }
    public static function getBookingHotel($bookingid,$cityid){
        $hotel_data = DB::table('booking_hotel as bh')->select('hotel_id','total_rooms','total_amount','roomtype_id')
                    ->where('bh.booking_id','=',$bookingid)
                    ->where('bh.city_id','=',$cityid)->first();
      
        $hotels = null;
        if(!empty($hotel_data)){
            $hotels = Hotel::with(
            array(
                'amenities'=>function($query){
                    $query->select('amenities_name');
                },
                'roomtypes',
                'hotelimages'
            ))->where('id','=',$hotel_data->hotel_id)->first();
             $hotels['roomtype_id'] = $hotel_data->roomtype_id;
            $hotels['total_rooms'] = $hotel_data->total_rooms;
            $hotels['total_amount'] = $hotel_data->total_amount;
              //dd( $hotels);
            //return json_encode(['hotels' => $hotels, 'roomtype' => $hotel_data->roomtype_id]);
        }
        return $hotels;

    }
    public static  function getBookingActivities($bookingid,$cityid){
        
            //dd($packageid);
            $activity_ids = DB::table('booking_activities as ba')
                        ->where('ba.booking_id','=',$bookingid)
                        ->where('ba.city_id','=',$cityid)
                        ->pluck('ba.activity_id');
           // dd($activity_ids);
            $activities = Activity::with(
                array(
                    'activity_images'
                ))->whereIn('id',$activity_ids)->get();
           // dd($activities);
            return $activities;
    }
    
    public static function getBookingActivityCost($bookingid,$activityid){
        $activity_amount = DB::table('booking_activities as ba')
                   ->where('ba.booking_id','=',$bookingid)
                   ->where('ba.activity_id','=',$activityid)
                   ->pluck('ba.total_amount')->first();
                  // dd(  $activity_amount);
       return $activity_amount==null ? 0 : $activity_amount;
   }
}