<?php

namespace App\Http\Controllers\Admin;
use App\Model\Admin\Country;
use App\Model\Admin\State;
use App\Model\Admin\City;
use Illuminate\Http\Request;
use DB;
use App\Helpers\CommonHelper;
use App\Model\Admin\Booking;
use App\Model\Admin\BookingPlace;
use App\Model\Admin\BookingHotel;
use App\Model\Admin\BookingActivities;
use App\Model\Admin\ActivityImages;
use App\Model\Admin\BookigTransports;
use App\Model\Admin\Package;
use App\Model\Admin\Activity;
use App\Model\Admin\Website;
use App\Model\Admin\PaymentHistory;
use Session;
use Illuminate\Support\Facades\Crypt;
use App\Model\Admin\CustomerDetails;
use App\Model\Admin\BookingHotelConfirmation;
use App\Model\Admin\FollowupHistory;

use Auth;
use PDF;
class BookingController extends Controller
{
    public function __construct()
	{
	    $this->middleware('auth:admin');
    }
    public function index()
    {
       
        $data['country_view'] = Country::where('status','=','1')->get();
        $data['state_view'] = State::where('status','=','1')->get();
        $data['city_view'] = City::where('status','=','1')->get();
        $data['tax_data'] = DB::table('settings_tax')->where('status','=','1')->first();
        $data['package_type'] = DB::table('package_type')->where('status','=','1')->get();
        return view('admin.booking.new')->with('data',$data);
    }
    public function auto()
    {
        $data = DB::table('customer_details as c')->select(DB::raw("CONCAT(c.name,'-',c.zipcode,'-',c.id) AS value"),'c.name','c.email','c.phone','c.address_one','c.address_two','c.zipcode','cit.city_name','s.state_name')
                    ->join('city as cit','cit.id','=','c.city_id')
                    ->join('state as s','s.id','=','c.state_id')
                    //  ->orwhere("c.name","LIKE","%{$keyword}%")
                    //  ->orwhere("c.phone","LIKE","%{$keyword}%")
                    // ->orwhere('c.zipcode','like', '%'.$keyword.'%')
                    // ->orwhere('cit.city_name','like', '%'.$keyword.'%')
                ->get();
        return view('admin.booking.testauto')->with('data',$data);
    }

