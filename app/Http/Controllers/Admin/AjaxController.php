<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Helpers\CommonHelper;
use App\Model\Admin\Country;
use App\Model\Admin\State;
use App\Model\Admin\City;
use App\Model\Admin\Amenities;
use App\Model\Admin\RoomType;
use App\Model\Admin\Hotel;
use App\Model\Admin\ActivityImages;
use App\Model\Admin\Activity;
use App\Model\Admin\Enquiry;
use App\Model\Admin\CustomerDetails;
use App\Model\Admin\PackageType;
use App\Model\Admin\TransportationCharges;
use App\User;
use DB;
use View;
use Mail;
use URL;
use Response;
use Auth;

class AjaxController extends CommonController
{
    public function __construct() {
        ini_set('memory_limit', '-1');
    }
    //Ajax Datatable Countries List //Users List 
    // public function ajax_countries_list(Request $request){
    //     $get_roles = Auth::user()->roles;
	// 	$user_role = $get_roles[0]->slug;
	// 	$user_id = Auth::user()->id;
    //     $columns = array( 
    //         0 => 'country_name', 
    //         1 => 'id',
    //     );

    //     $totalData = Country::where('status','=','1')
    //                  ->count();

    //     $totalFiltered = $totalData; 

    //     $limit = $request->input('length');
        
    //     $start = $request->input('start');
    //     $order = $columns[$request->input('order.0.column')];
    //     $dir = $request->input('order.0.dir');

    //     if(empty($request->input('search.value')))
    //     {            
    //         if( $limit == -1){
    //             $country = Country::select('id','country_name')->orderBy($order,$dir)
    //             ->where('status','=','1')
    //             ->get()->toArray();
    //         }else{
    //             $country = Country::select('id','country_name')->offset($start)
    //             ->limit($limit)
    //             ->orderBy($order,$dir)
    //             ->where('status','=','1')
    //             ->get()->toArray();
    //         }
        
    //     }
    //     else {
    //     $search = $request->input('search.value'); 
    //     if( $limit == -1){
    //         $country =  Country::select('id','country_name')->where('id','LIKE',"%{$search}%")
    //                     ->orWhere('country_name', 'LIKE',"%{$search}%")
    //                     ->where('status','=','1')
    //                     ->orderBy($order,$dir)
    //                     ->get()->toArray();
    //     }else{
    //         $country =  Country::select('id','country_name')->where('id','LIKE',"%{$search}%")
    //                     ->orWhere('country_name', 'LIKE',"%{$search}%")
    //                     ->offset($start)
    //                     ->limit($limit)
    //                     ->where('status','=','1')
    //                     ->orderBy($order,$dir)
    //                     ->get()->toArray();
    //     }
    //     $totalFiltered = Country::where('id','LIKE',"%{$search}%")
    //                 ->orWhere('country_name', 'LIKE',"%{$search}%")
    //                 ->where('status','=','1')
    //                 ->count();
    //     }

    //     $table = "country";
    //     $data = $this->CommonAjaxReturn($country, 0, 'master.countrydestroy',0,$table); 
       
    //     $json_data = array(
    //         "draw"            => intval($request->input('draw')),  
    //         "recordsTotal"    => intval($totalData),  
    //         "recordsFiltered" => intval($totalFiltered), 
    //         "data"            => $data   
    //         );

    //     echo json_encode($json_data); 
    // }

