<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Helpers\CommonHelper;
use App\Model\Country;
use App\Model\State;
use App\Model\City;
use App\Model\Amenities;
use App\User;
use DB;
use View;
use Mail;
use URL;
use Response;


class MasterController extends CommonController {

    public function __construct() {
        ini_set('memory_limit', '-1');
        $this->middleware('auth');
        $this->Country = new Country;
        $this->state = new state;
        $this->City = new City;
        $this->User = new User;
        $this->Amenities = new Amenities;
    }

    public function countryList() {
        $data['country_view'] = Country::where('status','=','1')->get();
        return view('master.country.country_list')->with('data', $data);
    }


    public function countrySave(Request $request)
    {

        $request->validate([
            'country_name' => 'required',
                ], [
            'country_name.required' => 'please enter Country name',
        ]);
        $data = $request->all();   
       

        if($request->input('masterid')!=''){
            $data_exists =  Country::where([
                 ['country_name','=',$request->input('country_name')],
                 ['id','!=',$request->input('masterid')],
                 ['status','=','1']
                 ])->count();
        }else{
            $data_exists = Country::where([
                ['country_name','=',$request->input('country_name')],['status','=','1']
                ])->count();
        }
        if($data_exists>0)
        {
            return  redirect('/country')->with('error','Country Already Exists'); 
        }
        else{

            $saveCountry = $this->Country->saveCountrydata($data);

            if ($saveCountry == true) {

                if($request->input('masterid')!='')
                {
                    return redirect('/country')->with('message', 'Country Name Updated Succesfully');
                }
                else
                {
                    return redirect('/country')->with('message', 'Country Name Added Succesfully');
                }
                
            }
        }
    }

    public function countrydestroy($id)
	{
        $Country = new Country();
        // $country_member =  DB::table('membership as m')->where('m.country_id','=',$id)->count();
        // $country_guar =  DB::table('member_guardian as mg')->where('mg.country_id','=',$id)->count();
        // $country_nominee =  DB::table('member_nominees as mn')->where('mn.country_id','=',$id)->count();
        // $country_company =  DB::table('company_branch as cb')->where('cb.country_id','=',$id)->count();
        // $country_state =  DB::table('state as s')->where('s.country_id','=',$id)->count();
        // $country_union =  DB::table('union_branch as ub')->where('ub.country_id','=',$id)->count();
        $country_count=0;
       // dd($country);
        if($country_count>0 )
        {
            return redirect('country')->with('error','You cannot delete the country!');
        }
        else{
            $Country->where('id','=',$id)->update(['status'=>'0']);
        }
       
        
        return redirect('/country')->with('message','Country Details Deleted Successfully!!');
	}

    public function stateList()
    {	
		$data['country_view'] = Country::where('status','=','1')->get();
        return view('master.state.state_list')->with('data',$data);
    }
	
	
	public function stateSave(Request $request)
    {
        $auto_id = $request->input('masterid');
        $request->validate([
            'country_id' => 'required',
			'state_name' => 'required',
                ], [
            'country_id.required' => 'please enter Country name',
			'state_name.required' => 'please enter State name',
        ]);
        $data = $request->all();   
        

        if($auto_id!=''){
            $data_exists = State::where([
                        ['state_name','=',$request->input('state_name')],
                        ['country_id','=',$request->input('country_id')],
                        ['id','!=',$auto_id],
                        ['status','=','1']
                        ])->count();
        }else{
            $data_exists = State::where([
                ['state_name','=',$request->input('state_name')],
                ['country_id','=',$request->input('country_id')],
                ['status','=','1'],     
                ])->count(); 
        }
        if($data_exists>0)
        {
            return  redirect('/state')->with('error','State Already Exists'); 
        }
        else{

            $saveState = $this->state->saveStatedata($data);
            
            if ($saveState == true) {
                if($auto_id!='')
                {
                    return redirect('/state')->with('message', 'State Name Updated Succesfully');
                }
                else
                {
                    return redirect('/state')->with('message', 'State Name Added Succesfully');
                }
            }
        }
    }
	public function statedestroy($id)
	{
        $State = new state();
        //$State = state::find($id);
        // $state_membership =  DB::table('membership as m')->where('m.state_id','=',$id)->count();
        // $state_member_gua =  DB::table('member_guardian as mg')->where('mg.state_id','=',$id)->count();
        // $state_member_nomi =  DB::table('member_nominees as mn')->where('mn.state_id','=',$id)->count();
        // $state_company_bran =  DB::table('company_branch as cb')->where('cb.state_id','=',$id)->count();
        // $state_union_bran =  DB::table('union_branch as ub')->where('ub.state_id','=',$id)->count();

        $statecount=0;

       
        if($statecount > 0 )
        {
            return redirect('/state')->with('error','You cannot delete the state');
        }
        else{
            $State->where('id','=',$id)->update(['status'=>'0']);
        }
        return redirect('/state')->with('message','State Details Deleted Successfully!!');
	}
	
		
	// City List
	
