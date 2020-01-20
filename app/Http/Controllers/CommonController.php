<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Http\Request;

use App\Model\Country;
use App\Model\State;
use App\Model\City;
use App\Model\Amenities;
use App\Model\Package;
use App\Model\RoomType;
use App\Model\PackageType;
use DB;
use View;
use Mail;
use App\Helpers\CommonHelper;
use URL;
use Auth;

use Carbon\Carbon;

class CommonController extends Controller
{
	public function __construct()
    {
        ini_set('memory_limit', '-1');
       
	   }
	public function userDetail(Request $request)
    {
        $id = $request->id;
        $User = new User();
        $data = User::find($id);
        return $data;
    }
    public function getStateList(Request $request)
    {
        $id = $request->country_id;
        $res = DB::table('state')
                ->select('id','state_name')
                ->where([
                    ['country_id','=',$id],
                    ['status','=','1']
                ])->get();
        
                return response()->json($res);
    }
    public function getCitiesList(Request $request){
      
        $id = $request->State_id;
        $res = DB::table('city')
        ->select('id','city_name','city_image')
        ->where([
            ['state_id','=',$id],
            ['status','=','1']
        ])->get();
       
        return response()->json($res);
    }
    // public function getHotelRoomList(Request $request)
    // {
    //     $id = $request->country_id;
    //     $res = DB::table('state')
    //             ->select('id','state_name')
    //             ->where([
    //                 ['country_id','=',$id],
    //                 ['status','=','1']
    //             ])->get();
        
    //             return response()->json($res);
    // }

    //Country Details 
    public function countryDetail(Request $request)
    {
        $autoid = $request->input('country_id');
        $country = new Country();
        $data = Country::find($autoid);
        return $data;
    }
    
	
	//State Details 
    public function stateDetail(Request $request)
    {
        $id = $request->id;
        $state = new State();
        $data = State::find($id);
        return $data;
    }
	
	
	//City Details 
    public function cityDetail(Request $request)
    {
        $id = $request->id;
        $city = new City();
        $data = City::find($id);
        //dd($data);
        return $data;
    }

    //Amenities Details
    public function amnenitiesDetail(Request $request)
    {
        $id = $request->amenities_id;
        $data = Amenities::find($id);
        return $data;
    }

    public function roomtypeDetail(Request $request)
    {
        $id = $request->roomtype_id;
        $data = RoomType::find($id);
        return $data;
    }

