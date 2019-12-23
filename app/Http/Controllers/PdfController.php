<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;
use Illuminate\Support\Facades\Crypt;
use App\Model\Website;

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
         // return view('package.pdf.packagepdf')->with($data);
           $pdf = PDF::loadView('package.pdf.packagepdf', $data);
           return  $pdf->stream();
         //  return $pdf->download('package_details.pdf');
        }
    }
}