    public function bookingSave(Request $request)
    {
        //return $request->transport_additional_charges;
        //return $request->all();
        $request->validate([
            'packageid' => 'required',
            'customer_id' => 'required',
            'total_package_value' => 'required',
            'adult_price' => 'required',
                ], [
            'packageid.required' => 'please select package name',
            'customer_id.required' => 'please select city',
            'total_package_value.required' => 'please enter package value',
            'adult_price.required' => 'please enter adult cost',
        ]);
         $SaveBooking = new Booking();
         $SaveBooking->package_id = $request->packageid;
         $SaveBooking->customer_id = $request->customer_id;
         $SaveBooking->adult_count = $request->adult_count;
         $SaveBooking->child_count = $request->child_count;
         $SaveBooking->infant_count = $request->infant_count;
         $SaveBooking->to_city_id = $request->travelling_to_city_id;
         $SaveBooking->to_country_id = $request->travelling_to_country_id;
         $SaveBooking->to_state_id = $request->travelling_to_state_id;
         $SaveBooking->from_city_id = $request->travelling_from_city_id;
         $SaveBooking->from_country_id = $request->travelling_from_country_id;
         $SaveBooking->from_state_id = $request->travelling_from_state_id;
         $SaveBooking->total_accommodation = $request->total_accommodation;
         $SaveBooking->total_activities = $request->total_activities;
        // $SaveBooking->additional_charges = $request->additional_charges;
        // $SaveBooking->transport_charges = $request->transport_charges;
         $SaveBooking->transport_additional_charges = $request->additional_transport;
         $SaveBooking->total_package_value = $request->total_package_value;
         $SaveBooking->tax_percentage = $request->gst_per;
         $SaveBooking->tax_amount = $request->gst_amount;
         $SaveBooking->total_amount = $request->total_amount;
         $SaveBooking->adult_price_person = $request->adult_price;
         $SaveBooking->package_type = $request->package_type;
         $SaveBooking->child_price_person = $request->child_price==null ? 0 : $request->child_price;
         $SaveBooking->infant_price = $request->infant_price==null ? 0 : $request->infant_price;
         $SaveBooking->discount_amount = $request->discount_amt;
         $SaveBooking->from_date = $request->from_date;
         $SaveBooking->to_date = $request->to_date;
         $SaveBooking->grand_total = $request->grand_total_amount;
         $SaveBooking->booking_number =  CommonHelper::newbookingNumber();
         $SaveBooking->created_by = Auth::user()->id;
         $SaveBooking->user_booking = 0;
         $SaveBooking->additional_charges = $request->additional_charges;
         $SaveBooking->extra_amount = $request->extra_cost;
         $SaveBooking->payment_mode  = 2;    

         $paymenttype = $request->paymenttype;
         $SaveBooking->payment_type = $paymenttype;
         if($paymenttype==2){
            $SaveBooking->paid_amount = $request->pay_amount;
            $SaveBooking->balance_amount = $request->balance_amount;
            $SaveBooking->paid_percentage = $request->pay_percent;
            $SaveBooking->balance_percentage = $request->balance_percent;
         }else{
            $SaveBooking->paid_amount = $request->grand_total_amount;
            $SaveBooking->balance_amount = 0;
         }

         $SaveBooking->save();
         $booking_id = $SaveBooking->id; 

            //Payment History
            $payment_date = date('Y-m-d');
            $followed_by = Auth::user()->name();
            $payment_mode = 'cash';
            $customer_id = DB::table('booking_master')->where('id','=',$booking_id)->pluck('customer_id')->first();
        
            if($payment_date != null && $payment_date != '')
            {      
                $paymentHistory = new PaymentHistory();
                $paymentHistory->customer_id = $request->customer_id;
                $paymentHistory->booking_id = $booking_id;
                $paymentHistory->payment_date = $payment_date;
                if($paymenttype==1)
                {
                    $paymentHistory->payment_amount = $request->grand_total_amount;
                }
                else{
                    $paymentHistory->payment_amount = $request->pay_amount;
                }
                $paymentHistory->payment_mode = $payment_mode;
                $paymentHistory->reference_number = '';
                $paymentHistory->followed_by = $followed_by;
                $paymentHistory->created_by = Auth::user()->id;
                $paymentHistory->status = 1;
                $paymentHistory->save();   
            }
          $check_picked_state = $request->input('picked_state');
			if( isset($check_picked_state)){
                $state_count = count($request->input('picked_state'));
                $total_nights = 0;
				for($i =0; $i<$state_count; $i++){
					$state_id = $request->input('picked_state')[$i];
                    $city_id = $request->input('picked_city')[$i];
                    $nights_count = 0;
                    $night_cnt = $request->input('place_night_count_'.$city_id);
                    if(isset($night_cnt)){
                        $nights_count = $night_cnt[0];
                    }
				
					
                    $booking_place = new BookingPlace() ;
                    $booking_place->booking_id = $booking_id;
                    $booking_place->state_id = $state_id;
                    $booking_place->city_id = $city_id;
                    $booking_place->nights_count = $nights_count;
                    $booking_place->save();

                    $check_hotel_id = $request->input('second_hotel_'.$city_id);
                    $hotel_id = $request->input('second_hotel_'.$city_id);
                   
                    if(isset($check_hotel_id)){
                        $hotel_count = count($request->input('second_hotel_'.$city_id));
                        for($k =0; $k<$hotel_count; $k++){
                            $hotel_id = $request->input('second_hotel_'.$city_id)[$k];
                            $check_hotel_typeid = $request->input('hotel_room_type_'.$hotel_id);
                            if(isset($check_hotel_typeid)){
                                $hoteltype_count = count($request->input('hotel_room_type_'.$hotel_id));
                                for($l =0; $l<$hoteltype_count; $l++){
                                    $hotel_room_type_id = $request->input('hotel_room_type_'.$hotel_id)[$l];
                                    $hotel_room_type_numbers = $request->input('type_hotel_number_count_'.$hotel_id)[$l];
                                    $hotel_room_type_cost = $request->input('hotel_room_cost_'.$hotel_id)[$l];

                                    $booking_hotel = new BookingHotel() ;
                                    $booking_hotel->booking_id = $booking_id;
                                    $booking_hotel->city_id = $city_id;
                                    $booking_hotel->hotel_id = $hotel_id;
                                    $booking_hotel->roomtype_id = $hotel_room_type_id;
                                    $booking_hotel->total_rooms = $hotel_room_type_numbers;
                                    $booking_hotel->total_amount = $hotel_room_type_cost;
                                    $booking_hotel->save();

                                }
                            }
                        }
                       
                    }

                    if($nights_count>0){
                        for($n=1;$n<=$nights_count;$n++){
                            $day_number = $total_nights+$n;
                            $activity_ids = $request->input('second_activity_'.$city_id.'_'.$day_number);
                            if( isset($activity_ids)){
                                $activity_count = count($activity_ids);
                                for($j =0; $j<$activity_count; $j++){
                                    $activity_id = $request->input('second_activity_'.$city_id.'_'.$day_number)[$j];
                                    $booking_activities = new BookingActivities() ;
                                    $booking_activities->booking_id = $booking_id;
                                    $booking_activities->day_numbers = $day_number;
                                    $booking_activities->city_id = $city_id;
                                    $booking_activities->activity_id = $activity_id;
                                    $activity_cost = $request->input('activity_cost_'.$city_id.'_'.$day_number);
                                    if(isset($activity_cost)){
                                        $booking_activities->total_amount = $activity_cost[$j];
                                    }
                                    $booking_activities->save();
                                }
                            }
                        }
                    }
                    $total_nights += $nights_count;

                    $pickup_ids = $request->input('airportpickup_'.$city_id);
                    if(isset($pickup_ids)){
                        $pickup_count = count($pickup_ids);
                        for($m =0; $m<$pickup_count; $m++){
                            $pickup_amt = $request->input('airportpickup_'.$city_id)[$m];
                            $driverbeta_amt = $request->input('driverbeta_'.$city_id)[$m];
                            $tollparking_amt = $request->input('tollparking_'.$city_id)[$m];
                            $interestrate_amt = $m==0 ? $request->input('interestrate_'.$city_id) : 0;
                           $pickup_amt = $pickup_amt==null ? 0 : $pickup_amt;
                           $driverbeta_amt = $driverbeta_amt==null ? 0 : $driverbeta_amt;
                           $tollparking_amt = $tollparking_amt==null ? 0 : $tollparking_amt;
                           $interestrate = $interestrate_amt==null ? 0 : $interestrate_amt;

                            if($pickup_amt!=0 || $driverbeta_amt!=0 || $tollparking_amt!=0 || $interestrate!=0){
                                $booking_transports = new BookigTransports() ;
                                $booking_transports->booking_id = $booking_id;
                                $booking_transports->city_id = $city_id;
                                $booking_transports->airportpickup_amount = $pickup_amt;
                                $booking_transports->driverbeta_amount = $driverbeta_amt;
                                $booking_transports->tollparking_amount = $tollparking_amt;
                                $booking_transports->interestrate_amount = $interestrate;
                                $booking_transports->day_numbers = $m+1;
                                $booking_transports->save();
                            }
                        }
                    }
                   // dd($hotel_id);  
				}
            }
        return redirect('admin/booking_list')->with('message','Booking Added Successfully!!');
        //return json_encode($package);
    }
    public function List(){
        $data = [];
        return view('admin.package.list')->with('data',$data);
    }
    public function bookingList()
    {
        $data = [];
        return view('admin.booking.list')->with('data',$data);
    }
    public function EditBooking($encid){
        $bookingid = crypt::decrypt($encid);
        $data['country_view'] = Country::where('status','=','1')->get();
        $data['booking_info'] = Booking::where('id','=',$bookingid)->first();
        $data['package_type'] = DB::table('package_type')->where('status','=','1')->get();
        $data['booking_place'] = BookingPlace::where('booking_id','=',$bookingid)->get();
        $data['tax_data'] = DB::table('settings_tax')->where('status','=','1')->first();
        $data['package_info'] = Package::where('id','=',$data['booking_info']->package_id)->first();
        //$data['country_view'] = Country::where('status','=','1')->get();
        $data['state_view'] = State::where('status','=','1')->get();
        $data['city_view'] = City::where('status','=','1')->get();
        $data['package_place'] = $data['booking_place'];
        $data['customer_info'] = CustomerDetails::where('id','=',$data['booking_info']->customer_id)->first();
        return view('admin.booking.edit_booking',compact('data',$data));
    }

