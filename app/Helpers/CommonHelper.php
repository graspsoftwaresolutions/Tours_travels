<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use DB;
use Carbon\Carbon;
use App\Model\Country;
use App\Model\State;
use App\Model\City;

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
        return DB::table('city')->select('id','city_name')->where('status','=','1')->where('state_id','=',$stateid)->get();
    }
    public static function getroomtypename($values)
    {
        
    }
	
	
}