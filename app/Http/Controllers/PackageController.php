<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
use DB;
use Session;
use Illuminate\Support\Facades\Crypt;

class PackageController extends Controller
{
   	public function __construct()
	{
	    $this->middleware('auth');
	}

    public function index()
    {
        $data['country_view'] = Country::where('status','=','1')->get();
        $data['state_view'] = State::where('status','=','1')->get();
        $data['city_view'] = State::where('status','=','1')->get();
        $data['tax_data'] = DB::table('settings_tax')->where('status','=','1')->first();
        return view('package.new',compact('data',$data));
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
            'adult_price' => 'required',
                ], [
            'package_name.required' => 'please select package name',
            'to_city_id.required' => 'please select city',
            'to_country_id.required' => 'please select country',
            'to_state_id.required' => 'please select state',
            'from_city_id.required' => 'please select city',
            'from_country_id.required' => 'please select country',
            'from_state_id.required' => 'please select state',
            'total_package_value.required' => 'please enter package value',
            'adult_price.required' => 'please enter adult cost',
        ]);
         $SavePackage = new Package();
         $SavePackage->package_name = $request->package_name;
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
         $SavePackage->total_package_value = $request->total_package_value;
         $SavePackage->tax_percentage = $request->gst_per;
         $SavePackage->tax_amount = $request->gst_amount;
         $SavePackage->total_amount = $request->total_amount;
         $SavePackage->adult_price_person = $request->adult_price;
         $SavePackage->child_price_person = $request->child_price==null ? 0 : $request->child_price;
         $SavePackage->infant_price = $request->infant_price==null ? 0 : $request->infant_price;

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
                                $package_activities->total_amount = $activity_cost[0];
                            }
                            $package_activities->save();
                        }
                    }
                   // dd($hotel_id);
                    
				}
            }
        return redirect('/packages')->with('message','Package Added Successfully!!');
        //return json_encode($package);
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
        $data['place_details'] = DB::table('package_place as pp')->select('s.id as stateid','s.state_name','c.id as cityid','c.city_name','pp.id as pacakgeplaeid','pp.package_id')
                ->leftjoin('state as s','s.id','=','pp.state_id')
                ->leftjoin('city as c','c.id','=','pp.city_id')
                ->where('pp.package_id','=',$package_id)->where('pp.status','=','1')->get();
        $data['package_id'] = Crypt::encrypt($package_id);
        return json_encode($data);
    }

    public function List(){
        $data = [];
        return view('package.list')->with('data',$data);
    }

    public function ajax_package_list(Request $request)
    {
        $columns = array( 
            0 => 'package_name', 
            1 => 'adult_count', 
            2 => 'total_package_value',
            3 => 'to_state_id',
            4 => 'to_city_id',
            5 => 'id'
        );
        $totalData = DB::table('package_master as p')->select('p.id','p.package_name','p.adult_count','p.total_package_value','p.status','cit.city_name','st.state_name')
                    ->leftjoin('city as cit','cit.id','=','p.to_city_id')
                    ->leftjoin('state as st','st.id','=','p.to_state_id')
                    ->count();

        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {            
            if( $limit == -1){ 
                $packages = DB::table('package_master as p')->select('p.id','p.package_name','p.adult_count','p.total_package_value','p.status','cit.city_name','st.state_name')
                ->leftjoin('city as cit','cit.id','=','p.to_city_id')
                    ->leftjoin('state as st','st.id','=','p.to_state_id')
                ->orderBy($order,$dir)
                ->where('p.status','=','1')
                ->get()->toArray();
            }else{
                $packages =  DB::table('package_master as p')->select('p.id','p.package_name','p.adult_count','p.total_package_value','p.status','cit.city_name','st.state_name')
                ->leftjoin('city as cit','cit.id','=','p.to_city_id')
                ->leftjoin('state as st','st.id','=','p.to_state_id')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->where('p.status','=','1')
                ->get()->toArray();
            }
            //$Activity->dump();
        }
        else {
        $search = $request->input('search.value'); 
        if( $limit == -1){
            $packages = DB::table('package_master as p')->select('p.id','p.package_name','p.adult_count','p.total_package_value','p.status','cit.city_name','st.state_name')
                        ->leftjoin('city as cit','cit.id','=','p.to_city_id')
                        ->leftjoin('state as st','st.id','=','p.to_state_id')
                        ->where('p.status','=','1')
                         ->where(function($query) use ($search){
                        $query->orWhere('title_name', 'LIKE',"%{$search}%")
                        ->orWhere('duartion_hours', 'LIKE',"%{$search}%")
                        ->orWhere('amount', 'LIKE',"%{$search}%")
                        ->orWhere('city_name', 'LIKE',"%{$search}%")
                        ->orWhere('state_name', 'LIKE',"%{$search}%")
                        ->orWhere('zip_code', 'LIKE',"%{$search}%");
                    })
                    ->orderBy($order,$dir)
                    ->get()->toArray();
        }else{
            $packages = DB::table('package_master as p')->select('p.id','p.package_name','p.adult_count','p.total_package_value','p.status','cit.city_name','st.state_name')
                        ->leftjoin('city as cit','cit.id','=','p.to_city_id')
                        ->leftjoin('state as st','st.id','=','p.to_state_id')
                        ->where('p.status','=','1')
                        ->where(function($query) use ($search){
                            $query->orWhere('title_name', 'LIKE',"%{$search}%")
                            ->orWhere('duartion_hours', 'LIKE',"%{$search}%")
                            ->orWhere('amount', 'LIKE',"%{$search}%")
                            ->orWhere('city_name', 'LIKE',"%{$search}%")
                            ->orWhere('state_name', 'LIKE',"%{$search}%")
                             ->orWhere('zip_code', 'LIKE',"%{$search}%");
                        })
                        ->offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->get()->toArray();
        }
        $totalFiltered =DB::table('package_master as p')->select('p.id','p.package_name','p.adult_count','p.total_package_value','p.status','cit.city_name','st.state_name')
                    ->leftjoin('city as cit','cit.id','=','p.to_city_id')
                    ->leftjoin('state as st','st.id','=','p.to_state_id')
                        ->where('p.id','LIKE',"%{$search}%")
                    ->orWhere('title_name', 'LIKE',"%{$search}%")
                    ->where('p.status','=','1')
                    ->orWhere('city_name', 'LIKE',"%{$search}%")
                    ->orWhere('state_name', 'LIKE',"%{$search}%")
                    ->orWhere('zip_code', 'LIKE',"%{$search}%")
                    ->count();
        }
        
       // $table ="activities";
       //$data = $this->CommonAjaxReturn($Activity, 2, '', 1,$table,'activity.editactivity'); 
    //   dd($Activity);
       $data = array();
       if(!empty($packages))
       {
           foreach ($packages as $package)
           {
              
                  
                   $nestedData['id'] = $package->id;
                   $nestedData['title_name'] = $package->package_name;
              
                   $nestedData['adult_count'] = $package->adult_count;
                   $nestedData['amount'] = $package->total_package_value;  
                   $nestedData['city_name'] = $package->city_name;
                   $nestedData['state_name'] = $package->state_name;
                   $enc_id = Crypt::encrypt($package->id);
                   $edit = route('package.edit',$enc_id);
                   
                   $actions ="<a class='btn btn-sm blue waves-effect waves-circle waves-light' href='$edit'><i class='mdi mdi-lead-pencil'></i></a>";
                   $nestedData['options'] = $actions;
                 
                   $data[] = $nestedData;
               
               
           }
       }
   //dd($totalFiltered);
      
       $json_data = array(
           "draw"            => intval($request->input('draw')),  
           "recordsTotal"    => intval($totalData),  
           "recordsFiltered" => intval($totalFiltered), 
           "data"            => $data   
           );
       echo json_encode($json_data); 
    }

    public function EditPackage($encid){
        $packageid = crypt::decrypt($encid);
        $data['country_view'] = Country::where('status','=','1')->get();
        $data['package_info'] = Package::where('id','=',$packageid)->first();
        $data['package_place'] = PackagePlace::where('package_id','=',$packageid)->get();
        //$data['package_hotel'] = PackageHotel::where('package_id','=',$packageid)->get();
        //$data['package_activities'] = PackageActivities::where('package_id','=',$packageid)->get();
        return view('package.edit',compact('data',$data));
    }

    public function DeleteActivity(Request $request){
        $activity_id = $request->input('activity_id');
        $city_id = $request->input('city_id');
        $package_id = $request->input('package_id');
        return DB::table('package_activities')->where('package_id','=',$package_id)->where('activity_id','=',$activity_id)->delete();
    }

    public function packageUpdate(){
        $data = [];
        return view('package.list')->with('data',$data);
    }
    // public function EditPackag(Request $req){
    //     $packageid = crypt::decrypt($req->id);
    //      $data['country_view'] = Country::where('status','=','1')->get();
    //      $data['package_info'] = Package::where('id','=',$packageid)->first();
    //      $data['package_place'] = PackagePlace::where('package_id','=',$packageid)->get();
    //      //$data['package_hotel'] = PackageHotel::where('package_id','=',$packageid)->get();
    //      //$data['package_activities'] = PackageActivities::where('package_id','=',$packageid)->get();
    //      return view('package.edit',compact('data',$data));
    // }
}
