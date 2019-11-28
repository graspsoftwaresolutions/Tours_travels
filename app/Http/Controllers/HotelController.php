<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Country;
use App\Model\State;
use App\Model\City;
use App\Model\Hotel;
use DB;
use App\Model\Amenities;
use Illuminate\Support\Facades\Crypt;

class HotelController extends CommonController
{
    public function __construct()
	{
	    $this->middleware('auth');
	}

	public function index()
    {
        $data['country_view'] = Country::where('status','=','1')->get();
        $data['features_view'] = DB::table('amenities')->where('status','=','1')->get();
        $data['types_view'] = DB::table('room_type')->where('status','=','1')->get();
        $data['state_view'] = State::where('status','=','1')->get();
        return view('hotels.new',compact('data',$data));
    }

    public function newAmnities()
    {
        $data['amenities_list'] = Amenities::where('status','=','1')->get(); 
        return view('master.amenities.amenities',compact('data',$data));
    }

    public function hotelSave(Request $request){
        $request->validate([
            'hotel_name' => 'required',
                ], [
            'hotel_name.required' => 'please enter Hotel name',
        ]);
        $hotel = new Hotel();

        $hotel->hotel_name = $request->input('hotel_name');
        $hotel->contact_name = $request->input('contact_name');
        $hotel->contact_email = $request->input('contact_email');
        $hotel->country_id = $request->input('country_id');
        $hotel->state_id = $request->input('state_id');
        $hotel->city_id = $request->input('city_id');
        $hotel->address_one = $request->input('address_one');
        $hotel->address_two = $request->input('address_two');
        $hotel->overview = $request->input('overview');
        $hotel->listing_descriptions = $request->input('listing_descriptions');
        $hotel->save();

        $files = $request->file('hotel_images');
        if($request->hasFile('hotel_images'))
        {
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $imageName = $hotel->id.'_'.time().'.'.$extension;
                $file->storeAs('hotels' , $imageName  ,'local');

                DB::table('hotel_images')->insert(
                    ['hotel_id' => $hotel->id, 'image_name' => $imageName]
                );
            }
        }

        $amenities = $request->input('amenities');
        
        foreach ($amenities as $amenity) {
            DB::table('hotel_amenities')->insert(
                ['hotel_id' => $hotel->id, 'amenity_id' => $amenity]
            );
        }
    //    / dd( $amenities);

        $room_type = $request->input('room_type');
        foreach ($room_type as $type) {
            DB::table('hotel_roomtypes')->insert(
                ['hotel_id' => $hotel->id, 'roomtype_id' => $type]
            );
        }

        //$file_name = $hotel->id.strtotime('Ymd');
        // $imageName = $hotel->id.time().'.'.$request->hotel_images->getClientOriginalExtension();

        // if(Input::hasFile('file')){
        //     $file = $request->file('hotel_images')->storeAs('hotels', $imageName  ,'local');
        // }

        return redirect('/hotels')->with('message','Hotel Details Added Successfully!!');
    }

    public function hotelList(){
        $data = [];
        return view('hotels.list')->with('data',$data);
    }

    public function EditHotel($encid){
        $autoid = Crypt::decrypt($encid);
        $data['country_view'] = Country::where('status','=','1')->get();
        $data['features_view'] = DB::table('amenities')->where('status','=','1')->get();
        $data['types_view'] = DB::table('room_type')->where('status','=','1')->get();
        $data['state_view'] = State::where('status','=','1')->get();
        $data['hotel_data'] = Hotel::where('id','=',$autoid)->first();
        $data['hotel_features'] = DB::table('hotel_amenities')->where('hotel_id','=', $autoid)->pluck('amenity_id')->toArray();
        $data['hotel_types'] = DB::table('hotel_roomtypes')->where('hotel_id','=', $autoid)->pluck('roomtype_id')->toArray();
        $data['hotel_images'] = DB::table('hotel_images')->where('hotel_id','=', $autoid)->pluck('image_name');
        return view('hotels.edit',compact('data',$data));
    }
}
