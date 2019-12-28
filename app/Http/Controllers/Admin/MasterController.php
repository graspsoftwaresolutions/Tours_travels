<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Helpers\CommonHelper;
use App\Model\Admin\Country;
use App\Model\Admin\State;
use App\Model\Admin\City;
use App\Model\Admin\Amenities;
use App\Model\Admin\PackageType;

use App\Model\Admin\RoomType;
use App\User;
use DB;
use View;
use Mail;
use URL;
use Response;


class MasterController extends CommonController {

    public function __construct() {
        ini_set('memory_limit', '-1');
        $this->middleware('auth:admin');
        $this->Country = new Country;
        $this->state = new state;
        $this->City = new City;
        $this->User = new User;
        $this->Amenities = new Amenities;
        $this->RoomType = new RoomType;
        $this->PackageType = new PackageType;
    }

    public function countryList() {
        $data['country_view'] = Country::where('status','=','1')->get();
        return view('admin.master.country.country_list')->with('data', $data);
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
            return  redirect('admin/country')->with('error','Country Already Exists'); 
        }
        else{

            $saveCountry = $this->Country->saveCountrydata($data);

            if ($saveCountry == true) {

                if($request->input('masterid')!='')
                {
                    return redirect('admin/country')->with('message', 'Country Name Updated Succesfully');
                }
                else
                {
                    return redirect('admin/country')->with('message', 'Country Name Added Succesfully');
                }
                
            }
        }
    }

    public function countrydestroy($id)
	{
        $Country = new Country();
        $country_booking =  DB::table('booking_master')->where('to_country_id','=',$id)->count();
        $country_city =  DB::table('city')->where('country_id','=',$id)->count();
        $country_hotels =  DB::table('hotels')->where('country_id','=',$id)->count();
        $country_package =  DB::table('package_master')->where('to_country_id','=',$id)->count();
        $country_state =  DB::table('state')->where('country_id','=',$id)->count();
        $website_settings =  DB::table('website_settings')->where('country_id','=',$id)->count();
        
       // $country_count=0;
       // dd($country);
        if($country_booking>0 || $country_city>0 || $country_hotels > 0 || $country_package > 0 || $country_state>0 || $website_settings > 0)
        {
            return redirect('admin/country')->with('error','You cannot delete the country!');
        }
        else{
            $Country->where('id','=',$id)->update(['status'=>'0']);
        }
        return redirect('admin/country')->with('message','Country Details Deleted Successfully!!');
	}

    public function stateList()
    {	
		$data['country_view'] = Country::where('status','=','1')->get();
        return view('admin.master.state.state_list')->with('data',$data);
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
            return  redirect('admin/state')->with('error','State Already Exists'); 
        }
        else{

            $saveState = $this->state->saveStatedata($data);
            
            if ($saveState == true) {
                if($auto_id!='')
                {
                    return redirect('admin/state')->with('message', 'State Name Updated Succesfully');
                }
                else
                {
                    return redirect('admin/state')->with('message', 'State Name Added Succesfully');
                }
            }
        }
    }
	public function statedestroy($id)
	{
        $State = new state();
        $state_booking =  DB::table('booking_master')->where('to_state_id','=',$id)->count();
        $state_city =  DB::table('city')->where('state_id','=',$id)->count();
        $state_hotels =  DB::table('hotels')->where('state_id','=',$id)->count();
        $state_package =  DB::table('package_master')->where('to_state_id','=',$id)->count();
        $website_settings =  DB::table('website_settings')->where('state_id','=',$id)->count();
        
        if($state_booking > 0  || $state_city > 0 || $state_hotels > 0 || $state_package > 0 || $website_settings > 0)
        {
            return redirect('admin/state')->with('error','You cannot delete the state');
        }
        else{
            $State->where('id','=',$id)->update(['status'=>'0']);
            return redirect('admin/state')->with('message','State Details Deleted Successfully!!');
        }
        
	}
	
		
	// City List
	
	public function cityList()
    {
        $data['country_view'] = Country::where('status','=','1')->get();
        $data['state_view'] = State::where('status','=','1')->get();
        return view('admin.master.city.city_list',compact('data',$data));
    }
	
	public function citySave(Request $request)
    {
        $auto_id = $request->input('masterid');
        $request->validate([
            'country_id' => 'required',
			'state_id' => 'required',
            'city_name' => 'required',
            'city_image' => 'required',
                ], [
            'country_id.required' => 'please enter Country name',
			'state_id.required' => 'please enter State name',
            'city_name.required' => 'please enter City name',
            'city_image.required' => 'please select City image',
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
            return  redirect($defdaultLang.'admin/city')->with('error','User Email Already Exists'); 
        }
        else{

            $saveCity = $this->City->saveCitydata($data);

            if ($saveCity == true) {
                if($auto_id!='')
                {
                    return redirect($defdaultLang . 'admin/city')->with('message', 'City Name Updated Succesfully');
                }
                else
                {
                    return redirect($defdaultLang . 'admin/city')->with('message', 'City Name Added Succesfully');
                }
            }
        }
    }
	public function citydestroy($id)
	{
        $city = new City();
        //$City = City::find($id);
        $city_booking =  DB::table('booking_master')->where('to_city_id','=',$id)->count();
        $city_hotels =  DB::table('hotels')->where('city_id','=',$id)->count();
        $city_package =  DB::table('package_master')->where('to_city_id','=',$id)->count(); 
        $website_settings =  DB::table('website_settings')->where('city_id','=',$id)->count();

        $defdaultLang = '';
        if($city_booking  > 0 || $city_hotels > 0 || $city_package > 0 || $website_settings > 0)
        {
            return redirect($defdaultLang.'admin/city')->with('error','You cannot delete the City');
        }
        else{
            $city->where('id','=',$id)->update(['status'=>'0']);
        }
        return redirect($defdaultLang.'admin/city')->with('message','City Details Deleted Successfully!!');
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
            return  redirect('admin/new_amenities')->with('error','Amenities Already Exists'); 
        }
        else{

            $saveAmenities = $this->Amenities->saveAmenitiesdata($data);

            if ($saveAmenities == true) {

                if($request->input('masterid')!='')
                {
                    return redirect('admin/new_amenities')->with('message', 'Amenities Name Updated Succesfully');
                }
                else
                {
                    return redirect('admin/new_amenities')->with('message', 'Amenities Name Added Succesfully');
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
            return redirect('admin/new_amenities')->with('error','You cannot delete the Amenities!');
        }
        else{
            $Amenities->where('id','=',$id)->update(['status'=>'0']);
        }  
        return redirect('admin/new_amenities')->with('message','Amenities Details Deleted Successfully!!');
    }
    public function newRoomType()
    {
        $data['room_type'] = RoomType::where('status','=','1')->get();
        return view('admin.master.roomtype.room_type',compact('data',$data));
    }
    public function roomTypeSave(Request $request)
    {
        $request->validate([
            'room_type' => 'required',
                ], [
            'room_type.required' => 'please enter Room Type name',
        ]);
        $data = $request->all();
        if($request->input('masterid')!=''){
            $data_exists =  RoomType::where([
                 ['room_type','=',$request->input('room_type')],
                 ['id','!=',$request->input('masterid')],
                 ['status','=','1']
                 ])->count();
        }else{
            $data_exists = RoomType::where([
                ['room_type','=',$request->input('room_type')],['status','=','1']
                ])->count();
        }
        if($data_exists>0)
        {
            return  redirect('admin/new_roomtype')->with('error','Room Type Already Exists'); 
        }
        else{

            $saveRoomType = $this->RoomType->saveRoomTypesdata($data);

            if ($saveRoomType == true) {

                if($request->input('masterid')!='')
                {
                    return redirect('admin/new_roomtype')->with('message', 'RoomType Name Updated Succesfully');
                }
                else
                {
                    return redirect('admin/new_roomtype')->with('message', 'saveRoomType Name Added Succesfully');
                } 
            }
        }
    }
    public function roomtypeDestroy($id)
    {
       
        $roomtype_count=0;
        if($roomtype_count>0 )
        {
            return redirect('admin/new_roomtype')->with('error','You cannot delete the Room Type!');
        }
        else{
            $this->RoomType->where('id','=',$id)->update(['status'=>'0']);
        }
        return redirect('admin/new_roomtype')->with('message','Room Type Details Deleted Successfully!!');
    }
    public function packageTypeList()
    {
        $data['packgetype_list'] = PackageType::where('status','=','1')->get();
        return view('admin.package.packagetype.list')->with('data', $data);
    }
    public function packageTypeSave(Request $request)
    {
        $request->validate([
            'package_type' => 'required',
                ], [
            'package_type.required' => 'please enter Package Type',
        ]);
        $data = $request->all();
        if($request->input('masterid')!=''){
            $data_exists =  PackageType::where([
                 ['package_type','=',$request->input('package_type')],
                 ['id','!=',$request->input('masterid')],
                 ['status','=','1']
                 ])->count();
        }else{
            $data_exists = PackageType::where([
                ['package_type','=',$request->input('package_type')],['status','=','1']
                ])->count();
        }
        if($data_exists>0)
        {
            return  redirect('admin/packagetype_list')->with('error','package Type Already Exists'); 
        }
        else{

            $savePackageType = $this->PackageType->savePackageTypedata($data);
            if ($savePackageType == true) {
                if($request->input('masterid')!='')
                {
                    return redirect('admin/packagetype_list')->with('message', 'Package Details Updated Succesfully');
                }
                else
                {
                    return redirect('admin/packagetype_list')->with('message', 'Package Details Added Succesfully');
                }
                
            }
        }
    }
    public function packageTypeDestroy($id)
    {
        $packgetype_count=0;
        if($packgetype_count>0 )
        {
            return redirect('admin.packagetype_list')->with('error','You cannot delete the Packge Type!');
        }
        else{
            
            $this->PackageType->where('id','=',$id)->update(['status'=>'0']);
        }
        return redirect('admin/packagetype_list')->with('message','Package Type Details Deleted Successfully!!');
    }
}
