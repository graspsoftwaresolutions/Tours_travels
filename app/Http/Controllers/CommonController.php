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
        $hotelid =  $request->hotelid;
        $roomtypeid = $request->roomtypeid;
        $data = DB::table('hotel_roomtypes as room')->select('room.hotel_id as roomhotelid','room.roomtype_id','room.price','roomtype.room_type') 
                ->leftjoin('room_type as roomtype','room.roomtype_id','=','roomtype.id')
                ->where('room.hotel_id','=',$hotelid)->where('room.roomtype_id','=',$roomtypeid)->first();
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
        $get_roles = Auth::user()->roles;
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
            $result = DB::table('customer_details as c')->select(DB::raw("CONCAT(c.name,'-',c.zipcode,'-',c.id) AS value"),'c.name','c.email','c.phone','c.address_one','c.address_two','c.zipcode','cit.city_name','s.state_name')
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
        $type = $request->type;
        $search_param = "{$keyword}%";
        if($keyword!='')
        {
            $result = DB::table('package_master as p')->select(DB::raw("CONCAT(p.package_name,'-',c.city_name) AS value"),'p.package_name','p.id as packageid','c.city_name','c.id as cityid','s.state_name','s.id as stateid')
                    ->leftjoin('city as c','c.id','=','p.to_city_id')
                    ->leftjoin('state as s','s.id','=','p.to_state_id')
                     ->orwhere("p.package_name","LIKE","%{$keyword}%")
                     ->orwhere("s.state_name","LIKE","%{$keyword}%")
                     ->orwhere("c.city_name","LIKE","%{$keyword}%")
                    ->get();
                  //  dd($result);
        }
        echo json_encode($result);
    }
   

}