    public function ajax_state_list(Request $request){
      
        $columns = array( 

            0 => 'country_name', 
            1 => 'state_name', 
            2 => 'id',
        );

        $totalData = State::where('status','=','1')
					->count();

        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {            
            if( $limit == -1){
				
				$state = DB::table('country')->select('state.id','country.country_name','state.state_name','state.country_id','state.status')
                ->join('state','country.id','=','state.country_id')
                ->orderBy($order,$dir)
                ->where('state.status','=','1')
				->get()->toArray();
            }else{
                $state = DB::table('country')->select('state.id','country.country_name','state.state_name','state.country_id','state.status')
                ->join('state','country.id','=','state.country_id')
				->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->where('state.status','=','1')
                ->get()->toArray();
            }
        
        }
        else {
        $search = $request->input('search.value'); 
        if( $limit == -1){
			$state = DB::table('country')->select('state.id','country.country_name','state.state_name','state.country_id','state.status')
					->join('state','country.id','=','state.country_id')
					->where('state.id','LIKE',"%{$search}%")
                    ->orWhere('country.country_name', 'LIKE',"%{$search}%")
                    ->orWhere('state.state_name', 'LIKE',"%{$search}%")
                    ->where('state.status','=','1')
                    ->orderBy($order,$dir)
                    ->get()->toArray();
        }else{
            $state 	=  DB::table('country')->select('state.id','country.country_name','state.state_name','state.country_id','state.status')
						->join('state','country.id','=','state.country_id')
						->where('state.id','LIKE',"%{$search}%")
                        ->orWhere('country.country_name', 'LIKE',"%{$search}%")
                        ->orWhere('state.state_name', 'LIKE',"%{$search}%")
                        ->offset($start)
                        ->limit($limit)
                        ->where('state.status','=','1')
                        ->orderBy($order,$dir)
                        ->get()->toArray();
        }
        $totalFiltered = State::where('id','LIKE',"%{$search}%")
                    ->orWhere('state_name', 'LIKE',"%{$search}%")
                    ->where('status','=','1')
                    ->count();
        }
        
        $table ="state";
        $data = $this->CommonAjaxReturn($state, 0, 'master.statedestroy', 0,$table); 
       
        $json_data = array(
            "draw"            => intval($request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data   
            );

        echo json_encode($json_data); 
    }

    public function ajax_city_list(Request $request){
        $columns = array( 
            0 => 'id', 
            1 => 'city_name', 
            2 => 'state_name',
            2 => 'city_image',
        );

        $totalData = City::where('status','=','1')
					->count();

        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {            
            if( $limit == -1){
				$city = DB::table('city')->select('city.id','city.city_name',DB::raw('CONCAT(state.state_name, " - ",country.country_name) as state_name'),'state.country_id','city.status','city.city_image')
                ->leftjoin('state','state.id','=','city.state_id')
                ->leftjoin('country','country.id','=','state.country_id')
                ->where('city.status','=','1')
                ->orderBy($order,$dir)
				->get()->toArray();
            }else{
               $city = DB::table('city')->select('city.id','city.city_name',DB::raw('CONCAT(state.state_name, " - ",country.country_name) as state_name'),'state.country_id','city.status','city.city_name','city.city_image')
                ->leftjoin('state','state.id','=','city.state_id')
                ->leftjoin('country','country.id','=','state.country_id')
                ->where('city.status','=','1')
				->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get()->toArray();
            }
        
        }
        else {
        $search = $request->input('search.value'); 
        if( $limit == -1){
			$city = DB::table('city')->select('city.id','city.city_name',DB::raw('CONCAT(state.state_name, " - ",country.country_name) as state_name'),'state.country_id','city.status','city.city_name','city.city_image')
                    ->leftjoin('state','state.id','=','city.state_id')
                    ->leftjoin('country','country.id','=','state.country_id')
                    ->where('city.status','=','1')
                    ->where(function($query) use ($search){
                        $query->orWhere('country.country_name', 'LIKE',"%{$search}%")
                        ->orWhere('state.state_name', 'LIKE',"%{$search}%")
                        ->orWhere('city.city_name', 'LIKE',"%{$search}%");
                    })
                    ->orderBy($order,$dir)
                    ->get()->toArray();
        }else{
            $city = DB::table('city')->select('city.id','city.city_name',DB::raw('CONCAT(state.state_name, " - ",country.country_name) as state_name'),'state.country_id','city.status','city.city_name','city.city_image')
						->leftjoin('state','state.id','=','city.state_id')
                        ->leftjoin('country','country.id','=','state.country_id')
                        ->where('city.status','=','1')
                        ->where(function($query) use ($search){
                            $query->orWhere('country.country_name', 'LIKE',"%{$search}%")
                            ->orWhere('state.state_name', 'LIKE',"%{$search}%")
                            ->orWhere('city.city_name', 'LIKE',"%{$search}%");
                        })
                        ->offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->get()->toArray();
        }
        $totalFiltered = City::where('id','LIKE',"%{$search}%")
                    ->orWhere('city_name', 'LIKE',"%{$search}%")
                    ->where('status','=','1')
                    ->count();
        }
        
        $table = "city";
        
        $data = $this->CommonAjaxReturn($city, 0, 'master.citydestroy', 0,$table); 
      //// var_dump($data);
       //exit;
        $json_data = array(
            "draw"            => intval($request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data   
            );

        echo json_encode($json_data); 
    }

   //City Name Exists Check
   public function checkCityNameExists(Request $request)
   {
       $city_name =  $request->input('city_name');
       $city_id = $request->input('city_id');
       $country_id = $request->input('country_id');
       $state_id = $request->input('state_id');

       if(!empty($city_id))
         {
               
                $cityname_exists = City::where([
                 ['city_name','=',$city_name],
                 ['country_id','=',$country_id],
                 ['state_id','=',$state_id],
                 ['id','!=',$city_id],
                 ['status','=','1']
                 ])->count();
         }
         else
         {
           $cityname_exists = City::where([
               ['city_name','=',$city_name],
               ['country_id','=',$country_id],
               ['state_id','=',$state_id],
               ['status','=','1'],     
               ])->count(); 
         } 
         if($cityname_exists > 0)
         {
             return "false";
         }
         else{
             return "true";
         }
   }

   //State Name Exists Check
   public function checkStateNameExists(Request $request)
   {
       $state_name =  $request->input('state_name');
       $state_id = $request->input('state_id');
       $country_id = $request->input('country_id');

       if(!empty($state_id))
         {
               
                $statename_exists = State::where([
                 ['state_name','=',$state_name],
                 ['country_id','=',$country_id],
                 ['id','!=',$state_id],
                 ['status','=','1']
                 ])->count();
         }
         else
         {
           $statename_exists = State::where([
               ['state_name','=',$state_name],
               ['country_id','=',$country_id],
               ['status','=','1'],     
               ])->count(); 
         } 
         if($statename_exists > 0)
         {
             return "false";
         }
         else{
             return "true";
         }
   }


   //Country Name Exists Check
   public function checkCountryNameExists(Request $request)
   {
       $country_name =  $request->input('country_name');
       $country_id = $request->input('country_id');

       if(!empty($country_id))
         {
                $countryname_exists = Country::where([
                 ['country_name','=',$country_name],
                 ['id','!=',$country_id],
                 ['status','=','1']
                 ])->count();
         }
         else
         {
           $countryname_exists = Country::where([
               ['country_name','=',$country_name],
               ['status','=','1'],     
               ])->count(); 
         } 
         if($countryname_exists > 0)
         {
             return "false";
         }
         else{
             return "true";
         }
   }

   //Amenities Name Exists
   public function checkAmenities_exists(Request $request)
   {
        $amenities_name =  $request->input('amenities_name');
        $amenities_id = $request->input('amenities_id');

        if(!empty($amenities_id))
        {
                $amenitiesname_exists = Amenities::where([
                ['amenities_name','=',$amenities_name],
                ['id','!=',$amenities_id],
                ['status','=','1']
                ])->count();
        }
        else
        {
            $amenitiesname_exists = Amenities::where([
                ['amenities_name','=',$amenities_name],
                ['status','=','1'],    
                ])->count(); 
        } 
        if($amenitiesname_exists > 0)
        {
            return "false";
        }
        else{
            return "true";
        }
   }

    public function ajax_hotels_list(Request $request){
      
       
        $columns = array( 

            0 => 'hotel_name', 
            1 => 'contact_name', 
            2 => 'state_name',
            3 => 'city_name',
            4 => 'contact_name',
            5 => 'ratings',
        );
        $totalData = DB::table('hotels as hot')->select('hot.id','hot.ratings','hot.hotel_name','hot.contact_name','hot.status','s.state_name','c.city_name')
                    ->join('state as s','s.id','=','hot.state_id')
                    ->join('city as c','c.id','=','hot.city_id')
                    ->where('hot.status','=','1')
                    ->count();
        $totalFiltered = $totalData; 
        $limit = $request->input('length');    
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');
        if(empty($request->input('search.value')))
        {            
            if( $limit == -1){
                
                $hotels = DB::table('hotels as hot')->select('hot.id',DB::raw("concat(hot.ratings,' *') AS ratings"),'hot.hotel_name','hot.contact_name','hot.status','s.state_name','c.city_name')
                ->join('state as s','s.id','=','hot.state_id')
                ->join('city as c','c.id','=','hot.city_id')
                ->orderBy($order,$dir)
                ->where('hot.status','=','1')
                ->get()->toArray();
            }else{
                $hotels =  DB::table('hotels as hot')->select('hot.id',DB::raw("concat(hot.ratings,' *') AS ratings"),'hot.hotel_name','hot.contact_name','hot.status','s.state_name','c.city_name')
                ->join('state as s','s.id','=','hot.state_id')
                ->join('city as c','c.id','=','hot.city_id')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->where('hot.status','=','1')
                ->get()->toArray();
            }
        }
        else {
        $search = $request->input('search.value'); 
        if( $limit == -1){
            $hotels =DB::table('hotels as hot')->select('hot.id',DB::raw("concat(hot.ratings,' *') AS ratings"),'hot.hotel_name','hot.contact_name','hot.status','s.state_name','c.city_name')
            ->join('state as s','s.id','=','hot.state_id')
            ->join('city as c','c.id','=','hot.city_id')
                    ->where('hot.status','=','1')
                    ->where(function($query) use ($search){
                        $query->orWhere('hotel_name', 'LIKE',"%{$search}%")
                        ->orWhere('contact_name', 'LIKE',"%{$search}%")
                        ->orWhere('state_name', 'LIKE',"%{$search}%")
                        ->orWhere('city_name', 'LIKE',"%{$search}%");
                    })
                    ->orderBy($order,$dir)
                    ->get()->toArray();
        }else{
            $hotels = DB::table('hotels as hot')->select('hot.id',DB::raw("concat(hot.ratings,' *') AS ratings"),'hot.hotel_name','hot.contact_name','hot.status','s.state_name','c.city_name')
                    ->join('state as s','s.id','=','hot.state_id')
                    ->join('city as c','c.id','=','hot.city_id')
                        ->where('hot.status','=','1')
                        ->where(function($query) use ($search){
                            $query->orWhere('hotel_name', 'LIKE',"%{$search}%")
                            ->orWhere('contact_name', 'LIKE',"%{$search}%")
                            ->orWhere('state_name', 'LIKE',"%{$search}%")
                            ->orWhere('city_name', 'LIKE',"%{$search}%");
                        })
                        ->offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->get()->toArray();
        }
        $totalFiltered = DB::table('hotels as hot')->select('hot.id',DB::raw("concat(hot.ratings,' *') AS ratings"),'hot.hotel_name','hot.contact_name','hot.status','s.state_name','c.city_name')
                    ->join('state as s','s.id','=','hot.state_id')
                    ->join('city as c','c.id','=','hot.city_id')
                    ->orWhere('hotel_name', 'LIKE',"%{$search}%")
                    ->orWhere('state_name', 'LIKE',"%{$search}%")
                    ->orWhere('city_name', 'LIKE',"%{$search}%")
                    ->where('hot.status','=','1')
                    ->count();
        }
        $table ="hotels";
    //  $data = $this->CommonAjaxReturn($hotels, 0, 'hotels.hoteldestroy', 0,$table); 
    //    $data = $this->CommonAjaxReturn($hotels, 2, '', 0,$table,'master.edithotel'); 
      //  $data = $this->CommonAjaxReturn($hotels, 2, '', 1,$table,'master.edithotel'); 

      $data = array();
      if(!empty($hotels))
      {
          foreach ($hotels as $hotels)
          {
              $hotelscount =  DB::table('hotels as hot')->select('hot.id','hot.ratings','hot.hotel_name','hot.contact_name','hot.status','s.state_name','c.city_name')
                    ->join('state as s','s.id','=','hot.state_id')
                    ->join('city as c','c.id','=','hot.city_id')
                    ->where('hot.status','=','1')
                    ->count();
              
              if($hotelscount>=1){
                 
                  $nestedData['id'] = $hotels->id;
                  $nestedData['hotel_name'] = $hotels->hotel_name;
                 
                  $nestedData['state_name'] = $hotels->hotel_name;
                  $nestedData['city_name'] = $hotels->city_name;
                  $nestedData['contact_name'] = $hotels->contact_name;
                  $nestedData['ratings'] = $hotels->ratings;
                  $enc_id = Crypt::encrypt($hotels->id);
                  $edit = route('master.edithotel',$enc_id);
                  $delete = route('hotels.hoteldestroy',$enc_id);
                  $actions = '';
                  $actions .="<a class='btn btn-sm blue waves-effect waves-circle waves-light' href='$edit'><i class='mdi mdi-lead-pencil'></i></a> ";
                  $actions .="<a><form style='display:inline-block;' action='$delete' method='POST'>".method_field('DELETE').csrf_field();
                  $actions .="&nbsp;&nbsp;<button  type='submit' class='btn btn-sm red waves-effect waves-circle waves-light' onclick='return ConfirmDeletion()'><i class='mdi mdi-delete'></i></button> </form>";
                  $nestedData['options'] = $actions;
                
                  $data[] = $nestedData;
              }
              
          }
   
    $json_data = array(
        "draw"            => intval($request->input('draw')),  
        "recordsTotal"    => intval($totalData),  
        "recordsFiltered" => intval($totalFiltered), 
        "data"            => $data   
        );

        echo json_encode($json_data); 
    }
}
    public function roomtypeNameexists(Request $request)
    {
        $room_type = $request->room_type;
        $id = $request->roomtype_id;

        if($id != '')
        {
            $roomtype_exists = RoomType::where('id','=',$id)
                                ->where('room_type','=',$room_type)
                                ->where('status','=','1')->count();
        }
        else{
            $roomtype_exists = RoomType::where('room_type','=',$room_type)
                                ->where('status','=','1')->count();
        }
        if($roomtype_exists > 0)
        {
            return "false";
        }
        else
        {
            return "true";
        }
    }
    public function ajax_activities_list(Request $request)
    {
        $columns = array( 

            0 => 'title_name', 
            1 => 'duartion_hours', 
            2 => 'amount',
            3 => 'state_id',
            4 => 'city_id',
            5 => 'zip_code',
            6 => 'id'
        );
        $totalData = DB::table('activities as act')->select('act.id','act.title_name','act.duartion_hours','act.amount','act.status','act.zip_code','cit.city_name','st.state_name')
                    ->leftjoin('city as cit','cit.id','=','act.city_id')
                    ->leftjoin('state as st','st.id','=','act.state_id')
                    ->count();

        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {            
            if( $limit == -1){ 
                $Activity = DB::table('activities as act')->select('act.id','act.title_name','act.duartion_hours','act.amount','act.status','act.zip_code','cit.city_name','st.state_name')
                ->leftjoin('city as cit','cit.id','=','act.city_id')
                ->leftjoin('state as st','st.id','=','act.state_id')
                ->orderBy($order,$dir)
                ->where('act.status','=','1')
                ->get()->toArray();
            }else{
                $Activity =  DB::table('activities as act')->select('act.id','act.title_name','act.duartion_hours','act.amount','act.status','act.zip_code','cit.city_name','st.state_name')
                ->leftjoin('city as cit','cit.id','=','act.city_id')
                ->leftjoin('state as st','st.id','=','act.state_id')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->where('act.status','=','1')
                ->get()->toArray();
            }
            //$Activity->dump();
        }
        else {
        $search = $request->input('search.value'); 
        if( $limit == -1){
            $Activity = DB::table('activities as act')->select('act.id','act.title_name','act.duartion_hours','act.amount','act.status','act.zip_code','cit.city_name','st.state_name')
                        ->leftjoin('city as cit','cit.id','=','act.city_id')
                        ->leftjoin('state as st','st.id','=','act.state_id')
                        ->where('act.status','=','1')
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
            $Activity = DB::table('activities as act')->select('act.id','act.title_name','act.duartion_hours','act.amount','act.status','act.zip_code','cit.city_name','st.state_name')
                        ->leftjoin('city as cit','cit.id','=','act.city_id')
                        ->leftjoin('state as st','st.id','=','act.state_id')
                        ->where('act.status','=','1')
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
        $totalFiltered = DB::table('activities as act')->select('act.id','act.title_name','act.duartion_hours','act.amount','act.status','act.zip_code','cit.city_name','st.state_name')
                            ->leftjoin('city as cit','cit.id','=','act.city_id')
                            ->leftjoin('state as st','st.id','=','act.state_id')
                        ->where('act.id','LIKE',"%{$search}%")
                    ->orWhere('title_name', 'LIKE',"%{$search}%")
                    ->where('act.status','=','1')
                    ->orWhere('city_name', 'LIKE',"%{$search}%")
                    ->orWhere('state_name', 'LIKE',"%{$search}%")
                    ->orWhere('zip_code', 'LIKE',"%{$search}%")
                    ->count();
        }
        
        $table ="activities";
       //$data = $this->CommonAjaxReturn($Activity, 2, '', 1,$table,'activity.editactivity'); 
    //   dd($Activity);
       $data = array();
       if(!empty($Activity))
       {
           foreach ($Activity as $Activity)
           {
               $activitiescount =  DB::table('activities as act')->select('act.id','act.title_name','act.duartion_hours','act.amount','act.status','act.zip_code','cit.city_name','st.state_name')
                            ->leftjoin('city as cit','cit.id','=','act.city_id')
                            ->leftjoin('state as st','st.id','=','act.state_id')
                           ->count();
               
               if($activitiescount>=1){
                  
                   $nestedData['id'] = $Activity->id;
                   $nestedData['title_name'] = $Activity->title_name;
                   $hours = floor($Activity->duartion_hours / 60) ;
                   $minutes = floor($Activity->duartion_hours % 60) ;

                  if($hours == 0 )
                  {
                      $hours = '';
                  }
                  elseif($hours == 1){
                      $hours = $hours.' '.'hour';
                  }
                  else{
                      $hours = $hours.' '.'hours';
                  }

                    if($minutes == 0)
                    {
                        $minutes = '';
                    }
                    elseif($minutes == 1){
                        $minutes = $minutes.' '.'minute';
                    }
                    else{
                        $minutes = $minutes.' '.'minutes';
                    }

                    $hours_and_minutes = $hours.' '.$minutes;
                   $nestedData['duartion_hours'] = $hours_and_minutes;
                   $nestedData['amount'] = $Activity->amount;  
                   $nestedData['city_name'] = $Activity->city_name;
                   $nestedData['state_name'] = $Activity->state_name;
                   $nestedData['zip_code'] = $Activity->zip_code;
                   $enc_id = Crypt::encrypt($Activity->id);
                   $edit = route('activity.editactivity',$enc_id);
                   $delete = route('activity.deleteactivity',$enc_id);
                   $actions = '';
                   $actions .="<a class='btn btn-sm blue waves-effect waves-circle waves-light' href='$edit'><i class='mdi mdi-lead-pencil'></i></a> ";
                   $actions .="<a><form style='display:inline-block;' action='$delete' method='POST'>".method_field('DELETE').csrf_field();
                   $actions .="&nbsp;&nbsp;<button  type='submit' class='btn btn-sm red waves-effect waves-circle waves-light' onclick='return ConfirmDeletion()'><i class='mdi mdi-delete'></i></button> </form>";
                   $nestedData['options'] = $actions;
                 
                   $data[] = $nestedData;
               }
               
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
    public function ajax_enquiry_list(Request $request)
    {
        $columns = array( 

            0 => 'name', 
            1 => 'phone', 
            2 => 'type',
            3 => 'email',
            4 => 'id'
        );

        $totalData = DB::table('enquiry as e')->select('e.id','c.name','c.email','e.type','c.phone')
        ->leftjoin('customer_details as c','c.id','=','e.customer_id')->count();

        

        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {            
            if( $limit == -1){ 
                $Enquiry = DB::table('enquiry as e')->select('e.id','c.name','c.email','e.type','c.phone')
                ->join('customer_details as c','c.id','=','e.customer_id')
                ->orderBy($order,$dir)
                ->where('status','=','1')
                ->get()->toArray();
            }else{
                $Enquiry = DB::table('enquiry as e')->select('e.id','c.name','c.email','e.type','c.phone')
                ->join('customer_details as c','c.id','=','e.customer_id')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->where('e.status','=','1')
                ->get()->toArray();
            }
            //$Activity->dump();
        }
        else {
        $search = $request->input('search.value'); 
        if( $limit == -1){
            $Enquiry = DB::table('enquiry as e')->select('e.id','c.name','c.email','e.type','c.phone')
                        ->join('customer_details as c','c.id','=','e.customer_id')
                         ->where(function($query) use ($search){
                        $query->orWhere('name', 'LIKE',"%{$search}%")
                        ->orWhere('email', 'LIKE',"%{$search}%")
                        ->orWhere('phone', 'LIKE',"%{$search}%")
                        ->orWhere('type', 'LIKE',"%{$search}%");
                    })
                    ->orderBy($order,$dir)
                    ->get()->toArray();
        }else{
            $Enquiry = DB::table('enquiry as e')->select('e.id','c.name','c.email','e.type','c.phone')
            ->join('customer_details as c','c.id','=','e.customer_id')
                        ->where(function($query) use ($search){
                            $query->orWhere('name', 'LIKE',"%{$search}%")
                            ->orWhere('email', 'LIKE',"%{$search}%")
                            ->orWhere('phone', 'LIKE',"%{$search}%")
                            ->orWhere('type', 'LIKE',"%{$search}%");
                        })
                        ->offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->get()->toArray();
        }
        $totalFiltered = DB::table('enquiry as e')->select('e.id','c.name','c.email','e.type','c.phone')
        ->join('customer_details as c','c.id','=','e.customer_id')
                        ->where('id','LIKE',"%{$search}%")
                        ->orWhere('name', 'LIKE',"%{$search}%")
                        ->orWhere('email', 'LIKE',"%{$search}%")
                        ->orWhere('phone', 'LIKE',"%{$search}%")
                        ->orWhere('type', 'LIKE',"%{$search}%")
                        ->count();
        }
        $table ="enquiry";
       $data = $this->CommonAjaxReturn($Enquiry, 2, '', 1,$table,'enquiry.edit'); 
   
    $json_data = array(
        "draw"            => intval($request->input('draw')),  
        "recordsTotal"    => intval($totalData),  
        "recordsFiltered" => intval($totalFiltered), 
        "data"            => $data   
        );
        echo json_encode($json_data); 
    }
    public function ajax_customer_list(Request $request)
    {
        $columns = array( 

            0 => 'name', 
            1 => 'phone', 
            2 => 'email',
            3 => 'zipcode',
            4 => 'id'
        );

        $totalData = CustomerDetails::count();

        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {            
            if( $limit == -1){ 
                $CustomerDetails = CustomerDetails::orderBy($order,$dir)
                ->where('status','=','1')
                ->get()->toArray();
            }else{
                $CustomerDetails =  CustomerDetails::offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->where('status','=','1')
                ->get()->toArray();
            }
            //$Activity->dump();
        }
        else {
        $search = $request->input('search.value'); 
        if( $limit == -1){
            $CustomerDetails = CustomerDetails::where('status','=','1')
                         ->where(function($query) use ($search){
                        $query->orWhere('name', 'LIKE',"%{$search}%")
                        ->orWhere('email', 'LIKE',"%{$search}%")
                        ->orWhere('phone', 'LIKE',"%{$search}%")
                        ->orWhere('zipcode', 'LIKE',"%{$search}%");
                    })
                    ->orderBy($order,$dir)
                    ->get()->toArray();
        }else{
            $CustomerDetails = CustomerDetails::where('status','=','1')
                        ->where(function($query) use ($search){
                            $query->orWhere('name', 'LIKE',"%{$search}%")
                            ->orWhere('email', 'LIKE',"%{$search}%")
                            ->orWhere('phone', 'LIKE',"%{$search}%")
                            ->orWhere('zipcode', 'LIKE',"%{$search}%");
                        })
                        ->offset($start)
                        ->limit($limit)
                        ->orderBy($order,$dir)
                        ->get()->toArray();
        }
        $totalFiltered = CustomerDetails::where('id','LIKE',"%{$search}%")
                        ->orWhere('name', 'LIKE',"%{$search}%")
                        ->orWhere('email', 'LIKE',"%{$search}%")
                        ->orWhere('phone', 'LIKE',"%{$search}%")
                        ->orWhere('zipcode', 'LIKE',"%{$search}%")
                        ->count();
        }
        $table ="customer_details";
       $data = $this->CommonAjaxReturn($CustomerDetails, 2, '', 1,$table,'customer.edit'); 
   
    $json_data = array(
        "draw"            => intval($request->input('draw')),  
        "recordsTotal"    => intval($totalData),  
        "recordsFiltered" => intval($totalFiltered), 
        "data"            => $data   
        );
        echo json_encode($json_data);
    }
    public function checkpackageType_exists(Request $request)
    {   
       $package_type =  $request->input('package_type');
       $packagetype_id = $request->input('packagetype_id');

       if(!empty($packagetype_id))
         {
                $package_exists = PackageType::where([
                 ['package_type','=',$package_type],
                 ['id','!=',$packagetype_id],
                 ['status','=','1']
                 ])->count();
         }
         else
         {
           $package_exists = PackageType::where([
               ['package_type','=',$package_type],
               ['status','=','1'],     
               ])->count(); 
         } 
         if($package_exists > 0)
         {
             return "false";
         }
         else{
             return "true";
         }
    }
    public function ajax_booking_list(Request $request)
    {   
        $columns = array( 

            0 => 'id', 
            1 => 'customer_name', 
            1 => 'grand_total',
            3 => 'state_name',
            4 => 'city_name',
            5 => 'package_name',
            6 => 'booking_number',
        );

        $totalData = DB::table('booking_master as b')
            ->select('b.id','b.booking_number','cd.name','p.package_name','p.adult_count','p.total_amount','p.status','cit.city_name','st.state_name','b.grand_total')
            ->join('package_master as p','p.id','=','b.package_id')
            ->join('customer_details as cd','cd.id','=','b.customer_id')
            ->join('city as cit','cit.id','=','p.to_city_id')
            ->join('state as st','st.id','=','p.to_state_id')
            ->where('b.user_booking','=','0')
        ->count();
        
        $totalFiltered = $totalData; 

        $limit = $request->input('length');

        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {            
        if( $limit == -1){ 
            $booking = DB::table('booking_master as b')
                    ->select('b.id','b.booking_number','cd.name','p.package_name','p.adult_count','p.total_amount','p.status','cit.city_name','st.state_name','b.grand_total')
                    ->join('package_master as p','p.id','=','b.package_id')
                    ->join('customer_details as cd','cd.id','=','b.customer_id')
                    ->join('city as cit','cit.id','=','p.to_city_id')
                    ->join('state as st','st.id','=','p.to_state_id')
            ->orderBy($order,$dir)
            ->where('b.status','=','1')
            ->where('b.user_booking','=','0')
            ->get()->toArray();
        }else{
            $booking =  DB::table('booking_master as b')
                        ->select('b.id','b.booking_number','cd.name','p.package_name','p.adult_count','p.total_amount','p.status','cit.city_name','st.state_name','b.grand_total')
                        ->join('package_master as p','p.id','=','b.package_id')
                        ->join('customer_details as cd','cd.id','=','b.customer_id')
                        ->join('city as cit','cit.id','=','p.to_city_id')
                        ->join('state as st','st.id','=','p.to_state_id')
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->where('b.status','=','1')
            ->where('b.user_booking','=','0')
           // ->dump()
            ->get()->toArray();
        }
        //$Activity->dump();
        }
        else {
        $search = $request->input('search.value'); 
        if( $limit == -1){
        $booking =DB::table('booking_master as b')
                    ->select('b.id','b.booking_number','cd.name','p.package_name','p.adult_count','p.total_amount','p.status','cit.city_name','st.state_name','b.grand_total')
                    ->join('package_master as p','p.id','=','b.package_id')
                    ->join('customer_details as cd','cd.id','=','b.customer_id')
                    ->join('city as cit','cit.id','=','p.to_city_id')
                    ->join('state as st','st.id','=','p.to_state_id')
                    ->where('b.status','=','1')
                    ->where('b.user_booking','=','0')
                    ->where(function($query) use ($search){
                    $query->orWhere('p.package_name', 'LIKE',"%{$search}%")
                    
                    ->orWhere('b.grand_total', 'LIKE',"%{$search}%")
                      ->orWhere('cd.name', 'LIKE',"%{$search}%")
                    ->orWhere('city_name', 'LIKE',"%{$search}%")
                    ->orWhere('state_name', 'LIKE',"%{$search}%"); 
                })
                ->orderBy($order,$dir)
                ->get()->toArray();
        }else{
        $booking = DB::table('booking_master as b')
                ->select('b.id','b.booking_number','cd.name','p.package_name','p.adult_count','p.total_amount','p.status','cit.city_name','st.state_name','b.grand_total')
                ->join('package_master as p','p.id','=','b.package_id')
                ->join('customer_details as cd','cd.id','=','b.customer_id')
                ->join('city as cit','cit.id','=','p.to_city_id')
                ->join('state as st','st.id','=','p.to_state_id')
                ->where('b.status','=','1')
                ->where('b.user_booking','=','0')
                    ->where(function($query) use ($search){
                        $query->orWhere('package_name', 'LIKE',"%{$search}%")
                        ->orWhere('b.grand_total', 'LIKE',"%{$search}%")
                        ->orWhere('cd.name', 'LIKE',"%{$search}%")
                        ->orWhere('city_name', 'LIKE',"%{$search}%")
                        ->orWhere('state_name', 'LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get()->toArray();
        }
            $totalFiltered = DB::table('booking_master as b')
                    ->select('b.id','b.booking_number','cd.name','p.package_name','p.adult_count','p.total_amount','p.status','cit.city_name','st.state_name','b.grand_total')
                    ->join('package_master as p','p.id','=','b.package_id')
                    ->join('customer_details as cd','cd.id','=','b.customer_id')
                    ->join('city as cit','cit.id','=','p.to_city_id')
                    ->join('state as st','st.id','=','p.to_state_id')
                    ->where('b.status','=','1')
                    ->where('b.user_booking','=','0')
                    ->where('p.id','LIKE',"%{$search}%")
                    ->orWhere('b.grand_total', 'LIKE',"%{$search}%")
                    ->orWhere('cd.name', 'LIKE',"%{$search}%")
                    ->orWhere('city_name', 'LIKE',"%{$search}%")
                    ->orWhere('state_name', 'LIKE',"%{$search}%")
                ->count();
        }
        // $table ="activities";
        //$data = $this->CommonAjaxReturn($Activity, 2, '', 1,$table,'activity.editactivity'); 
        //   dd($Activity);
        $data = array();
        if(!empty($booking))
        {
            foreach ($booking as $booking)
            {  
                $nestedData['id'] = $booking->id;
                $nestedData['package_name'] = $booking->package_name;
                $nestedData['grand_total'] = $booking->grand_total;
                $nestedData['customer_name'] = $booking->name;
                $nestedData['city_name'] = $booking->city_name;
                $nestedData['state_name'] = $booking->state_name;
                $nestedData['booking_number'] = $booking->booking_number;
                $enc_id = Crypt::encrypt($booking->id);
                $edit = route('booking.edit',$enc_id);
                $mail = route('booking.invoice',$enc_id);  
                $pdf = route('booking.pdf',$enc_id);
                $actions ="<a class='btn btn-sm blue waves-effect waves-circle waves-light' href='$edit'><i class='mdi mdi-lead-pencil'></i></a>&nbsp;&nbsp;<a class='btn btn-sm red waves-effect waves-circle waves-light' title='PDF download' href='$pdf'><i class='mdi mdi-arrow-down'></i></a>&nbsp;&nbsp;<a class='btn btn-sm  waves-effect waves-circle waves-light' style='color:white;background:orange' title='Email Invoice'  href='$mail' onclick='return ConfirmMail()'><i class='mdi mdi-email'></i></a>";
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
    public function ajax_confirmed_booking_list(Request $request)
    {
        $columns = array( 

            0 => 'id', 
            1 => 'customer_name', 
            1 => 'grand_total',
            3 => 'state_name',
            4 => 'city_name',
            5 => 'package_name',
            6 => 'booking_number',
        );

        $totalData = DB::table('booking_master as b')
            ->select('b.id','b.booking_number','cd.name','p.package_name','p.adult_count','p.total_amount','p.status','cit.city_name','st.state_name','b.grand_total')
            ->join('package_master as p','p.id','=','b.package_id')
            ->join('customer_details as cd','cd.id','=','b.customer_id')
            ->join('city as cit','cit.id','=','p.to_city_id')
            ->join('state as st','st.id','=','p.to_state_id')
            ->where('b.status','=','1')
            ->where('b.user_booking','=','1')
        ->count();
     

        $totalFiltered = $totalData; 

        $limit = $request->input('length');

        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {            
        if( $limit == -1){ 
            $booking = DB::table('booking_master as b')
            ->select('b.id','b.booking_number','cd.name','p.package_name','p.adult_count','p.total_amount','p.status','cit.city_name','st.state_name','b.grand_total')
            ->join('package_master as p','p.id','=','b.package_id')
            ->join('customer_details as cd','cd.id','=','b.customer_id')
            ->join('city as cit','cit.id','=','p.to_city_id')
            ->join('state as st','st.id','=','p.to_state_id')
            ->orderBy($order,$dir)
            ->where('b.status','=','1')
            ->where('b.user_booking','=','1')
            ->get()->toArray();
        }else{
            $booking =  DB::table('booking_master as b')
            ->select('b.id','b.booking_number','cd.name','p.package_name','p.adult_count','p.total_amount','p.status','cit.city_name','st.state_name','b.grand_total')
            ->join('package_master as p','p.id','=','b.package_id')
            ->join('customer_details as cd','cd.id','=','b.customer_id')
            ->join('city as cit','cit.id','=','p.to_city_id')
            ->join('state as st','st.id','=','p.to_state_id')
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->where('b.status','=','1')
            ->where('b.user_booking','=','1')
            
            ->get()->toArray();
        }
        }
        else {
        $search = $request->input('search.value'); 
        if( $limit == -1){
        $booking =DB::table('booking_master as b')
        ->select('b.id','b.booking_number','cd.name','p.package_name','p.adult_count','p.total_amount','p.status','cit.city_name','st.state_name','b.grand_total')
        ->join('package_master as p','p.id','=','b.package_id')
        ->join('customer_details as cd','cd.id','=','b.customer_id')
        ->join('city as cit','cit.id','=','p.to_city_id')
        ->join('state as st','st.id','=','p.to_state_id')
                    ->where('b.status','=','1')
                    ->where('b.user_booking','=','1')
                    ->where(function($query) use ($search){
                    $query->orWhere('p.package_name', 'LIKE',"%{$search}%")
                    
                    ->orWhere('b.grand_total', 'LIKE',"%{$search}%")
                      ->orWhere('cd.name', 'LIKE',"%{$search}%")
                    ->orWhere('city_name', 'LIKE',"%{$search}%")
                    ->orWhere('state_name', 'LIKE',"%{$search}%"); 
                })
                ->orderBy($order,$dir)
                ->get()->toArray();
        }else{
        $booking =DB::table('booking_master as b')
        ->select('b.id','b.booking_number','cd.name','p.package_name','p.adult_count','p.total_amount','p.status','cit.city_name','st.state_name','b.grand_total')
        ->join('package_master as p','p.id','=','b.package_id')
        ->join('customer_details as cd','cd.id','=','b.customer_id')
        ->join('city as cit','cit.id','=','p.to_city_id')
        ->join('state as st','st.id','=','p.to_state_id')
                ->where('b.status','=','1')
                ->where('b.user_booking','=','0')
                    ->where(function($query) use ($search){
                        $query->orWhere('package_name', 'LIKE',"%{$search}%")
                        ->orWhere('b.grand_total', 'LIKE',"%{$search}%")
                        ->orWhere('cd.name', 'LIKE',"%{$search}%")
                        ->orWhere('city_name', 'LIKE',"%{$search}%")
                        ->orWhere('state_name', 'LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get()->toArray();
        }
            $totalFiltered = DB::table('booking_master as b')
                        ->select('b.id','b.booking_number','cd.name','p.package_name','p.adult_count','p.total_amount','p.status','cit.city_name','st.state_name','b.grand_total')
                        ->join('package_master as p','p.id','=','b.package_id')
                        ->join('customer_details as cd','cd.id','=','b.customer_id')
                        ->join('city as cit','cit.id','=','p.to_city_id')
                        ->join('state as st','st.id','=','p.to_state_id')
                    ->where('b.status','=','1')
                    ->where('b.user_booking','=','1')
                    ->where('p.id','LIKE',"%{$search}%")
                    ->orWhere('b.grand_total', 'LIKE',"%{$search}%")
                    ->orWhere('cd.name', 'LIKE',"%{$search}%")
                    ->orWhere('city_name', 'LIKE',"%{$search}%")
                    ->orWhere('state_name', 'LIKE',"%{$search}%")
                ->count();
        }
        // $table ="activities";
        //$data = $this->CommonAjaxReturn($Activity, 2, '', 1,$table,'activity.editactivity'); 
          //dd($booking);
        $data = array();
        if(!empty($booking))
        {
            foreach ($booking as $booking)
            {  
                $nestedData['id'] = $booking->id;
                $nestedData['package_name'] = $booking->package_name;
                $nestedData['grand_total'] = $booking->grand_total;
                $nestedData['customer_name'] = $booking->name;
                $nestedData['city_name'] = $booking->city_name;
                $nestedData['state_name'] = $booking->state_name;
                $nestedData['booking_number'] = $booking->booking_number;
                $enc_id = Crypt::encrypt($booking->id);
                $edit = route('booking.edit',$enc_id);
                $pdf = route('booking.pdf',$enc_id);
                $actions ="<a class='btn btn-sm blue waves-effect waves-circle waves-light' href='$edit'><i class='mdi mdi-lead-pencil'></i></a>&nbsp;&nbsp;<a class='btn btn-sm red waves-effect waves-circle waves-light' title='PDF download' href='$pdf'><i class='mdi mdi-arrow-down'></i></a>";
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
    public function ajax_followupbooking_list(Request $request)
    {   
        $columns = array( 

            0 => 'id', 
            1 => 'customer_name', 
            1 => 'grand_total',
            3 => 'paid_amount',
            4 => 'balance_amount',
            5 => 'package_name',
            6 => 'booking_number',
        );

        $totalData = DB::table('booking_master as b')
            ->select('b.id','b.booking_number','cd.name','p.package_name','p.adult_count','p.total_amount','p.status','cit.city_name','st.state_name','b.grand_total','b.paid_amount','b.balance_amount')
            ->join('package_master as p','p.id','=','b.package_id')
            ->join('customer_details as cd','cd.id','=','b.customer_id')
            ->join('city as cit','cit.id','=','p.to_city_id')
            ->join('state as st','st.id','=','p.to_state_id')
            ->where('b.payment_type','=','2')
        ->count();
        
        $totalFiltered = $totalData; 

        $limit = $request->input('length');

        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {            
        if( $limit == -1){ 
            $booking = DB::table('booking_master as b')
                    ->select('b.id','b.booking_number','cd.name','p.package_name','p.adult_count','p.total_amount','p.status','cit.city_name','st.state_name','b.grand_total','b.paid_amount','b.balance_amount')
                    ->join('package_master as p','p.id','=','b.package_id')
                    ->join('customer_details as cd','cd.id','=','b.customer_id')
                    ->join('city as cit','cit.id','=','p.to_city_id')
                    ->join('state as st','st.id','=','p.to_state_id')
            ->orderBy($order,$dir)
            ->where('b.status','=','1')
            ->where('b.payment_type','=','2')
            ->get()->toArray();
        }else{
                $booking =  DB::table('booking_master as b')
                            ->select('b.id','b.booking_number','cd.name','p.package_name','p.adult_count','p.total_amount','p.status','cit.city_name','st.state_name','b.grand_total','b.paid_amount','b.balance_amount')
                            ->join('package_master as p','p.id','=','b.package_id')
                            ->join('customer_details as cd','cd.id','=','b.customer_id')
                            ->join('city as cit','cit.id','=','p.to_city_id')
                            ->join('state as st','st.id','=','p.to_state_id')
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->where('b.status','=','1')
                ->where('b.payment_type','=','2')
               // ->dump()
                ->get()->toArray();
            }
        }
        else {
        $search = $request->input('search.value'); 
        if( $limit == -1){
        $booking =DB::table('booking_master as b')
                    ->select('b.id','b.booking_number','cd.name','p.package_name','p.adult_count','p.total_amount','p.status','cit.city_name','st.state_name','b.grand_total','b.paid_amount','b.balance_amount')
                    ->join('package_master as p','p.id','=','b.package_id')
                    ->join('customer_details as cd','cd.id','=','b.customer_id')
                    ->join('city as cit','cit.id','=','p.to_city_id')
                    ->join('state as st','st.id','=','p.to_state_id')
                    ->where('b.status','=','1')
                    ->where('b.payment_type','=','2')
                    ->where(function($query) use ($search){
                    $query->orWhere('p.package_name', 'LIKE',"%{$search}%")
                    
                    ->orWhere('b.grand_total', 'LIKE',"%{$search}%")
                      ->orWhere('cd.name', 'LIKE',"%{$search}%")
                    ->orWhere('city_name', 'LIKE',"%{$search}%")
                    ->orWhere('state_name', 'LIKE',"%{$search}%"); 
                })
                ->orderBy($order,$dir)
                ->get()->toArray();
        }else{
        $booking = DB::table('booking_master as b')
                ->select('b.id','b.booking_number','cd.name','p.package_name','p.adult_count','p.total_amount','p.status','cit.city_name','st.state_name','b.grand_total','b.paid_amount','b.balance_amount')
                ->join('package_master as p','p.id','=','b.package_id')
                ->join('customer_details as cd','cd.id','=','b.customer_id')
                ->join('city as cit','cit.id','=','p.to_city_id')
                ->join('state as st','st.id','=','p.to_state_id')
                ->where('b.status','=','1')
                ->where('b.payment_type','=','2')
                    ->where(function($query) use ($search){
                        $query->orWhere('package_name', 'LIKE',"%{$search}%")
                        ->orWhere('b.grand_total', 'LIKE',"%{$search}%")
                        ->orWhere('cd.name', 'LIKE',"%{$search}%")
                        ->orWhere('city_name', 'LIKE',"%{$search}%")
                        ->orWhere('state_name', 'LIKE',"%{$search}%");
                    })
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get()->toArray();
        }
            $totalFiltered = DB::table('booking_master as b')
                    ->select('b.id','b.booking_number','cd.name','p.package_name','p.adult_count','p.total_amount','p.status','cit.city_name','st.state_name','b.grand_total','b.paid_amount','b.balance_amount')
                    ->join('package_master as p','p.id','=','b.package_id')
                    ->join('customer_details as cd','cd.id','=','b.customer_id')
                    ->join('city as cit','cit.id','=','p.to_city_id')
                    ->join('state as st','st.id','=','p.to_state_id')
                    ->where('b.status','=','1')
                    ->where('b.payment_type','=','2')
                    ->where('p.id','LIKE',"%{$search}%")
                    ->orWhere('b.grand_total', 'LIKE',"%{$search}%")
                    ->orWhere('cd.name', 'LIKE',"%{$search}%")
                    ->orWhere('city_name', 'LIKE',"%{$search}%")
                    ->orWhere('state_name', 'LIKE',"%{$search}%")
                ->count();
        }
        // $table ="activities";
        //$data = $this->CommonAjaxReturn($Activity, 2, '', 1,$table,'activity.editactivity'); 
        //   dd($Activity);
        $data = array();
        if(!empty($booking))
        {
            foreach ($booking as $booking)
            {  
                $nestedData['id'] = $booking->id;
                $nestedData['package_name'] = $booking->package_name;
                $nestedData['grand_total'] = $booking->grand_total;
                $nestedData['customer_name'] = $booking->name;
                $nestedData['paid_amount'] = $booking->paid_amount;
                $nestedData['balance_amount'] = $booking->balance_amount;
                $nestedData['booking_number'] = $booking->booking_number;
                $enc_id = Crypt::encrypt($booking->id);
                $edit = route('booking.edit',$enc_id);
                //$pdf = route('booking.invoice',$enc_id);
                $pdf = route('booking.pdf',$enc_id);
                $actions ="<a class='btn btn-sm blue waves-effect waves-circle waves-light' href='$edit'><i class='mdi mdi-lead-pencil'></i></a>&nbsp;&nbsp;<a class='btn btn-sm red waves-effect waves-circle waves-light' title='PDF download' href='$pdf'><i class='mdi mdi-arrow-down'></i></a>&nbsp;&nbsp;<a class='btn btn-sm  waves-effect waves-circle waves-light' style='color:white;background:orange' title='Invoice' href='$pdf'><i class='mdi mdi-email'></i></a>";
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
    public function ajax_tarnsportation_list(Request $request)
    {
      //  echo 'hii' ; die;
        $columns = array( 
           
            0 => 'state_name', 
            1 => 'from_city_name', 
            2 => 'to_city_name', 
            3 => 'from_city_name', 
            4 => 'distance',
            5 => 'amount_per_km',
            6 => 'total_distance_amount',
            7 => 'id',
        );

        $totalData = TransportationCharges::where('status','=','1')
					->count();

        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {            
            if( $limit == -1){
				
				$transportationCharges = DB::table('transportation_charges as tc')->select('tc.id','tc.distance','tc.amount_per_km','tc.total_distance_amount','cit.city_name as to_city_name','st.state_name','fromcity.city_name as from_city_name')
                ->leftjoin('city as cit','cit.id','=','tc.to_city_id')
                ->leftjoin('state as st','st.id','=','tc.to_state_id')
                ->leftjoin('city as fromcity','fromcity.id','=','tc.from_city_id')
                ->orderBy($order,$dir)
                ->where('tc.status','=','1')
				->get()->toArray();
            }else{
                $transportationCharges = DB::table('transportation_charges as tc')->select('tc.id','tc.distance','tc.amount_per_km','tc.total_distance_amount','cit.city_name as to_city_name','st.state_name','fromcity.city_name as from_city_name')
                ->leftjoin('city as cit','cit.id','=','tc.to_city_id')
                ->leftjoin('state as st','st.id','=','tc.to_state_id')
                ->leftjoin('city as fromcity','fromcity.id','=','tc.from_city_id')
				->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->where('tc.status','=','1')
                ->get()->toArray();
            }
        
        }
        else {
        $search = $request->input('search.value'); 
        if( $limit == -1){
			$transportationCharges = DB::table('transportation_charges as tc')->select('tc.id','tc.distance','tc.amount_per_km','tc.total_distance_amount','cit.city_name as to_city_name','st.state_name','fromcity.city_name as from_city_name')
                ->leftjoin('city as cit','cit.id','=','tc.to_city_id')
                ->leftjoin('state as st','st.id','=','tc.to_state_id')
                ->leftjoin('city as fromcity','fromcity.id','=','tc.from_city_id')
                    ->where('tc.id','LIKE',"%{$search}%")
                    ->orWhere('st.state_name', 'LIKE',"%{$search}%")
                    ->orWhere('fromcity.city_name', 'LIKE',"%{$search}%")
                    ->orWhere('cit.city_name', 'LIKE',"%{$search}%")
                    ->orWhere('tc.amount_per_km', 'LIKE',"%{$search}%")
                    ->orWhere('tc.distance', 'LIKE',"%{$search}%")
                    ->orWhere('tc.total_distance_amount', 'LIKE',"%{$search}%")
                    ->where('tc.status','=','1')
                    ->orderBy($order,$dir)
                    ->get()->toArray();
        }else{
            $transportationCharges = DB::table('transportation_charges as tc')->select('tc.id','tc.distance','tc.amount_per_km','tc.total_distance_amount','cit.city_name as to_city_name','st.state_name','fromcity.city_name as from_city_name')
                ->leftjoin('city as cit','cit.id','=','tc.to_city_id')
                ->leftjoin('state as st','st.id','=','tc.to_state_id')
                ->leftjoin('city as fromcity','fromcity.id','=','tc.from_city_id')
                    ->where('tc.id','LIKE',"%{$search}%")
                    ->orWhere('st.state_name', 'LIKE',"%{$search}%")
                    ->orWhere('fromcity.city_name', 'LIKE',"%{$search}%")
                    ->orWhere('cit.city_name', 'LIKE',"%{$search}%")
                    ->orWhere('tc.amount_per_km', 'LIKE',"%{$search}%")
                    ->orWhere('tc.distance', 'LIKE',"%{$search}%")
                     ->orWhere('tc.total_distance_amount', 'LIKE',"%{$search}%")
                        ->offset($start)
                        ->limit($limit)
                        ->where('tc.status','=','1')
                        ->orderBy($order,$dir)
                        ->get()->toArray();
        }
        $totalFiltered = DB::table('transportation_charges')->where('id','LIKE',"%{$search}%")
                    ->orWhere('st.state_name', 'LIKE',"%{$search}%")
                    ->orWhere('fromcity.city_name', 'LIKE',"%{$search}%")
                    ->orWhere('amount_per_km', 'LIKE',"%{$search}%")
                    ->orWhere('distance', 'LIKE',"%{$search}%")
                    ->orWhere('total_distance_amount', 'LIKE',"%{$search}%")
                    ->where('status','=','1')
                    ->count();
        }
        
      //  dd($transportationCharges);
        //$table ="transportation_charges";
       // $data = $this->CommonAjaxReturn($state, 0, 'master.statedestroy', 0,$table); 

       $data = array();
        if(!empty($transportationCharges))
        {
            foreach ($transportationCharges as $transportationCharges)
            {  
                $nestedData['id'] = $transportationCharges->id;
                $nestedData['state_name'] = $transportationCharges->state_name;
                $nestedData['from_city_name'] = $transportationCharges->from_city_name;
                $nestedData['to_city_name'] = $transportationCharges->to_city_name;
                $nestedData['distance'] = $transportationCharges->distance;
                $nestedData['amount_per_km'] = $transportationCharges->amount_per_km;
                $nestedData['total_distance_amount'] = $transportationCharges->total_distance_amount;
                $enc_id = Crypt::encrypt($transportationCharges->id);
                $edit = route('transportCharges.edit',$enc_id);
                $actions ="<a class='btn btn-sm blue waves-effect waves-circle waves-light' href='$edit'><i class='mdi mdi-lead-pencil'></i></a>&nbsp;&nbsp;</i></a>";
                $nestedData['options'] = $actions;
                
                $data[] = $nestedData;
            }
        }
       
        $json_data = array(
            "draw"            => intval($request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data   
            );

        echo json_encode($json_data); 
    }
}