    public function DeleteActivity(Request $request){
        $activity_id = $request->input('activity_id');
        $city_id = $request->input('city_id');
        $booking_id = $request->input('booking_id');
        return DB::table('booking_activities')->where('booking_id','=',$booking_id)->where('activity_id','=',$activity_id)->delete();
    }



    public function bookingUpdate(Request $request){
        // return $request->all();
         $request->validate([
            'packageid' => 'required',
            'customer_id' => 'required',
            'total_package_value' => 'required',
            'adult_price' => 'required',
                ], [
            'packageid.required' => 'please select package name',
            'customer_id.required' => 'please select city',
            'total_package_value.required' => 'please enter package value',
            'adult_price.required' => 'please enter adult cost',
         ]);
         $auto_id = $request->input('auto_id');
          $SaveBooking = Booking::find($auto_id);
          $SaveBooking->package_id = $request->packageid;
         $SaveBooking->customer_id = $request->customer_id;
         $SaveBooking->adult_count = $request->adult_count;
         $SaveBooking->child_count = $request->child_count;
         $SaveBooking->infant_count = $request->infant_count;
         $SaveBooking->to_city_id = $request->travelling_to_city_id;
         $SaveBooking->to_country_id = $request->travelling_to_country_id;
         $SaveBooking->to_state_id = $request->travelling_to_state_id;
         $SaveBooking->from_city_id = $request->travelling_from_city_id;
         $SaveBooking->from_country_id = $request->travelling_from_country_id;
         $SaveBooking->from_state_id = $request->travelling_from_state_id;
         $SaveBooking->total_accommodation = $request->total_accommodation;
         $SaveBooking->total_activities = $request->total_activities;
        // $SaveBooking->additional_charges = $request->additional_charges;
        // $SaveBooking->transport_charges = $request->transport_charges;
         $SaveBooking->transport_additional_charges = $request->additional_transport;
         $SaveBooking->total_package_value = $request->total_package_value;
         $SaveBooking->tax_percentage = $request->gst_per;
         $SaveBooking->tax_amount = $request->gst_amount;
         $SaveBooking->total_amount = $request->total_amount;
         $SaveBooking->adult_price_person = $request->adult_price;
         $SaveBooking->package_type = $request->package_type;
         $SaveBooking->child_price_person = $request->child_price==null ? 0 : $request->child_price;
         $SaveBooking->infant_price = $request->infant_price==null ? 0 : $request->infant_price;
         $SaveBooking->discount_amount = $request->discount_amt;
         $SaveBooking->from_date = $request->from_date;
         $SaveBooking->status = 0;
         $SaveBooking->to_date = $request->to_date;
         $SaveBooking->grand_total = $request->grand_total_amount;
         $update_user_booking = DB::table('booking_master')->where('id','=',$auto_id)->pluck('user_booking')->first();
         if($update_user_booking == 1)
         {
            $SaveBooking->user_booking  = 1;  
         }
         else{
            $SaveBooking->user_booking  = 0;
         } 
        //$SaveBooking->user_booking  = 0;
         //$SaveBooking->payment_mode  = 'cash';      
         $SaveBooking->additional_charges = $request->additional_charges;
         $SaveBooking->extra_amount = $request->extra_cost;

         $paymenttype = $request->paymenttype;
         $SaveBooking->payment_type = $paymenttype;
         if($paymenttype==2){
            $SaveBooking->paid_amount = $request->pay_amount;
            $SaveBooking->balance_amount = $request->balance_amount;
            $SaveBooking->paid_percentage = $request->pay_percent;
            $SaveBooking->balance_percentage = $request->balance_percent;
         }else{
            $SaveBooking->paid_amount = $request->grand_total_amount;
            $SaveBooking->balance_amount = 0;
         }
 
          $SaveBooking->save();
          $booking_id = $SaveBooking->id; 
 
           $check_picked_state = $request->input('picked_state');
             if( isset($check_picked_state)){
 
                 DB::table('booking_hotel')->where('booking_id','=',$booking_id)->delete();
                 DB::table('booking_place')->where('booking_id','=',$booking_id)->delete();
                 DB::table('booking_activities')->where('booking_id','=',$booking_id)->delete();
                 DB::table('booking_transports')->where('booking_id','=',$booking_id)->delete();
 
                 $state_count = count($request->input('picked_state'));
                 $total_nights = 0;
                 for($i =0; $i<$state_count; $i++){
                     $state_id = $request->input('picked_state')[$i];
                     $city_id = $request->input('picked_city')[$i];
                     $nights_count = 0;
                     $night_cnt = $request->input('place_night_count_'.$city_id);
                     if(isset($night_cnt)){
                         $nights_count = $night_cnt[0];
                     }
                     $booking_place = new BookingPlace() ;
                     $booking_place->booking_id = $booking_id;
                     $booking_place->state_id = $state_id;
                     $booking_place->city_id = $city_id;
                     $booking_place->nights_count = $nights_count;
                     $booking_place->save();
 
                     $check_hotel_id = $request->input('second_hotel_'.$city_id);
                     $hotel_id = $request->input('second_hotel_'.$city_id);
                    
                     if(isset($check_hotel_id)){
                         $hotel_count = count($request->input('second_hotel_'.$city_id));
                         for($k =0; $k<$hotel_count; $k++){
                             $hotel_id = $request->input('second_hotel_'.$city_id)[$k];
                             $check_hotel_typeid = $request->input('hotel_room_type_'.$hotel_id);
                             if(isset($check_hotel_typeid)){
                                 $hoteltype_count = count($request->input('hotel_room_type_'.$hotel_id));
                                 for($l =0; $l<$hoteltype_count; $l++){
                                     $hotel_room_type_id = $request->input('hotel_room_type_'.$hotel_id)[$l];
                                     $hotel_room_type_numbers = $request->input('type_hotel_number_count_'.$hotel_id)[$l];
                                     $hotel_room_type_cost = $request->input('hotel_room_cost_'.$hotel_id)[$l];
 
                                     $booking_hotel = new BookingHotel() ;
                                     $booking_hotel->booking_id = $booking_id;
                                     $booking_hotel->city_id = $city_id;
                                     $booking_hotel->hotel_id = $hotel_id;
                                     $booking_hotel->roomtype_id = $hotel_room_type_id;
                                     $booking_hotel->total_rooms = $hotel_room_type_numbers;
                                     $booking_hotel->total_amount = $hotel_room_type_cost;
                                     $booking_hotel->save();
 
                                 }
                             }
                         }
                        
                     }
                     
                     if($nights_count>0){
                        for($n=1;$n<=$nights_count;$n++){
                            $day_number = $total_nights+$n;
                            $activity_ids = $request->input('second_activity_'.$city_id.'_'.$day_number);
                            if( isset($activity_ids)){
                                $activity_count = count($activity_ids);
                                for($j =0; $j<$activity_count; $j++){
                                    $activity_id = $request->input('second_activity_'.$city_id.'_'.$day_number)[$j];
                                    $booking_activities = new BookingActivities() ;
                                    $booking_activities->booking_id = $booking_id;
                                    $booking_activities->day_numbers = $day_number;
                                    $booking_activities->city_id = $city_id;
                                    $booking_activities->activity_id = $activity_id;
                                    $activity_cost = $request->input('activity_cost_'.$city_id.'_'.$day_number);
                                    if(isset($activity_cost)){
                                        $booking_activities->total_amount = $activity_cost[$j];
                                    }
                                    $booking_activities->save();
                                }
                            }
                        }
                        
                    }
                    $total_nights += $nights_count; 

                    $pickup_ids = $request->input('airportpickup_'.$city_id);
                    if( isset($pickup_ids)){
                        $pickup_count = count($pickup_ids);
                        for($m =0; $m<$pickup_count; $m++){
                            $pickup_amt = $request->input('airportpickup_'.$city_id)[$m];
                            $driverbeta_amt = $request->input('driverbeta_'.$city_id)[$m];
                            $tollparking_amt = $request->input('tollparking_'.$city_id)[$m];
                            $interestrate_amt = $m==0 ? $request->input('interestrate_'.$city_id) : 0;
                           $pickup_amt = $pickup_amt==null ? 0 : $pickup_amt;
                           $driverbeta_amt = $driverbeta_amt==null ? 0 : $driverbeta_amt;
                           $tollparking_amt = $tollparking_amt==null ? 0 : $tollparking_amt;
                           $interestrate = $interestrate_amt==null ? 0 : $interestrate_amt;

                            if($pickup_amt!=0 || $driverbeta_amt!=0 || $tollparking_amt!=0 || $interestrate!=0){
                                $booking_transports = new BookigTransports() ;
                                $booking_transports->booking_id = $booking_id;
                                $booking_transports->city_id = $city_id;
                                $booking_transports->airportpickup_amount = $pickup_amt;
                                $booking_transports->driverbeta_amount = $driverbeta_amt;
                                $booking_transports->tollparking_amount = $tollparking_amt;
                                $booking_transports->interestrate_amount = $interestrate;
                                $booking_transports->day_numbers = $m+1;
                                $booking_transports->save();
                            }
                            
                        }
                    }
                    // dd($hotel_id);
                     
                 }
             }
         return redirect('admin/booking_list')->with('message','Booking Updated Successfully!!');
     }
     public function confirmBookingList()
     {
        return view('admin.booking.confirmed_list');
     }

