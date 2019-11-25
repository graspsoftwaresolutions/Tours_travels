<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;

use Illuminate\Http\Request;

use App\Model\Country;
use App\Model\State;
use App\Model\City;
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
        ->select('id','city_name')
        ->where([
            ['state_id','=',$id],
            ['status','=','1']
        ])->get();
       
        return response()->json($res);
    }

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
        return $data;
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
		$user_role = $get_roles[0]->slug;
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
                        $memberscount = CommonHelper::mastersMembersCount($table,$autoid, $user_role, $user_id);
                        
                        if($table=='state' || $table=='company_branch')
                        {
                            if($serial == 1)
                            {
                                $nestedData[$newkey] = $newvalue."&nbsp;&nbsp;&nbsp;".'<span class="badge badge pill light-blue mr-10">'.$memberscount.'</span>';
                            }
                            else{
                                $nestedData[$newkey] = $newvalue;
                            }
                            $serial++;
                        }
                        else{

                            if($serial == 0)
                            {
                                $nestedData[$newkey] = $newvalue."&nbsp;&nbsp;&nbsp;".'<span class="badge badge pill light-blue mr-10">'.$memberscount.'</span>';
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
                    if($user_role=='union'){
                        $actions .="&nbsp; <a href='$delete' onclick='return ConfirmDeletion()' ><i class='material-icons' style='color:red;'>delete</i></a></label>";
                    }
                    
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
   
}