    public function hotelDetail(Request $request)
    {
        $roomtypeid = $request->id;
        $data = DB::table('hotel_roomtypes as room')->select('room.id as roomid','room.hotel_id as roomhotelid','room.roomtype_id','room.price','roomtype.room_type','room.description') 
                ->leftjoin('room_type as roomtype','room.roomtype_id','=','roomtype.id')
               ->where('room.id','=',$roomtypeid)->first();
        return json_encode($data);
        //return $data;
    }
	
	
    /*
        Input $result = query result (array)
        Input $deleteRoute = Delete Route Name (string)
        deletetype : 0 => post , 1 => get, 2 => hide
        edittype : 0 => popup , 1 => page
    */
    public function CommonAjaxReturn($result, $deletetype, $deleteRoute,$edittype,$table,$editRoute=false){
        $data = array();
       // $get_roles = Auth::user()->roles;
		//$user_role = $get_roles[0]->slug;
		$user_id = Auth::user()->id;
        if(!empty($result))
        {
            //$memberscount = CommonHelper::mastersMembersCount($table,$autoid, $user_role, $user_id);
            //dd($table);

            foreach ($result as $resultdata)
            {
                $serial = 0;
                foreach($resultdata as $newkey => $newvalue){
                   
                    if($newkey=='id'){
                        $autoid = $newvalue;
                        
                    }else{
                        //$memberscount = CommonHelper::mastersMembersCount($table,$autoid, $user_role, $user_id);
                        
                        if($table=='state' || $table=='company_branch')
                        {
                            if($serial == 1)
                            {
                                $nestedData[$newkey] = $newvalue."&nbsp;&nbsp;&nbsp;";
                            }
                            else{
                                $nestedData[$newkey] = $newvalue;
                            }
                            $serial++;
                        }
                        else{

                            if($serial == 0)
                            {
                                $nestedData[$newkey] = $newvalue."&nbsp;&nbsp;&nbsp;";
                            }
                            else{
                                $nestedData[$newkey] = $newvalue;
                            }
                            $serial++;
                        }
                    }
                }
                
                $enc_id = Crypt::encrypt($autoid);
                
                //dd($nestedData[$newkey]);
               // $memberscount = CommonHelper::countryMembersCount($table,$autoid, $user_role, $user_id);
               // $nestedData[$newkey] = "|".$memberscount;
                //dd($nestedData[$newkey]);
				if($deleteRoute == "")
				{
					$delete = "";
				}else{
                $delete =  route($deleteRoute, [$autoid]) ;
				}
                if($edittype==0){
                    $edit =  "#";
                }
				else if($edittype==2){
                    $edit =  "#";
                }else{
                    $edit =  route($editRoute,[$enc_id]);
                }
				$actions ='';
				
				if($edittype!=2){
					$actions ="<a style='' id='$edit' onClick='showeditForm($autoid);' class='btn btn-sm blue waves-effect waves-circle waves-light' href='$edit'><i class='mdi mdi-lead-pencil'></i></a>";
				}
               

                
                if($deletetype==0){
                    $actions .="<a><form style='display:inline-block;' action='$delete' method='POST'>".method_field('DELETE').csrf_field();
                    $actions .="&nbsp;&nbsp;<button  type='submit' class='btn btn-sm red waves-effect waves-circle waves-light' onclick='return ConfirmDeletion()'><i class='mdi mdi-delete'></i></button> </form>";
                }
				else if($deletetype==2){
                    $actions .="";
                }
				else{
                   
                    $actions .="&nbsp;&nbsp; <a href='$delete' class='btn btn-sm red waves-effect waves-circle waves-light' onclick='return ConfirmDeletion()' ><i class='mdi mdi-delete'></i></a>";
                    
                    
                }
                
               
              
                $nestedData['options'] = $actions;
                $data[] = $nestedData;

            }
        }
        return $data;
    }

    
   /*
        Input $result = query result (array)
        Input $deleteRoute = Delete Route Name (string)
        deletetype : 0 => post , 1 => get, 2 => hide
        edittype : 0 => popup , 1 => page
    */
    public function CommonAjaxReturnold($result, $deletetype, $deleteRoute,$edittype,$editRoute=false){
        $data = array();
        if(!empty($result))
        {
            foreach ($result as $resultdata)
            {
                foreach($resultdata as $newkey => $newvalue){
                    if($newkey=='id'){
                        $autoid = $newvalue;
                    }else{
                        $nestedData[$newkey] = $newvalue;
                    }
                }
                
                $enc_id = Crypt::encrypt($autoid);
				if($deleteRoute == "")
				{
					$delete = "";
				}else{
                $delete =  route($deleteRoute, [app()->getLocale(),$autoid]) ;
				}
                if($edittype==0){
                    $edit =  "#";
                }
				else if($edittype==2){
                    $edit =  "#";
                }else{
                    $edit =  route($editRoute,[app()->getLocale(),$enc_id]);
                }
				$actions ='';
				
				if($edittype!=2){
					$actions ="<label style='width:100% !important;float:left;text-align:center;'><a style='' id='$edit' onClick='showeditForm($autoid);' class='' href='$edit'><i class='material-icons' style='color:#2196f3'>edit</i></a>";
				}
               
                
                if($deletetype==0){
                    $actions .="<a><form style='display:inline-block;' action='$delete' method='POST'>".method_field('DELETE').csrf_field();
                    $actions .="<button  type='submit' class='' style='background:none;border:none;'  onclick='return ConfirmDeletion()'><i class='material-icons' style='color:red;'>delete</i></button> </form>";
                }
				else if($deletetype==2){
                    $actions .="";
                }
				else{
                    $actions .="&nbsp; <a href='$delete' onclick='return ConfirmDeletion()' ><i class='material-icons' style='color:red;'>delete</i></a></label>";
                }
                
                $nestedData['options'] = $actions;
                $data[] = $nestedData;
            }
        }
        return $data;
    }
    public function customerAutocomplete(Request $request)
    {
         $data = $request->all();
        $keyword = $request->get('name');
        $type = $request->type;
        $search_param = "{$keyword}%";
        if($keyword!='')
        {
            $result = DB::table('customer_details as c')->select(DB::raw("CONCAT(c.name,'-',c.phone,'-',c.id) AS value"),'c.name','c.email','c.phone','c.address_one','c.address_two','c.zipcode','cit.city_name','s.state_name','c.id as customer_id')
                    ->join('city as cit','cit.id','=','c.city_id')
                    ->join('state as s','s.id','=','c.state_id')
                     ->orwhere("c.name","LIKE","%{$keyword}%")
                     ->orwhere("c.phone","LIKE","%{$keyword}%")
                    // ->orwhere('c.zipcode','like', '%'.$keyword.'%')
                    // ->orwhere('cit.city_name','like', '%'.$keyword.'%')
                ->get();
        }
        
        echo json_encode($result);
    }