     public function PackageHotels(Request $request){
        $package_id = $request->input('package_id');
        $city_id = $request->input('city_id');
        $package_hotels = CommonHelper::getPackageHotels($package_id,$city_id);
        $hotel_info = [];
        foreach($package_hotels as $key => $hotel){
            $hotel_id = $hotel->hotel_id;
            $room_types = CommonHelper::getPackageHotelTypes($package_id,$city_id,$hotel_id);
            $hotel_details = CommonHelper::getPackageHotelDetails($package_id,$city_id,$hotel_id);
            $hotel_info[$hotel_id]['id'] = $hotel_id;
            $hotel_info[$hotel_id]['room_types'] = $room_types;
            $hotel_info[$hotel_id]['hotel_details'] = $hotel_details;
        }
        return $hotel_info;
    }

    public function PackageActivities(Request $request){
        $package_id = $request->input('package_id');
        $city_id = $request->input('city_id');
        $day_number = $request->input('day_number');

        $activity_ids = DB::table('package_activities as pa')
                    ->where('pa.package_id','=',$package_id)
                    ->where('pa.city_id','=',$city_id)
                    ->where('pa.day_numbers','=',$day_number)
                    ->pluck('pa.activity_id');
        $activity_data = [];
        foreach($activity_ids as $key => $activity){
            $activityid = $activity;

            $activities = Activity::with(
                array(
                    'activity_images'
                ))->where('id',$activityid)->get();
            $activity_data[$activityid]['activity_data'] =  $activities;
            $activity_data[$activityid]['cost'] = CommonHelper::getPackageActivityCost($package_id,$activityid);
            $activity_data[$activityid]['daynumber'] =  $day_number;
            
        }
       // $package_activities = CommonHelper::getPackageActivities($package_id,$city_id,$day_number);
        return $activity_data;
    }