	public function cityList()
    {
        $data['country_view'] = Country::where('status','=','1')->get();
        $data['state_view'] = State::where('status','=','1')->get();
        return view('master.city.city_list',compact('data',$data));
    }
	
	public function citySave(Request $request)
    {
        $auto_id = $request->input('masterid');
        $request->validate([
            'country_id' => 'required',
			'state_id' => 'required',
			'city_name' => 'required',
                ], [
            'country_id.required' => 'please enter Country name',
			'state_id.required' => 'please enter State name',
			'city_name.required' => 'please enter City name',
        ]);
        $data = $request->all();   
        $defdaultLang = '';

        if($auto_id!=''){
            $data_exists = City::where([
                ['city_name','=',$request->input('city_name')],
                ['state_id','=',$request->input('state_id')],
                ['id','!=',$auto_id],
                ['status','=','1']
                ])->count();
        }else{
            $data_exists = City::where([
                        ['city_name','=',$request->input('city_name')],
                        ['country_id','=',$request->input('country_id')],
                        ['state_id','=',$request->input('state_id')],
                        ['status','=','1'],     
                        ])->count(); 
        }
        if($data_exists>0)
        {
            return  redirect($defdaultLang.'/city')->with('error','User Email Already Exists'); 
        }
        else{

            $saveCity = $this->City->saveCitydata($data);

            if ($saveCity == true) {
                if($auto_id!='')
                {
                    return redirect($defdaultLang . '/city')->with('message', 'City Name Updated Succesfully');
                }
                else
                {
                    return redirect($defdaultLang . '/city')->with('message', 'City Name Added Succesfully');
                }
            }
        }
    }
	public function citydestroy($id)
	{
        $city = new City();
        $City = City::find($id);
        // $City_membership =  DB::table('membership as m')->where('m.city_id','=',$id)->count();
        // $City_member_gua =  DB::table('member_guardian as mg')->where('mg.city_id','=',$id)->count();
        // $City_member_nomi =  DB::table('member_nominees as mn')->where('mn.city_id','=',$id)->count();
        // $City_company_bran =  DB::table('company_branch as cb')->where('cb.city_id','=',$id)->count();
        // $City_union_bran =  DB::table('union_branch as ub')->where('ub.city_id','=',$id)->count();

        $City_count = 0;
        $defdaultLang = '';
        if($City_count > 0)
        {
            return redirect($defdaultLang.'/city')->with('error','You cannot delete the City');
        }
        else{
            $city->where('id','=',$id)->update(['status'=>'0']);
        }
        return redirect($defdaultLang.'/city')->with('message','City Details Deleted Successfully!!');
    }
    
    public function amenitiesSave(Request $request)
    {
        $request->validate([
            'amenities_name' => 'required',
                ], [
            'amenities_name.required' => 'please enter Amenities name',
        ]);
        $data = $request->all();
        if($request->input('masterid')!=''){
            $data_exists =  Amenities::where([
                 ['amenities_name','=',$request->input('amenities_name')],
                 ['id','!=',$request->input('masterid')],
                 ['status','=','1']
                 ])->count();
        }else{
            $data_exists = Amenities::where([
                ['amenities_name','=',$request->input('amenities_name')],['status','=','1']
                ])->count();
        }
        if($data_exists>0)
        {
            return  redirect('/new_amenities')->with('error','Amenities Already Exists'); 
        }
        else{

            $saveAmenities = $this->Amenities->saveAmenitiesdata($data);

            if ($saveAmenities == true) {

                if($request->input('masterid')!='')
                {
                    return redirect('/new_amenities')->with('message', 'Amenities Name Updated Succesfully');
                }
                else
                {
                    return redirect('/new_amenities')->with('message', 'Amenities Name Added Succesfully');
                } 
            }
        }
    }
    public function amenitiesdestroy($id)
    {
        $Amenities = new Amenities();
        $amenities_count=0;
        if($amenities_count>0 )
        {
            return redirect('new_amenities')->with('error','You cannot delete the Amenities!');
        }
        else{
            $Amenities->where('id','=',$id)->update(['status'=>'0']);
        }  
        return redirect('/new_amenities')->with('message','Amenities Details Deleted Successfully!!');
    }
    public function newRoomType()
    {
        return view('master.roomtype.room_type');
    }  
}
