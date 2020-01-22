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
use App\Model\Admin\Website;

use App\Model\Admin\Hotel;
use DB;
use Session;
use PDF;
use Illuminate\Support\Facades\Crypt;
use App\Helpers\CommonHelper;
use Auth;

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
            ))->where('status','=',1)->where('user_package','!=',1)->limit(50)->get();
        $data['packages'] = $packages;
     	return view('web.all_packages',compact('data',$data));
    }

    public function AddPackage(Request $request){
        // $to_email =  Auth::user()->email;
        // $user_data = Auth::user();
        // $cc_email = 'shyni.bizsoft@gmail.com';
    
      
        // $SavePackage = Package::find(23);
        // $packplace = PackagePlace::where('package_id','=',23)->get();
        // \Mail::to($to_email)
        
        // ->send(new \App\Mail\WebPackageQuotation($SavePackage,$packplace,$user_data));

        if(Auth::check()){
            $data['country_view'] = Country::where('status','=','1')->get();
            $data['state_view'] = State::where('status','=','1')->get();
            $data['city_view'] = State::where('status','=','1')->get();
            $data['tax_data'] = DB::table('settings_tax')->where('status','=','1')->first();
            $data['package_type'] = DB::table('package_type')->where('status','=','1')->get();

            return view('web.package_new',compact('data',$data));
        }else{
            return redirect(route('login'));
        }
    }

     public function packageSave(Request $request)
    {
        //return $request->all();
        $request->validate([
            'package_name' => 'required',
            'to_city_id' => 'required',
            'to_country_id' => 'required',
            'to_state_id' => 'required',
            'from_city_id' => 'required',
            'from_country_id' => 'required',
            'from_state_id' => 'required',
            'total_package_value' => 'required',
                ], [
            'package_name.required' => 'please select package name',
            'to_city_id.required' => 'please select city',
            'to_country_id.required' => 'please select country',
            'to_state_id.required' => 'please select state',
            'from_city_id.required' => 'please select city',
            'from_country_id.required' => 'please select country',
            'from_state_id.required' => 'please select state',
            'total_package_value.required' => 'please enter package value',
        ]);
         $SavePackage = new Package();
         $SavePackage->package_name = ucfirst($request->package_name);
         $SavePackage->adult_count = $request->adult_count;
         $SavePackage->child_count = $request->child_count;
         $SavePackage->infant_count = $request->infant_count;
         $SavePackage->to_city_id = $request->to_city_id;
         $SavePackage->to_country_id = $request->to_country_id;
         $SavePackage->to_state_id = $request->to_state_id;
         $SavePackage->from_city_id = $request->from_city_id;
         $SavePackage->from_country_id = $request->from_country_id;
         $SavePackage->from_state_id = $request->from_state_id;
         $SavePackage->total_accommodation = $request->total_accommodation;
         $SavePackage->total_activities = $request->total_activities;
         $SavePackage->additional_charges = $request->additional_charges;
         $SavePackage->transport_charges = $request->transport_charges;
         $SavePackage->total_package_value = $request->total_package_value;
         $SavePackage->tax_percentage = $request->gst_per;
         $SavePackage->tax_amount = $request->gst_amount;
         $SavePackage->total_amount = $request->total_amount;
         $SavePackage->adult_price_person = 0;
         $SavePackage->package_type = $request->package_type;
         $SavePackage->status = 0;
         $SavePackage->child_price_person = $request->child_price==null ? 0 : $request->child_price;
         $SavePackage->infant_price = $request->infant_price==null ? 0 : $request->infant_price;
         $SavePackage->user_package = 1;
         $SavePackage->user_id = Auth::user()->id;
         $SavePackage->reference_number = CommonHelper::newReferenceNumber();

                

         $SavePackage->save();
         $package_id = $SavePackage->id; 

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
                
                    
                    $package_place = new PackagePlace() ;
                    $package_place->package_id = $package_id;
                    $package_place->state_id = $state_id;
                    $package_place->city_id = $city_id;
                    $package_place->nights_count = $nights_count;
                    $package_place->save();

                    $hotel_id = $request->input('second_hotel_'.$city_id);
                   
                    if(isset($hotel_id)){
                        $package_hotel = new PackageHotel() ;
                        $package_hotel->package_id = $package_id;
                        $package_hotel->city_id = $city_id;
                        $package_hotel->hotel_id = $hotel_id[0];
                        $hotel_nos = $request->input('hotel_number_count_'.$city_id);
                        $hotel_room_type = $request->input('hotel_room_type_'.$city_id);
                        if(isset($hotel_room_type)){
                            $package_hotel->roomtype_id = $hotel_room_type[0];
                        }
                        if(isset($hotel_nos)){
                            $package_hotel->total_rooms = $hotel_nos[0];
                        }
                        $hotel_cost = $request->input('hotel_cost_'.$city_id);
                        if(isset($hotel_cost)){
                            $package_hotel->total_amount = $hotel_cost[0];
                        }
                        
                        $package_hotel->save();
                    }
                    
                   

                    $activity_ids = $request->input('second_activity_'.$city_id);
                    if( isset($activity_ids)){
                        $activity_count = count($activity_ids);
                        for($j =0; $j<$activity_count; $j++){
                            $activity_id = $request->input('second_activity_'.$city_id)[$j];
                            $package_activities = new PackageActivities() ;
                            $package_activities->package_id = $package_id;
                            $package_activities->city_id = $city_id;
                            $package_activities->activity_id = $activity_id;
                            $activity_cost = $request->input('activity_cost_'.$city_id);
                            if(isset($activity_cost)){
                                $package_activities->total_amount = $activity_cost[$j];
                            }
                            $package_activities->save();
                        }
                    }
                   // dd($hotel_id);
                    
                }
            }
        
        

        $to_email =  Auth::user()->email;
        $user_data = Auth::user();
        $cc_email = 'shyni.bizsoft@gmail.com';
        $packplace = PackagePlace::where('package_id','=',$SavePackage->id)->get();

        
        $data['package_data'] = DB::table('package_master as pm')->select('pm.id as packageautoid','pm.package_name','pm.from_country_id','pm.from_state_id','pm.from_city_id','pm.adult_count','pm.child_count','pm.infant_count','pm.transport_charges','pm.additional_charges','total_package_value','pm.total_accommodation','pm.total_activities','pm.total_amount','con.country_name','st.state_name','cit.city_name','adult_price_person','child_price_person','infant_price' ,'pm.tax_percentage','pm.tax_amount','pm.package_type','pm.to_city_id')
                            ->leftjoin('country as con','con.id','=','pm.to_country_id')
                            ->leftjoin('state as st','st.id','=','pm.to_state_id')
                            ->leftjoin('city as cit','cit.id','=','pm.to_city_id')
                            ->where('pm.id','=',$SavePackage->id)->get();                        
         $data['package_activities'] = DB::table('package_activities as pa')
                                 ->leftjoin('package_master as pm','pm.id','=','pa.package_id')
                                 ->where('pm.id','=',$SavePackage->id)->get();
        $data['package_hotel'] = DB::table('package_hotel as ph')
                                    ->leftjoin('package_master as pm','pm.id','=','ph.package_id')
                                    ->where('pm.id','=',$SavePackage->id)->get();       
        $data['package_place'] = DB::table('package_place as pp')
                                    ->leftjoin('package_master as pm','pm.id','=','pp.package_id')
                                    ->where('pm.id','=',$SavePackage->id)->get();
       
        $data['website_data'] = Website::where('status','=','1')->get();
        
        
        $data['customized_data'] = 'yes';
        //dd($data);
        if($data!='')
        {
           // return view('admin.package.pdf.packagepdf')->with('data',$data); 
             $pdf = PDF::loadView('admin.package.pdf.packagepdf', $data);       
             $pdf->save(storage_path('app/pdf/'.$SavePackage->id.'_customized_package_details.pdf'));
        }

        $websiteEmail = Website::where('status','=','1')->pluck('company_email')->first();
        $website_data = Website::where('status','=','1')->first();

        \Mail::to($to_email)
         ->cc($cc_email)
        ->send(new \App\Mail\WebPackageQuotation($SavePackage,$packplace,$user_data));

        $admin_to_mail = $websiteEmail;
        $admin_cc_email =  'shyni.bizsoft@gmail.com';

        if($admin_to_mail && $admin_cc_email)
        {
            \Mail::to($admin_to_mail)
          //  ->cc($admin_cc_email)
            ->send(new \App\Mail\WebPackageAdminQuotation($SavePackage,$packplace,$user_data));
        }
        return redirect('home')->with('message','Package Added Successfully!!');
        return json_encode($package);
    }

    public function HotelsList(Request $request){
        $city_id = $request->input('city_id');
        //dd(Hotel::find(15)->hotelimages()->get());
        $hotels = Hotel::with(
            array(
                'amenities'=>function($query){
                    $query->select('amenities_name');
                },
                'roomtypes'=>function($query){
                    $query->select('room_type');
                },
                'hotelimages'
            ))->where('city_id','=',$city_id)->get();
        //$hotels = Hotel::where('city_id','=',$city_id)->get();
       // $products = $hotels->amenities;
        //dd($products);
        $data['hotel_data'] = $hotels;
       // $data['hotel_features'] = $hotels;
        return json_encode($hotels);
    }

    public function HotelDetails(Request $request){
        $hotel_id = $request->input('hotel_id');
        //dd(Hotel::find(15)->hotelimages()->get());
        $hotels = Hotel::with(
            array(
                'amenities'=>function($query){
                    $query->select('amenities_name');
                },
                'roomtypes',
                'hotelimages'
            ))->where('id','=',$hotel_id)->first();
            
        $hotel_roomtypes = DB::table('hotel_roomtypes')->where('hotel_id','=',$hotel_id)->pluck('roomtype_id');

        //$hotel_rooms = DB::table('hotel_rooms')->where('hotel_id','=',$hotel_id)->whereIn('roomtype_id',$hotel_roomtypes)->get();
       // dd($hotel_rooms);
        //$hotels = Hotel::where('city_id','=',$city_id)->get();
       // $products = $hotels->amenities;
        //dd($products);
        $data['hotel_data'] = $hotels;
       // $data['hotel_features'] = $hotels;
        return json_encode($hotels);
    }

    public function ActivitiesList(Request $request){
        $city_id = $request->input('city_id');
        //dd(Hotel::find(15)->hotelimages()->get());
        $activities = Activity::with(
            array(
                // 'amenities'=>function($query){
                //     $query->select('amenities_name');
                // },
                // 'roomtypes'=>function($query){
                //     $query->select('room_type');
                // },
                'activity_images'
            ))->where('city_id','=',$city_id)->get();
        //$hotels = Hotel::where('city_id','=',$city_id)->get();
       // $products = $hotels->amenities;
        //dd($products);
        $data['activity_data'] = $activities;
       // $data['hotel_features'] = $hotels;
        return json_encode($activities);
    }

    public function ActivityDetails(Request $request){
        $activity_id = $request->input('activity_id');
        //dd(Hotel::find(15)->hotelimages()->get());
        $activities = Activity::with(
            array(
                // 'amenities'=>function($query){
                //     $query->select('amenities_name');
                // },
                // 'roomtypes',
                'activity_images'
            ))->where('id','=',$activity_id)->first();
        //$hotels = Hotel::where('city_id','=',$city_id)->get();
       // $products = $hotels->amenities;
        //dd($products);
        $data['activity_data'] = $activities;
       // $data['hotel_features'] = $hotels;
        return json_encode($activities);
    }
    public function packagePlaceDetails(Request $request)
    {
        $data = array();
        $package_id = $request->package_id;
        $data['country_view'] = Country::where('status','=','1')->get();
        $data['package_info'] = Package::where('id','=',$package_id)->first();
        $data['package_type'] = DB::table('package_type')->where('status','=','1')->get();
        $data['package_place'] = PackagePlace::where('package_id','=',$package_id)->get();

        $data['place_details'] = DB::table('package_place as pp')->select('s.id as stateid','s.state_name','c.id as cityid','c.city_name','pp.id as pacakgeplaeid','pp.package_id','pp.nights_count','c.city_image')
                ->leftjoin('state as s','s.id','=','pp.state_id')
                ->leftjoin('city as c','c.id','=','pp.city_id')
                ->where('pp.package_id','=',$package_id)->get();
        $data['package_id'] = Crypt::encrypt($package_id);
        return json_encode($data);
    }
    public function createdItineray()
    {
        // $authid = Auth::user()->id ;
        // $data[] = Package::where('user_id','=',$userid)->where('user_package','=',1)
        //             ->select('id as packageid','package_name','adult_count','child_count','infant_count','to_city_id','total_amount','reference_number')->get();
        
        // $data['package_place'] = DB::table('package_place as pp')
        // ->leftjoin('package_master as pm','pm.id','=','pp.package_id')
        // ->where('pm.id','=',$packageid)->get();
        return view('web.package.created_itineries');
    }
    public function packageSearch(Request $request)
    {
       $data = $request->all();
       $data['from_city_id'] = $request->from_city_id;
       $data['from_state_id']= $request->from_state_id;
       $data['from_country_id']= $request->from_country_id;
       $data['to_city_id']= $request->to_city_id;
       $data['to_state_id']= $request->to_state_id;
       $data['to_country_id']= $request->to_country_id;
       $data['type']= $request->type;
       $data['adult_count']= $request->adult_count;
       if($data['type']!='' && $data['type']!=null && $data['type']!=0)
       {
            $packages = Package::with(
            array(
                // 'amenities'=>function($query){
                //     $query->select('amenities_name');
                // },
                'places'
            ))->where('status','=',1)
             ->where('user_package','!=',1)
            ->where('from_city_id','=',$data['from_city_id'])
            ->where('from_state_id','=',$data['from_state_id'])
            ->where('from_country_id','=',$data['from_country_id'])
            ->where('to_city_id','=',$data['to_city_id'])
            ->where('to_state_id','=',$data['to_state_id'])
            ->where('to_country_id','=',$data['to_country_id'])
            ->where('package_type','=',$data['type'])
            //->orwhere('adult_count','=',$data['adult_count'])
            ->limit(20)
            ->get();
       }
       else{
            $packages = Package::with(
            array(
                // 'amenities'=>function($query){
                //     $query->select('amenities_name');
                // },
                'places'
            ))->where('status','=',1)
             ->where('user_package','!=',1)
            ->where('from_city_id','=',$data['from_city_id'])
            ->where('from_state_id','=',$data['from_state_id'])
            ->where('from_country_id','=',$data['from_country_id'])
            ->where('to_city_id','=',$data['to_city_id'])
            ->where('to_state_id','=',$data['to_state_id'])
            ->where('to_country_id','=',$data['to_country_id'])
           // ->where('package_type','=',$data['type'])
            //->orwhere('adult_count','=',$data['adult_count'])
            ->limit(20)
            ->get();
       }
      
        $data['packages'] = $packages;
        $data['fr_country_name'] = CommonHelper::getCountryName($data['from_country_id']);
        $data['fr_state_name'] = CommonHelper::getstateName($data['from_state_id']);
        $data['fr_city_name'] = CommonHelper::getcityName($data['from_city_id']);
        if($data['fr_country_name']!='')
        {
            $data['fr_details'] = $data['fr_country_name'].'-'.$data['fr_state_name'].'-'.$data['fr_city_name'];
        }
        else{
            $data['fr_details'] ='';
        }
        $data['tocountry_name'] = CommonHelper::getCountryName($data['to_country_id']);
        $data['tostate_name'] = CommonHelper::getstateName($data['to_state_id']);
        $data['tocity_name'] = CommonHelper::getcityName($data['to_city_id']);
        if($data['tocountry_name']!='')
        {
            $data['todetails'] = $data['tocountry_name'].'-'.$data['tostate_name'].'-'.$data['tocity_name'];
        }
        else{
            $data['todetails'] =''; 
        }                                 
        $data['pacakge_type'] = DB::table('package_type')->where('status','=','1')->get();
     	return view('web.welcome')->with('data',$data);
    }
    public function sightSeeing()
    {
        return view('web.sight_seeing');
    }
}