    public function getTransportdata(Request $request){
        $package_id = $request->input('package_id');
        $city_id = $request->input('city_id');
        $state_id = $request->input('state_id');
        $transports = DB::table('package_transports')
                 ->select('city_id',DB::raw('sum(airportpickup_amount) as airportpickup_amount'),DB::raw('sum(driverbeta_amount) as driverbeta_amount'),DB::raw('sum(tollparking_amount) as tollparking_amount'),DB::raw('sum(interestrate_amount) as interestrate_amount'))
                 ->where('city_id',$city_id)
                 ->where('package_id',$package_id)
                 ->groupBy('city_id')
                // ->dump()
                 ->first();
        return json_encode($transports);
    }
    public function bookingInvoice($encid ,$Name)
    {
        
        $bookingid = crypt::decrypt($encid);
        $data['booking_details'] = DB::table('booking_master')->where('id','=',$bookingid)->get();
        $user_id = DB::table('booking_master')->where('id','=',$bookingid)->pluck('customer_id')->first();
        $customer_data = DB::table('users')->where('customer_id','=',$user_id)->select('name','email')->first();
        
        if($data['booking_details']!='' && $user_id!='')
        {
           $booking_number = $data['booking_details'][0]->booking_number;
           // return view('web.tour.pdf.booking_invoicepdf',$data);
            $pdf = PDF::loadView('web.tour.pdf.booking_invoicepdf', $data);
          //  return  $pdf->stream();
            $pdf->save(storage_path('app/pdf/'.$booking_number.'_booking_invoice.pdf'));
            
                $to_email =  $customer_data->email;
                $cc_email = 'shyni.bizsoft@gmail.com';
            \Mail::to($to_email)->cc($cc_email)->send(new \App\Mail\BookingInvoice($booking_number,$customer_data));
        }
        if($Name == "confirm-booking")
        {
            return redirect('admin/confirm_booking')->with('message','Mail Sent Successfully!!');
        }
        elseif($Name == "followup-booking")
        {
            return redirect('admin/follow_up_booking')->with('message','Mail Sent Successfully!!');
        }
        else{
            return redirect('admin/booking_list')->with('message','Mail Sent Successfully!!');
        }
        
    }

