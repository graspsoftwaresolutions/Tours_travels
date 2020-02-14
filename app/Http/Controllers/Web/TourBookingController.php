<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Model\Admin\Country;
use App\Model\Admin\State;
use App\Model\Admin\City;
use App\Model\Admin\Package;
use App\Model\Admin\PackagePlace;
use App\Model\Admin\PackageHotel;
use App\Model\Admin\Booking;
use App\Model\Admin\BookingPlace;
use App\Model\Admin\BookingHotel;
use App\Model\Admin\BookingActivities;
use App\Model\Admin\BookigTransports;
use App\Helpers\CommonHelper;

use DB;
use Illuminate\Support\Facades\Crypt;
use Auth;
use PDF;

class TourBookingController extends Controller
{
    public function tourBooking()
    {
        //return $data = $request->all();
        return view('web.tour.tour_booking');
    }
    public function bookingSave(Request $request){
        
        $package_id = $request->package_id;
        $form_date = $request->form_date;
        $to_date = $request->to_date;

        $date_array = explode("/",$form_date);           							
        $date_format = $date_array[2]."-".$date_array[0]."-".$date_array[1];
        $from_date = $date_format;

        $date_array1 = explode("/",$to_date);           							
        $date_format1 = $date_array1[2]."-".$date_array1[0]."-".$date_array1[1];
        $to_date = $date_format1;
        
        $packageid = Crypt::encrypt($package_id);
        $fromdate = Crypt::encrypt($from_date);
        $todate = Crypt::encrypt($to_date);
        return  redirect()->route('book_now',[$packageid,$fromdate,$todate]);
    }
    public function booking_now($id,$fromdate,$todate)
    {
        $packageid = crypt::decrypt($id);
        $form_date = crypt::decrypt($fromdate);
        $data['form_date'] = $form_date;

        $to_date = crypt::decrypt($todate);
        $data['to_date'] = $to_date;

        $data['country_view'] = Country::where('status','=','1')->get();
        $data['package_info'] = Package::where('id','=',$packageid)->first();
        $data['package_type'] = DB::table('package_type')->where('status','=','1')->get();
        $data['package_place'] = PackagePlace::where('package_id','=',$packageid)->get();
        return view('web.tour.tour_booking')->with('data',$data);
    }
    public function bookingConfirm(Request $request)
    {
        $data = $request->all();
        $packageid = $request->packageid;
        $form_date = $request->form_date;
        $to_date = $request->to_date;
        $customerid = Auth::user()->customer_id;

        $booking_data_count = Db::table('booking_master')->where('from_date','=',$form_date)->where('to_date','=',$to_date)->where('customer_id','=',$customerid)->where('package_id','=',$packageid)->where('user_booking','=','1')->count();

        if($booking_data_count > 0)
        {
            $packageid = Crypt::encrypt($packageid);
            $fromdate = Crypt::encrypt($form_date);
            $todate = Crypt::encrypt($to_date);
            return  redirect()->route('book_now',[$packageid,$fromdate,$todate])->with('error','Package Already Booked');        
        }
        else{
            $Package_details = DB::table('package_master as p')->where('id','=',$packageid)->first();
        
            $booking = new Booking();
            $booking->package_id = $request->packageid;
            $authid = Auth::user()->id;
            $booking->customer_id = DB::table('users')->where('id','=',$authid)->pluck('customer_id')->first();
            $booking->package_type = $Package_details->package_type;
            $booking->adult_count = $Package_details->adult_count;
            $booking->from_date = $request->form_date;
            $booking->to_date = $request->to_date;
            $booking->child_count = $Package_details->child_count;
            $booking->infant_count = $Package_details->infant_count;
            $booking->from_country_id = $Package_details->from_country_id;
            $booking->from_state_id = $Package_details->from_state_id;
            $booking->from_city_id = $Package_details->from_city_id;
            $booking->to_country_id = $Package_details->to_country_id;
            $booking->to_state_id = $Package_details->to_state_id;
            $booking->to_city_id = $Package_details->to_city_id;
            $booking->total_package_value = $Package_details->total_package_value;
            $booking->tax_percentage = $Package_details->tax_percentage;
            $booking->tax_amount = $Package_details->tax_amount;
            $booking->total_amount = $Package_details->total_amount;
            $booking->adult_price_person = $Package_details->adult_price_person;
            $booking->child_price_person = $Package_details->child_price_person;
            $booking->infant_price = $Package_details->infant_price;
            $booking->total_accommodation = $Package_details->total_accommodation;
            $booking->total_activities = $Package_details->total_activities;
            $booking->additional_charges = $Package_details->additional_charges;
            $booking->discount_amount = 0;
            $transport_additional_charges = $Package_details->transport_charges+$Package_details->additional_charges;
            $booking->transport_additional_charges = $transport_additional_charges;
            $booking->grand_total = $Package_details->total_amount;
            $booking->paid_amount = $Package_details->total_amount;
            $booking->balance_amount = 0;
            $booking->payment_mode = $request->payment_mode;
            $booking->reference_number = $request->reference_number;
            $booking->payment_type = 1;
            $booking->booking_number =  CommonHelper::newbookingNumber();
            $booking->user_booking = 1;
            $booking->status = 0;
            $booking->created_by = Auth::user()->id;
            $booking->save();

            $booking_last_id = $booking->id; 
            
            $data['package_place'] = DB::table('package_place')->where('package_id','=',$packageid)->get();
            for($i=0;$i<count($data['package_place']);$i++)
            {
                $BookingPlace = new BookingPlace();
                $BookingPlace->booking_id = $booking_last_id;
                $BookingPlace->state_id = $data['package_place'][$i]->state_id;
                $BookingPlace->city_id = $data['package_place'][$i]->city_id;
                $BookingPlace->nights_count = $data['package_place'][$i]->nights_count;
                $BookingPlace->status = $data['package_place'][$i]->status;
                $BookingPlace->save();
            }

            $data['package_activities'] = DB::table('package_activities')->where('package_id','=',$packageid)->get();
            for($i=0;$i<count($data['package_activities']);$i++)
            {
                $BookingActivities = new BookingActivities();
                $BookingActivities->booking_id = $booking_last_id;
                $BookingActivities->city_id = $data['package_activities'][$i]->city_id;
                $BookingActivities->activity_id = $data['package_activities'][$i]->activity_id;
                $BookingActivities->total_amount = $data['package_activities'][$i]->total_amount;
                $BookingActivities->day_numbers = $data['package_activities'][$i]->day_numbers;
                $BookingActivities->save();
            }
            $data['package_hotel'] = DB::table('package_hotel')->where('package_id','=',$packageid)->get();

            for($i=0;$i<count($data['package_hotel']);$i++)
            {
                $BookingHotel = new BookingHotel();
                $BookingHotel->booking_id = $booking_last_id;
                $BookingHotel->city_id = $data['package_hotel'][$i]->city_id;
                $BookingHotel->hotel_id = $data['package_hotel'][$i]->hotel_id;
                $BookingHotel->roomtype_id = $data['package_hotel'][$i]->roomtype_id;
                $BookingHotel->total_rooms = $data['package_hotel'][$i]->total_rooms; 
                $BookingHotel->total_amount = $data['package_hotel'][$i]->total_amount;
                $BookingHotel->save();
            }

            $data['package_transports'] = DB::table('package_transports')->where('package_id','=',$packageid)->get();
        
            for($i=0;$i<count($data['package_transports']);$i++)
            {
                $BookigTransports = new BookigTransports();
                $BookigTransports->booking_id = $booking_last_id;
                $BookigTransports->city_id = $data['package_transports'][$i]->city_id;
                $BookigTransports->day_numbers = $data['package_transports'][$i]->day_numbers;
                $BookigTransports->airportpickup_amount = $data['package_transports'][$i]->airportpickup_amount;
                $BookigTransports->driverbeta_amount = $data['package_transports'][$i]->driverbeta_amount; 
                $BookigTransports->tollparking_amount = $data['package_transports'][$i]->tollparking_amount;
                $BookigTransports->interestrate_amount = $data['package_transports'][$i]->interestrate_amount;
                $BookigTransports->save();
            }
            $data['booking_details'] = DB::table('booking_master')->where('id','=',$booking_last_id)->get();
            $user_id = DB::table('booking_master')->where('id','=',$booking_last_id)->pluck('customer_id')->first();
            $customer_data = DB::table('users')->where('customer_id','=',$user_id)->select('name','email')->first();
            if($data['booking_details']!='')
            {
                $booking_number = $data['booking_details'][0]->booking_number;
            // return view('web.tour.pdf.booking_invoicepdf')->with('data',$data);
                $pdf = PDF::loadView('web.tour.pdf.booking_invoicepdf', $data);
                $pdf->save(storage_path('app/pdf/'.$booking_number.'_booking_invoice.pdf'));
            }              
            $to_email =  $customer_data->email;
         // $to_email =  'mounika.bizsoft@gmail.com';
            $cc_email = 'shyni.bizsoft@gmail.com';
            \Mail::to($to_email)->cc($cc_email)->send(new \App\Mail\BookingInvoice($booking_number,$customer_data));

            return redirect()->route('itineray_created')->with('message','Your Booked Trips'); 
        }
    }  
}
