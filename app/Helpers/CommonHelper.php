<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use DB;
use Carbon\Carbon;
use App\Model\Admin\Country;
use App\Model\Admin\State;
use App\Model\Admin\City;
use App\Model\Admin\ActivityImages;
use App\Model\Admin\Activity;
use App\Model\Admin\Package;
use App\Model\Admin\PackagePlace;
use App\Model\Admin\PackageHotel;
use App\Model\Admin\PackageActivities;
use App\Model\Admin\Hotel;
use App\Model\Admin\Amenities;
use App\Model\Admin\Website;
use App\Model\Admin\Booking;
use App\Model\Admin\BookingPlace;
use App\Model\Admin\BookingHotel;
use App\Model\Admin\BookingActivities;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Log;


class CommonHelper
{
	public function __construct() {
        
    }
    public static function getPackageName($package)
    {
        $details = DB::table("package_master")->whereIn('id',$package)
                                                ->select('package_name')
                                                ->get();

        return $details;
    }
    
    public static function getlogo()
    {
        return $logo = DB::table('website_settings')->where('status','=','1')->pluck('company_logo')->first();

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
     public static function getCountryDetails()
     {
        $data['country_view'] = Country::where('status','=','1')->get();
        return $data['country_view'];
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
        if($countryid!='')
        {
            return $country_name = Country::find($countryid)->country_name;
        }
        else{
            return '';
        }
		
    }
	public static function getstateName($stateid){
        if($stateid!='')
        {
            return $state_name = State::find($stateid)->state_name;
        }
        else{
            return '';
        }
		
    }
	public static function getcityName($cityid){
        if($cityid)
        {
            return $city_name = City::find($cityid)->city_name;
        }
        else{
            return '';
        }
		
    }
    public static function getAllcityName($cityid){
        if($cityid)
        {
            return $city_name = City::where('id','=',$cityid)->select('city_name')->get();
        }
        else{
            return '';
        }
		
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

    public static function getPackageHotels($packageid,$cityid){
       DB::select( DB::raw('set sql_mode=""'));
        $hotels_data = DB::table('package_hotel as ph')->select('ph.hotel_id')
                    ->where('ph.package_id','=',$packageid)
                    ->where('ph.city_id','=',$cityid)->groupBy('ph.hotel_id')->get();

        return $hotels_data;
        
    }

     public static function getBookingHotels($bookingid,$cityid){
       DB::select( DB::raw('set sql_mode=""'));
        $hotels_data = DB::table('booking_hotel as bh')->select('bh.hotel_id')
                    ->where('bh.booking_id','=',$bookingid)
                    ->where('bh.city_id','=',$cityid)->groupBy('bh.hotel_id')->get();

        return $hotels_data;
        
    }

    public static function getPackageHotelTypes($packageid,$cityid,$hotelid){
       DB::select( DB::raw('set sql_mode=""'));
        $hotels_rooms = DB::table('package_hotel as ph')->select('ph.roomtype_id','ph.total_rooms','ph.total_amount','type.room_type')
                      ->leftjoin('room_type as type','type.id','=','ph.roomtype_id')
                    ->where('ph.package_id','=',$packageid)
                    ->where('ph.city_id','=',$cityid)
                    ->where('ph.hotel_id','=',$hotelid)
                    ->get();

        return $hotels_rooms;
        
    }

    public static function getBookingHotelTypes($bookingid,$cityid,$hotelid){
       DB::select( DB::raw('set sql_mode=""'));
        $hotels_rooms = DB::table('booking_hotel as bh')->select('bh.roomtype_id','bh.total_rooms','bh.total_amount','type.room_type')
                      ->leftjoin('room_type as type','type.id','=','bh.roomtype_id')
                    ->where('bh.booking_id','=',$bookingid)
                    ->where('bh.city_id','=',$cityid)
                    ->where('bh.hotel_id','=',$hotelid)
                    ->get();

        return $hotels_rooms;
        
    }


    public static function getPackageHotelDetails($packageid,$cityid,$hotelid){
        $hotel_data = Hotel::with(
            array(
                'amenities'=>function($query){
                    $query->select('amenities_name');
                },
                //'roomtypes',
                'hotelimages'
            ))->where('id','=',$hotelid)->first();

        return $hotel_data;
        
    }

    public static function getBookingHotelDetails($bookingid,$cityid,$hotelid){
        $hotel_data = Hotel::with(
            array(
                'amenities'=>function($query){
                    $query->select('amenities_name');
                },
                //'roomtypes',
                'hotelimages'
            ))->where('id','=',$hotelid)->first();

        return $hotel_data;
        
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

    public static function getPackageActivitiesDays($packageid,$cityid,$daynumber){
        
        $activity_ids = DB::table('package_activities as pa')
                    ->where('pa.package_id','=',$packageid)
                    ->where('pa.city_id','=',$cityid)
                    ->where('pa.day_numbers','=',$daynumber)
                    ->pluck('pa.activity_id');
        
        $activities = Activity::with(
            array(
                'activity_images'
            ))->whereIn('id',$activity_ids)->get();
        //dd($activities);
        return $activities;
    }

     public static function getBookingActivitiesDays($bookingid,$cityid,$daynumber){
        
        $activity_ids = DB::table('booking_activities as ba')
                    ->where('ba.booking_id','=',$bookingid)
                    ->where('ba.city_id','=',$cityid)
                    ->where('ba.day_numbers','=',$daynumber)
                    ->pluck('ba.activity_id');
        
        $activities = Activity::with(
            array(
                'activity_images'
            ))->whereIn('id',$activity_ids)->get();
        //dd($activities);
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

    // public static function getBookingActivityCost($bookingid,$activityid){
    //      $activity_amount = DB::table('booking_activities as ba')
    //                 ->where('ba.booking_id','=',$bookingid)
    //                 ->where('ba.activity_id','=',$activityid)
    //                 ->pluck('ba.total_amount')->first();
    //                // dd(  $activity_amount);
    //     return $activity_amount==null ? 0 : $activity_amount;
    // }
    public static function getHotelImages($hotel_id)
    {
        $hotel_images = DB::table('hotel_images')->where('hotel_id','=',$hotel_id)->select('image_name')->Orderby('id', 'asc')->limit(3)->get();
       // dd($hotel_images);
      
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
        $activity_images = DB::table('activity_images')->where('activity_id','=',$activityid)->Orderby('id', 'asc')->limit(3)->get();
        return $activity_images;
    }
    public static function getallActivityImages($activityid)
    {
        $activity_images = DB::table('activity_images')->where('activity_id','=',$activityid)->Orderby('id', 'asc')->limit(4)->get();
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

   public static function newPackageNumber(){
       $last_no = DB::table('package_master')->orderBy('package_number', 'desc')->limit(1)->pluck('package_number');
       
        if(count($last_no)>0){
            $last_no =  $last_no[0];
            return is_numeric($last_no) ? $last_no+1 : 1000;
        }
        return 1000;
   }

   public static function newbookingNumber(){
    $last_no = DB::table('booking_master')->orderBy('booking_number', 'desc')->limit(1)->pluck('booking_number');
    
     if(count($last_no)>0){
         $last_no =  $last_no[0];
         return is_numeric($last_no) ? $last_no+1 : 1000;
     }
     return 1000;
}

    public static function newReferenceNumber(){
       $random = time() . rand(10*45, 100*98);
       return $random;
    }

   // public static function getBookingHotel($bookingid,$cityid){
   //      $hotel_data = DB::table('booking_hotel as ph')->select('hotel_id','roomtype_id','total_rooms','total_amount')
   //                  ->where('ph.booking_hotel','=',$bookingid)
   //                  ->where('ph.city_id','=',$cityid)->first();
      
   //      $hotels = null;
   //      if(!empty($hotel_data)){
   //          $hotels = Hotel::with(
   //          array(
   //              'amenities'=>function($query){
   //                  $query->select('amenities_name');
   //              },
   //              'roomtypes',
   //              'hotelimages'
   //          ))->where('id','=',$hotel_data->hotel_id)->first();
   //          $hotels['roomtype_id'] = $hotel_data->roomtype_id;
   //          $hotels['total_rooms'] = $hotel_data->total_rooms;
   //          $hotels['total_amount'] = $hotel_data->total_amount;
   //            //dd( $hotels);
   //          //return json_encode(['hotels' => $hotels, 'roomtype' => $hotel_data->roomtype_id]);
   //      }
   //      return $hotels;
        
   //  }
   public static function getWebsiteDetails()
   {
       $result = DB::table('website_settings')->where('status','=','1')->first();
       return $result;
   }
   public static function getPackageData($id)
   {
        $result = DB::table('package_master')->where('id','=',$id)
                
                        ->first();
                        //dd($result);
        return $result;
   }
   public static function getCustomerDetails($customerid)
   {
        $result = DB::table('customer_details')->where('id','=',$customerid)->first();
        return $result;
   }

   public static function getInterestRateTax($stateid){
        $taxrate = DB::table('interest_tax_rate')->where('state_id', '=', $stateid)->pluck('tax')->first();
       
        $taxrate = $taxrate=='' ? 0 : $taxrate;
        return $taxrate;
   }

   public static function getPackageTransports($packageid,$cityid){
        $transprts = DB::table('package_transports as t')
                   ->where('t.package_id','=',$packageid)
                   ->where('t.city_id','=',$cityid)->orderBy('day_numbers','asc')->get();
        return $transprts;
   }
   public static function getBookingTransports($bookingid,$cityid){
        $transprts = DB::table('booking_transports as t')
                   ->where('t.booking_id','=',$bookingid)
                   ->where('t.city_id','=',$cityid)->orderBy('day_numbers','asc')->get();
        return $transprts;
   }
   public static function getEncCustomerDetails($customerid)
   {
        $result = DB::table('customer_details')->where('id','=',$customerid)->first();
        $enc_customerid = crypt::encrypt($result);
        return $enc_customerid;
   }
   public static function getCreatedItineraries($userid)
   {
     if($userid!='' && $userid!=null)
     {
        $result = Package::where('user_id','=',$userid)->where('user_package','=',1)
                    ->select('id as packageid','package_name','adult_count','child_count','infant_count','to_city_id','total_amount','reference_number')->get();
        return $result;
     }
   }
   public static function getCreatedBooking($userid)
   {
     if($userid!='' && $userid!=null)
     {
        $result = Booking::where('customer_id','=',$userid)->where('user_booking','=',1)
                    ->select('id as bookingid','package_id','from_date','to_date','to_country_id','to_state_id','to_city_id','adult_count','child_count','infant_count','to_city_id','total_amount','reference_number')->get();
                    return $result;
     }
   }
   public static function getPackagePlace($packageid)
   {
       $result = DB::table('package_place')->where('package_id','=',$packageid)->pluck('nights_count')->first();
       return $result;
   }
   public static function getPackagePlaceCitiy($id)
   {
        $result = DB::table('package_place')->where('package_id','=',$id)->select('city_id')->get(); 
        return $result;
   }
   public static function getCityImage($cityid)
   {
        $result = DB::table('city')->where('id','=',$cityid)->select('city_image','city_name')->first();
        return $result;
   }
   public static function getRelatedPackges($id)
   { 
        $result = Package::where('id','=',$id)->limit(5)->first();
       // dd($result);
        return $result;
   }
   public static function getallHotelImages($id)
   {
        $hotel_images = DB::table('hotel_images')->where('hotel_id','=',$id)->Orderby('id', 'asc')->limit(4)->get();
        return $hotel_images;
   }
   public static function getallHotelAmenites($id)
   {
        $hotel_amenites = DB::table('hotel_amenities as ha')->select('amenities_name')
                            ->leftjoin('amenities as a','a.id','=','ha.amenity_id')
                            ->where('hotel_id','=',$id)->get();
                            
        return $hotel_amenites;
   }
//    public static function getHotelTypes($cityid,$hotelid)
//    {
//         DB::select( DB::raw('set sql_mode=""'));
//         $hotels_rooms = DB::table('hotels as h')->select('ph.roomtype_id','ph.total_rooms','ph.total_amount','type.room_type')
//                     ->leftjoin('room_type as type','type.id','=','ph.roomtype_id')
//                     ->where('ph.package_id','=',$packageid)
//                     ->get();

//         return $hotels_rooms;
//    }
    public static function getPackaName($id)
    {
        return $packageName = DB::table('package_master')->where('id','=',$id)->pluck('package_name')->first();
    }
    public static function getCustomerData($id)
    {
        return $customerDetails = DB::table('customer_details')->where('id','=',$id)->first();
    }
    public static function getBookingPlaceDetails($bookingid)
    {
        return   $data['booking_place'] = DB::table('booking_place')
                                     ->where('booking_id','=',$bookingid)->get();
                               
    }
}