    //Booking Follow up view
    public function followupBooking()
    {
        return view('admin.booking.followup_list');
    }
    public function hotelConfirmation(Request $request)
    {
        $hotel_id = $request->input('hotelid');
        $cityid = $request->input('city_id');
        $bookingid = $request->input('booking_id');

         if($hotel_id!='')
         {
            $booking_hotel = DB::table('booking_hotel')->where('booking_id','=',$bookingid)->where('hotel_id','=',$hotel_id)->get();

            foreach($booking_hotel as $hotel)
            {
                $BookingHotel = new BookingHotelConfirmation();
                $BookingHotel->booking_id = $bookingid;
                $BookingHotel->city_id = $hotel->city_id;
                $BookingHotel->hotel_id = $hotel->hotel_id;
                $BookingHotel->roomtype_id = $hotel->roomtype_id;
                $BookingHotel->total_rooms = $hotel->total_rooms; 
                $BookingHotel->total_amount = $hotel->total_amount;
                $BookingHotel->approval_status = 0;
                $BookingHotel->save();
            }
            
            $toMailDetails = DB::table('hotels')->where('id','=',$hotel_id)->select('contact_name','contact_email')->first();
            $from_mail = Website::pluck('company_email')->first();
            $to_mail = $toMailDetails->contact_email;
          //  $to_mail = 'mounika.bizsoft@gmail.com';
            //$cc_email = 'shyni.bizsoft@gmail.com';
            $cc_email = 'murugan.bizsoft@gmail.com';
            if( $to_mail!=''){
                \Mail::to($to_mail)->cc($cc_email)->send(new \App\Mail\HotelConfirmation($hotel_id,$cityid,$bookingid));

                
            }
              $hotelconfirmation_status = CommonHelper::getHotelConfirmationStatus($bookingid,$cityid,$hotel_id);

              return json_encode($hotelconfirmation_status);
         }
    }
    public function followupPaymentHistorySave(Request $request)
    {
        $data = $request->all();
        $due_date = $data['due_date'];
        $payment_date = $data['payment_date'];
        $reason = $data['reason'];
        $amount = $data['amount']; 
        $followed_by = $data['followed_by']; 
        $amount = $data['amount']; 
        $payment_mode = 'cash';
        $booking_id = $data['bookingid'];
        $due_amount = DB::table('booking_master')->where('id','=',$booking_id)->pluck('balance_amount')->first();
        $customer_id = DB::table('booking_master')->where('id','=',$booking_id)->pluck('customer_id')->first();
        
        if($payment_date != null && $payment_date != '' && $amount !='')
        {      
            $paymentHistory = new PaymentHistory();
            $paymentHistory->customer_id = $customer_id;
            $paymentHistory->booking_id = $booking_id;
            $paymentHistory->payment_date = $payment_date;
            if($amount)
            {
                $payment_details =  DB::table('booking_master')->where('id','=',$booking_id)->select('grand_total','paid_amount','paid_percentage','balance_amount','balance_percentage')->first();
                if($payment_details->balance_amount!=0)
                {
                    $paid_amount = number_format($payment_details->paid_amount+$amount,2,'.', '');  
                    $total = $payment_details->grand_total;
                    $number = number_format($payment_details->paid_amount+$amount,2,'.', '');
                    $paid_percentage = CommonHelper::get_percentage($total, $number); 
                    
                    $balance_amount = number_format($payment_details->balance_amount-$amount,2,'.', '');
                    $balance_percentage = number_format(100-$paid_percentage,2,'.', '');
                    $booking_amount_update = DB::table('booking_master')->where('id','=',$booking_id)->update([
                        'paid_amount' => $paid_amount , 'balance_amount' => $balance_amount , 'paid_percentage'=>$paid_percentage , 'balance_percentage' => $balance_percentage 
                        ]);
                }
                $balance = DB::table('booking_master')->where('id','=',$booking_id)->select('paid_amount','grand_total')->first();
                if($balance->paid_amount == $balance->grand_total)
                {
                    $booking_amount_update = DB::table('booking_master')->where('id','=',$booking_id)->update([
                         'payment_type' => '1','due_date' => Null
                     ]);

                     //Follow up History
                     //Status = 2 - paid completely
                    $max_updated_date = DB::table('followup_history')->whereRaw('updated_at = (select max(`updated_at`) from followup_history)')
                                        ->where('booking_id','=',$booking_id)
                                        ->get();
                    $followup_status_update = DB::table('followup_history')->where('updated_at','=',$max_updated_date[0]->updated_at)
                                                ->update([
                                                    'status' => '2'
                                                ]);
                }
            }
            $paymentHistory->payment_amount = $amount;
            $paymentHistory->payment_mode = $payment_mode;
            $paymentHistory->reference_number = '';
            $paymentHistory->followed_by = $followed_by;
            $paymentHistory->created_by = Auth::user()->id;
            $paymentHistory->status = 1;
            $paymentHistory->save();   
        }
        if($due_date != null && $due_date!= '')
        {
            $booking_update = DB::table('booking_master')->where('id','=',$booking_id)->update([
                'due_date' => $due_date , 'follow_status' => 1 
            ]);
            $FollowupHistory = new FollowupHistory();
            $FollowupHistory->booking_id = $booking_id;
            $FollowupHistory->due_date = $due_date;
            $balance_amount = DB::table('booking_master')->where('id','=',$booking_id)->pluck('balance_amount')->first();
            $FollowupHistory->due_amount = $balance_amount;
            $FollowupHistory->due_reason = $reason;
            $FollowupHistory->followed_by = $followed_by;
            $FollowupHistory->followed_date = date('Y-m-d');
            $FollowupHistory->customer_id = $customer_id;

            $FollowupHistory->created_by = Auth::user()->id;
            $FollowupHistory->status = 1;
            $FollowupHistory->save();
        }
        return json_encode($booking_id);
    }

