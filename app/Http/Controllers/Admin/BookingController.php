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
use App\Model\Admin\Package;
use App\Model\Admin\Activity;
use Session;
use Illuminate\Support\Facades\Crypt;
use App\Model\Admin\CustomerDetails;

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

         $SaveBooking->save();
         $booking_id = $SaveBooking->id; 

          $check_picked_state = $request->input('picked_state');
			if( isset($check_picked_state)){
				$state_count = count($request->input('picked_state'));
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

                    $hotel_id = $request->input('second_hotel_'.$city_id);
                   
                    if(isset($hotel_id)){
                        $booking_hotel = new BookingHotel() ;
                        $booking_hotel->booking_id = $booking_id;
                        $booking_hotel->city_id = $city_id;
                        $booking_hotel->hotel_id = $hotel_id[0];
                        $hotel_nos = $request->input('hotel_number_count_'.$city_id);
                        $hotel_room_type = $request->input('hotel_room_type_'.$city_id);
                        if(isset($hotel_room_type)){
                            $booking_hotel->roomtype_id = $hotel_room_type[0];
                        }
                        if(isset($hotel_nos)){
                            $booking_hotel->total_rooms = $hotel_nos[0];
                        }
                        $hotel_cost = $request->input('hotel_cost_'.$city_id);
                        if(isset($hotel_cost)){
                            $booking_hotel->total_amount = $hotel_cost[0];
                        }
                        
                        $booking_hotel->save();
                    }
                    
                   

                    $activity_ids = $request->input('second_activity_'.$city_id);
                    if( isset($activity_ids)){
                        $activity_count = count($activity_ids);
                        for($j =0; $j<$activity_count; $j++){
                            $activity_id = $request->input('second_activity_'.$city_id)[$j];
                            $booking_activities = new BookingActivities() ;
                            $booking_activities->booking_id = $booking_id;
                            $booking_activities->city_id = $city_id;
                            $booking_activities->activity_id = $activity_id;
                            $activity_cost = $request->input('activity_cost_'.$city_id);
                            if(isset($activity_cost)){
                                $booking_activities->total_amount = $activity_cost[$j];
                            }
                            $booking_activities->save();
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
         $SaveBooking->to_date = $request->to_date;
         $SaveBooking->grand_total = $request->grand_total_amount;
 
          $SaveBooking->save();
          $booking_id = $SaveBooking->id; 
 
           $check_picked_state = $request->input('picked_state');
             if( isset($check_picked_state)){
 
                 DB::table('booking_hotel')->where('booking_id','=',$booking_id)->delete();
                 DB::table('booking_place')->where('booking_id','=',$booking_id)->delete();
                 DB::table('booking_activities')->where('booking_id','=',$booking_id)->delete();
 
                 $state_count = count($request->input('picked_state'));
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
 
                     $hotel_id = $request->input('second_hotel_'.$city_id);
                    
                     if(isset($hotel_id)){
                         $booking_hotel = new BookingHotel() ;
                         $booking_hotel->booking_id = $booking_id;
                         $booking_hotel->city_id = $city_id;
                         $booking_hotel->hotel_id = $hotel_id[0];
                         $hotel_nos = $request->input('hotel_number_count_'.$city_id);
                         $hotel_room_type = $request->input('hotel_room_type_'.$city_id);
                         if(isset($hotel_room_type)){
                             $booking_hotel->roomtype_id = $hotel_room_type[0];
                         }
                         if(isset($hotel_nos)){
                             $booking_hotel->total_rooms = $hotel_nos[0];
                         }
                         $hotel_cost = $request->input('hotel_cost_'.$city_id);
                         if(isset($hotel_cost)){
                             $booking_hotel->total_amount = $hotel_cost[0];
                         }
                         
                         $booking_hotel->save();
                     }
                     $activity_ids = $request->input('second_activity_'.$city_id);
                     if( isset($activity_ids)){
                         $activity_count = count($activity_ids);
                         for($j =0; $j<$activity_count; $j++){
                             $activity_id = $request->input('second_activity_'.$city_id)[$j];
                             $booking_activities = new BookingActivities() ;
                             $booking_activities->booking_id = $booking_id;
                             $booking_activities->city_id = $city_id;
                             $booking_activities->activity_id = $activity_id;
                             $activity_cost = $request->input('activity_cost_'.$city_id);
                             if(isset($activity_cost)){
                                 $booking_activities->total_amount = $activity_cost[$j];
                             }
                             $booking_activities->save();
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

}
