<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use PDF;
use DB;
use Illuminate\Support\Facades\Crypt;
use App\Model\Admin\Website;

class PdfController extends Controller
{
    public function packageView($encid)
    {
        $packageid = crypt::decrypt($encid);
        $data['package_data'] = DB::table('package_master as pm')->select('pm.id as packageautoid','pm.package_name','pm.from_country_id','pm.from_state_id','pm.from_city_id','pm.adult_count','pm.child_count','pm.infant_count','pm.transport_charges','pm.additional_charges','total_package_value','pm.total_accommodation','pm.total_activities','pm.total_amount','con.country_name','st.state_name','cit.city_name','adult_price_person','child_price_person','infant_price' ,'pm.tax_percentage','pm.tax_amount','pm.package_type','pm.to_city_id')
                            ->leftjoin('country as con','con.id','=','pm.to_country_id')
                            ->leftjoin('state as st','st.id','=','pm.to_state_id')
                            ->leftjoin('city as cit','cit.id','=','pm.to_city_id')
                            ->where('pm.id','=',$packageid)->get();                        
         $data['package_activities'] = DB::table('package_activities as pa')
                                 ->leftjoin('package_master as pm','pm.id','=','pa.package_id')
                                 ->where('pm.id','=',$packageid)->get();
        $data['package_hotel'] = DB::table('package_hotel as ph')
                                    ->leftjoin('package_master as pm','pm.id','=','ph.package_id')
                                    ->where('pm.id','=',$packageid)->get();       
        $data['package_place'] = DB::table('package_place as pp')
                                    ->leftjoin('package_master as pm','pm.id','=','pp.package_id')
                                    ->where('pm.id','=',$packageid)->get();
       
        $data['website_data'] = Website::where('status','=','1')->get();
        
        //dd($data);
        if($data!='')
        {
            //return view('admin.package.pdf.packagepdf')->with($data);
            $pdf = PDF::loadView('admin.package.pdf.packagepdf', $data);
            //$pdf->save(storage_path('app/pdf/'.$packageid.'_package_details.pdf'));
            return $pdf->download($packageid.'_package_details.pdf');
        }
    }
    public function BookingView($encid)
    {
        $bookingid = crypt::decrypt($encid);
        $data['booking_data'] = DB::table('booking_master as bm')->select('bm.id','bm.package_id','bm.customer_id','bm.package_type','bm.adult_count','child_count','infant_count','adult_count','con.country_name','st.state_name','cit.city_name','total_package_value','tax_percentage','tax_amount','total_amount','adult_price_person','child_price_person','infant_price','total_accommodation','total_activities','discount_amount','transport_additional_charges','from_country_id','from_state_id','from_city_id','from_date','to_date','grand_total')
                            ->leftjoin('country as con','con.id','=','bm.to_country_id')
                            ->leftjoin('state as st','st.id','=','bm.to_state_id')
                            ->leftjoin('city as cit','cit.id','=','bm.to_city_id')
                            ->where('bm.id','=',$bookingid)->get(); 

         $data['booking_package'] = DB::table('booking_master as bm')
                                 ->leftjoin('package_master as pm','pm.id','=','bm.package_id')
                                  ->where('bm.id','=',$bookingid)->get();

        $data['booking_customer'] = DB::table('booking_master as bm')
                                ->leftjoin('customer_details as cd','cd.id','=','bm.customer_id')
                                ->where('bm.id','=',$bookingid)->get();         
         $data['booking_place'] = DB::table('booking_place as bp')
                                     ->leftjoin('booking_master as bm','bm.id','=','bp.booking_id')
                                     ->where('bm.id','=',$bookingid)->get();
        // dd($data['booking_place']);
         $data['website_data'] = Website::where('status','=','1')->get();
        
         if($data!='')
         {
         //  return view('booking.pdf.booking_pdf')->with($data);
            $pdf = PDF::loadView('admin.booking.pdf.booking_pdf', $data);
           // return  $pdf->stream();
            return $pdf->download('booking_details.pdf');
         }
    }
}