    public function dueDateNotificationList()
    {
        $current_date = date('Y-m-d');
        $tomorrow_date = date('Y-m-d',strtotime("+1 days"));
        $duedate_followup_list_count = FollowupHistory::where('due_date','=',$current_date)
        ->orwhere('due_date','=',$tomorrow_date)->count();
        return view('admin.booking.due_date_list');
    }

    public function HotelConfirmations(Request $request){
        $booking_id = $request->input('booking_id');
        $hotel_id = $request->input('hotel_id');
        $city_id = $request->input('city_id');
        $hotel_details = CommonHelper::getBookingHotelDetails($booking_id,$city_id,$hotel_id);
        $hotel_info['hotel_details'] = $hotel_details;

        DB::select( DB::raw('set sql_mode=""'));
        $hotels_rooms = DB::table('booking_hotel_confirmation as bh')->select('bh.roomtype_id','bh.total_rooms','bh.total_amount','type.room_type','bh.updated_total')
                      ->leftjoin('room_type as type','type.id','=','bh.roomtype_id')
                    ->where('bh.booking_id','=',$booking_id)
                    ->where('bh.city_id','=',$city_id)
                    ->where('bh.hotel_id','=',$hotel_id)
                    ->get();
        $hotel_info['room_types'] = $hotels_rooms;
      
        return $hotel_info;
    }
    public function paymentHistory($bookingid)
    {
        $booking_id = Crypt::decrypt($bookingid);
        $customer_id = DB::table('booking_master')->where('id','=',$booking_id)->pluck('customer_id')->first();
        $data['customer_deatils'] = DB::table('customer_details')->where('id','=',$customer_id)->first();
        $data['booking_details'] = DB::table('booking_master')->where('id','=',$booking_id)->first();
        $data['payment_details'] = DB::table('payment_history')
                                ->where('booking_id','=',$booking_id)
                                ->where('customer_id','=',$customer_id)->get();
        return view('admin.booking.payment_history')->with('data',$data);
    }
    public function followupHistory($bookingid)
    {
        $booking_id = Crypt::decrypt($bookingid);
        $customer_id = DB::table('booking_master')->where('id','=',$booking_id)->pluck('customer_id')->first();
        $data['customer_deatils'] = DB::table('customer_details')->where('id','=',$customer_id)->first();
        $data['booking_details'] = DB::table('booking_master')->where('id','=',$booking_id)->first();
        $data['followup_details'] = DB::table('followup_history')
                                ->where('booking_id','=',$booking_id)
                                ->where('customer_id','=',$customer_id)->get();
        return view('admin.booking.followup_history')->with('data',$data);
    }
    public function changeStatus(Request $request)
    {
      //  $data = $request->all();
          $changeStatus = $request->changeStatus;
          $bookingid = $request->bookingid;

          $result = Booking::where('id','=',$bookingid)->update([ 'status'=>$changeStatus ]);

          $data['booking_details'] = DB::table('booking_master')->where('id','=',$bookingid)->get();
          $user_id = DB::table('booking_master')->where('id','=',$bookingid)->pluck('customer_id')->first();
          $customer_data = DB::table('users')->where('customer_id','=',$user_id)->select('name','email')->first();
          
        //   if($data['booking_details']!='' && $user_id!='')
        //   {
        //      $booking_number = $data['booking_details'][0]->booking_number;
        //       $pdf = PDF::loadView('web.tour.pdf.booking_invoicepdf', $data);
        //       $pdf->save(storage_path('app/pdf/'.$booking_number.'_booking_invoice.pdf'));
              
        //         $to_email =  $customer_data->email;
        //         $cc_email = 'mounika.bizsoft@gmail.com';
        //       \Mail::to($to_email)->cc($cc_email)->send(new \App\Mail\BookingConfimationCustomerMail($bookingid,$booking_number,$customer_data));
        //   }

        // $data['booking_data'] = DB::table('booking_master as bm')->select('bm.id','bm.package_id','bm.customer_id','bm.package_type','bm.adult_count','child_count','infant_count','adult_count','con.country_name','st.state_name','cit.city_name','total_package_value','tax_percentage','tax_amount','total_amount','adult_price_person','child_price_person','infant_price','total_accommodation','total_activities','discount_amount','transport_additional_charges','from_country_id','from_state_id','from_city_id','from_date','to_date','grand_total')
        //                     ->leftjoin('country as con','con.id','=','bm.to_country_id')
        //                     ->leftjoin('state as st','st.id','=','bm.to_state_id')
        //                     ->leftjoin('city as cit','cit.id','=','bm.to_city_id')
        //                     ->where('bm.id','=',$bookingid)->get(); 

        //  $data['booking_package'] = DB::table('booking_master as bm')
        //                          ->leftjoin('package_master as pm','pm.id','=','bm.package_id')
        //                           ->where('bm.id','=',$bookingid)->get();

        // $data['booking_customer'] = DB::table('booking_master as bm')
        //                         ->leftjoin('customer_details as cd','cd.id','=','bm.customer_id')
        //                         ->where('bm.id','=',$bookingid)->get();         
        //  $data['booking_place'] = DB::table('booking_place as bp')
        //                              ->leftjoin('booking_master as bm','bm.id','=','bp.booking_id')
        //                              ->where('bm.id','=',$bookingid)->get();
        //  $data['website_data'] = Website::where('status','=','1')->get();
        
        //  if($data!='')
        //  {
        //    //return view('admin.booking.pdf.booking_pdf')->with($data);
        //     $pdf = PDF::loadView('admin.booking.pdf.booking_pdf', $data);
        //    // return  $pdf->stream();
        //    $pdf->save(storage_path('app/pdf/'.$booking_number.'_booking_invoice.pdf'));
        //  }
         
        //   if($result == true)
        //   {
        //     return json_encode($result);
        //   }
    }
}
