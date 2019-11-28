<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Helpers\CommonHelper;
use App\Model\Country;
use App\Model\State;
use App\Model\City;
use App\Model\Amenities;
use App\Model\Hotel;
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
				$city = DB::table('city')->select('city.id','city.city_name',DB::raw('CONCAT(state.state_name, " - ",country.country_name) as state_name'),'state.country_id','city.status')
                ->leftjoin('state','state.id','=','city.state_id')
                ->leftjoin('country','country.id','=','state.country_id')
                ->where('city.status','=','1')
                ->orderBy($order,$dir)
				->get()->toArray();
            }else{
               $city = DB::table('city')->select('city.id','city.city_name',DB::raw('CONCAT(state.state_name, " - ",country.country_name) as state_name'),'state.country_id','city.status','city.city_name')
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
			$city = DB::table('city')->select('city.id','city.city_name',DB::raw('CONCAT(state.state_name, " - ",country.country_name) as state_name'),'state.country_id','city.status','city.city_name')
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
            $city = DB::table('city')->select('city.id','city.city_name',DB::raw('CONCAT(state.state_name, " - ",country.country_name) as state_name'),'state.country_id','city.status','city.city_name')
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
        2 => 'id',
    );

    $totalData = Hotel::where('status','=','1')
                ->count();

    $totalFiltered = $totalData; 

    $limit = $request->input('length');
    
    $start = $request->input('start');
    $order = $columns[$request->input('order.0.column')];
    $dir = $request->input('order.0.dir');

    if(empty($request->input('search.value')))
    {            
        if( $limit == -1){
            
            $state = DB::table('hotels')->select('id','hotel_name','contact_name','status')
            //->join('state','country.id','=','state.country_id')
            ->orderBy($order,$dir)
            ->where('status','=','1')
            ->get()->toArray();
        }else{
            $state =  DB::table('hotels')->select('id','hotel_name','contact_name','status')
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->where('status','=','1')
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
    
    $table ="hotels";
    $data = $this->CommonAjaxReturn($state, 2, '', 1,$table,'master.edithotel'); 
   
    $json_data = array(
        "draw"            => intval($request->input('draw')),  
        "recordsTotal"    => intval($totalData),  
        "recordsFiltered" => intval($totalFiltered), 
        "data"            => $data   
        );

    echo json_encode($json_data); 
}
   
}
