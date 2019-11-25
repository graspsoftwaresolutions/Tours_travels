<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Helpers\CommonHelper;
use App\Model\Country;
use App\Model\State;
use App\Model\City;
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
    }

    public function countryList() {
        $data['country_view'] = Country::all();
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

    public function countrydestroy($lang,$id)
	{
        $Country = new Country();
        $country_member =  DB::table('membership as m')->where('m.country_id','=',$id)->count();
        $country_guar =  DB::table('member_guardian as mg')->where('mg.country_id','=',$id)->count();
        $country_nominee =  DB::table('member_nominees as mn')->where('mn.country_id','=',$id)->count();
        $country_company =  DB::table('company_branch as cb')->where('cb.country_id','=',$id)->count();
        $country_state =  DB::table('state as s')->where('s.country_id','=',$id)->count();
        $country_union =  DB::table('union_branch as ub')->where('ub.country_id','=',$id)->count();
        
       // dd($country);
        if($country_member > 0 || $country_guar > 0 || $country_guar > 0 || $country_nominee > 0 || $country_company > 0 || $country_state > 0 ||  $country_union > 0 )
        {
            $defdaultLang = app()->getLocale();
            return redirect($defdaultLang.'/country')->with('error','You cannot delete the country!');
        }
        else{
            $Country->where('id','=',$id)->update(['status'=>'0']);
        }
       
        $defdaultLang = app()->getLocale();
        return redirect($defdaultLang.'/country')->with('message','Country Details Deleted Successfully!!');
	}

    public function stateList()
    {	
		$data['country_view'] = Country::where('status','=','1')->get();
        return view('master.state.state_list')->with('data',$data);
    }
	
	
	public function stateSave(Request $request)
    {

        $request->validate([
            'country_id' => 'required',
			'state_name' => 'required',
                ], [
            'country_id.required' => 'please enter Country name',
			'state_name.required' => 'please enter State name',
        ]);
        $data = $request->all();   
        $defdaultLang = app()->getLocale();

        if(!empty($request->id)){
            $data_exists = $this->mailExists($request->input('state_name'),$request->id);
        }else{
            $data_exists = $this->mailExists($request->input('state_name'));       
        }
        if($data_exists>0)
        {
            return  redirect($defdaultLang.'/state')->with('error','User Email Already Exists'); 
        }
        else{

            $saveState = $this->state->saveStatedata($data);
            
            if ($saveState == true) {
                if(!empty($request->id))
                {
                    return redirect($defdaultLang . '/state')->with('message', 'State Name Updated Succesfully');
                }
                else
                {
                    return redirect($defdaultLang . '/state')->with('message', 'State Name Added Succesfully');
                }
            }
        }
    }
	public function statedestroy($lang,$id)
	{
        $State = new state();
        //$State = state::find($id);
        $state_membership =  DB::table('membership as m')->where('m.state_id','=',$id)->count();
        $state_member_gua =  DB::table('member_guardian as mg')->where('mg.state_id','=',$id)->count();
        $state_member_nomi =  DB::table('member_nominees as mn')->where('mn.state_id','=',$id)->count();
        $state_company_bran =  DB::table('company_branch as cb')->where('cb.state_id','=',$id)->count();
        $state_union_bran =  DB::table('union_branch as ub')->where('ub.state_id','=',$id)->count();

        $defdaultLang = app()->getLocale();
        if($state_membership > 0 || $state_member_gua > 0 || $state_member_nomi > 0  || $state_company_bran > 0 ||  $state_union_bran > 0)
        {
            return redirect($defdaultLang.'/state')->with('error','You cannot delete the state');
        }
        else{
            $State->where('id','=',$id)->update(['status'=>'0']);
        }
        return redirect($defdaultLang.'/state')->with('message','State Details Deleted Successfully!!');
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
        $defdaultLang = app()->getLocale();

        if(!empty($request->id)){
            $data_exists = $this->mailExists($request->input('city_name'),$request->id);
        }else{
            $data_exists = $this->mailExists($request->input('city_name'));
        }
        if($data_exists>0)
        {
            return  redirect($defdaultLang.'/city')->with('error','User Email Already Exists'); 
        }
        else{

            $saveCity = $this->City->saveCitydata($data);

            if ($saveCity == true) {
                if(!empty($request->id))
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
	public function citydestroy($lang,$id)
	{
        $city = new City();
        $City = City::find($id);
        $City_membership =  DB::table('membership as m')->where('m.city_id','=',$id)->count();
        $City_member_gua =  DB::table('member_guardian as mg')->where('mg.city_id','=',$id)->count();
        $City_member_nomi =  DB::table('member_nominees as mn')->where('mn.city_id','=',$id)->count();
        $City_company_bran =  DB::table('company_branch as cb')->where('cb.city_id','=',$id)->count();
        $City_union_bran =  DB::table('union_branch as ub')->where('ub.city_id','=',$id)->count();

        $defdaultLang = app()->getLocale();
        if($City_membership > 0 || $City_member_gua > 0 || $City_member_nomi > 0 || $City_company_bran  > 0 || $City_union_bran > 0)
        {
            return redirect($defdaultLang.'/city')->with('error','You cannot delete the City');
        }
        else{
            $city->where('id','=',$id)->update(['status'=>'0']);
        }
        return redirect($defdaultLang.'/city')->with('message','City Details Deleted Successfully!!');
	}
    
   
    
}