    public function packageAutocomplete(Request $request)
    {
        $keyword = $request->get('name');
        $package_type = $request->input('package_type');
        //$type = $request->type;
        $search_param = "{$keyword}%";
        if($keyword!='' && $package_type!='')
        {
            $result = DB::table('package_master as p')->select(DB::raw("CONCAT(p.package_name,'-',c.city_name) AS value"),'p.package_name','p.id as packageid','c.city_name as tocityname','c.id as tocityid','s.state_name as tostatename','s.id as tostateid','ct.country_name as tocountryname','ct.id as tocountryid','p.total_package_value','p.total_amount','p.tax_amount','p.adult_price_person','p.child_price_person','p.infant_price','cf.city_name as fromcityname','cf.id as fromcityid','sf.state_name as fromstatename','sf.id as fromstateid','ctf.country_name as fromcountryname','ctf.id as fromcountryid','p.adult_count','p.child_count','p.infant_count','p.transport_charges','p.additional_charges')
                    ->leftjoin('city as c','c.id','=','p.to_city_id')
                    ->leftjoin('state as s','s.id','=','p.to_state_id')
                    ->leftjoin('country as ct','ct.id','=','p.to_country_id')
                    ->leftjoin('city as cf','cf.id','=','p.from_city_id')
                    ->leftjoin('state as sf','sf.id','=','p.from_state_id')
                    ->leftjoin('country as ctf','ctf.id','=','p.from_country_id')
                    ->where(function($query) use ($keyword){
                        $query->where('p.package_name', 'LIKE',"%{$keyword}%")
                        ->orwhere("s.state_name","LIKE","%{$keyword}%")
                         ->orwhere("c.city_name","LIKE","%{$keyword}%");
                    });
            if($package_type!=''){
                $result = $result->where('p.package_type','=',$package_type);
            }
                   
            $result = $result->get();
            //  dd($result);
        }else{
            $result = [];
        }
        echo json_encode($result);
    }
    public function customerPhoneExists(Request $request)
    {
        $phone =  $request->input('phone');
       
            $phone_exists = DB::table('customer_details')->where([
                ['phone','=',$phone],
                ['status','=','1'],     
                ])->count(); 

            $user_phone_exists = DB::table('users')->where([
                ['phone','=',$phone],    
                ])->count(); 
          
          if($phone_exists > 0 && $user_phone_exists > 0)
          {
              return "false";
          }
          else{
              return "true";
          }
    }
    public function getPackageDetails(Request $request)
    {
        $id = $request->package_id;
        $data = PackageType::find($id);
        return $data;
    }
    public  function getCustomeremailexists(Request $request)
    {
        $email =  $request->input('email');
       
        $customer_email_exists = DB::table('customer_details')->where([
            ['email','=',$email],
            ['status','=','1'],     
            ])->count(); 
         
        $user_email_exists = DB::table('users')->where([
            ['email','=',$email],    
            ])->count(); 

        if($customer_email_exists > 0 && $user_email_exists > 0 )
        {
            return "false";
        }
        else{
            return "true";
        }
    }
    public function FromCounrtyAutocomplete(Request $request)
    {
        $data = $request->all();
        $keyword = $request->get('name');
        $type = $request->type;
        $search_param = "{$keyword}%";
        if($keyword!='')
        {
            $result = DB::table('city as c')->select(DB::raw("CONCAT(con.country_name,'-',s.state_name,'-',c.city_name) AS value"),'c.id as cityid','con.id as countyid','s.id as stateid')
                    ->join('state as s','s.id','=','c.state_id')
                    ->join('country as con','con.id','=','c.country_id')
                     ->orwhere("c.city_name","LIKE","%{$keyword}%")
                     ->orwhere("s.state_name","LIKE","%{$keyword}%")
                     ->orwhere("con.country_name","LIKE","%{$keyword}%")
                    // ->orwhere('c.zipcode','like', '%'.$keyword.'%')
                    // ->orwhere('cit.city_name','like', '%'.$keyword.'%')
                    ->limit(20)
                ->get();
        }
        
        echo json_encode($result);
    }
}
