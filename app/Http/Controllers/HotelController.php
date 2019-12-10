<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Country;
use App\Model\State;
use App\Model\City;
use App\Model\Hotel;
use App\Model\HotelRooms;
use App\Model\HotelRoomsImages;
use DB;
use App\Model\Amenities;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

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
        $hotel->status = 1;
        $hotel->save();

        $files = $request->file('hotel_images');
        if($request->hasFile('hotel_images'))
        {
            $slno = 1;
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $imageName = $hotel->id.'_'.date('Ymdhis').$slno.'.'.$extension;
                $file->storeAs('hotels' , $imageName  ,'local');

                DB::table('hotel_images')->insert(
                    ['hotel_id' => $hotel->id, 'image_name' => $imageName]
                );
                $slno++;
            }
        }
        $amenities = $request->input('amenities');
        
        if(isset($amenities)){
            foreach ($amenities as $amenity) {
                DB::table('hotel_amenities')->insert(
                    ['hotel_id' => $hotel->id, 'amenity_id' => $amenity]
                );
            }
        }
    //    / dd( $amenities);

          $check_room_type = $request->input('room_typ');
          if(isset($check_room_type))
          {
             $room_count = count($request->input('room_typ'));
              for($i=0;$i<$room_count;$i++)
              {
                    $price = $request->input('price')[$i];
                    $room_type = $request->input('room_typ')[$i];
                    DB::table('hotel_roomtypes')->insert(
                                    ['hotel_id' => $hotel->id, 'roomtype_id' => $room_type, 'price' => $price]
                                );
              }
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
        $data['hote_roomtype_data'] =  DB::table('hotel_roomtypes as room')->select('hot.id as hotelid','hot.hotel_name','room.hotel_id as roomhotelid','room.roomtype_id','room.price','room.id as roomtypeid','roomtype.room_type','roomtype.id as roomtypid') 
                                        ->leftjoin('hotels as hot','room.hotel_id','=','hot.id')
                                        ->leftjoin('room_type as roomtype','room.roomtype_id','=','roomtype.id')
                                        ->where('hotel_id','=', $autoid)->get();
        $data['hotel_images'] = DB::table('hotel_images')->where('hotel_id','=', $autoid)->get();
        return view('hotels.edit',compact('data',$data));
    }

    public function newHotelRoom()
    {
        $data['room_list'] = DB::table('hotel_rooms as hr')->select('hr.id as hotelroomid','h.hotel_name','rt.room_type','hr.room_number','hr.status as roomstatus','s.state_name','c.city_name')
                            ->leftjoin('hotels as h','h.id','=','hr.hotel_id')
                            ->leftjoin('room_type as rt','rt.id','=','hr.roomtype_id') 
                            ->leftjoin('state as s','h.state_id','=','s.id')
                            ->leftjoin('city as c','h.city_id','=','c.id')
                            ->get();
        return view('hotels.rooms.rooms_list',compact('data',$data));
    }
    
    public function addHotelRoom()
    {
        $data['hotel_view'] = DB::table('hotels')->where('status','=','1')->get();
        $data['roomtype_view'] = DB::table('room_type')->where('status','=','1')->get();
        return view('hotels.rooms.add_room')->with('data',$data);
    }

    public function imageDelete(Request $request){
        $imageid = $request->input('image_id');
        $image_name = DB::table('hotel_images')->where('id','=', $imageid)->pluck('image_name')->first();
        $image_url = storage_path('/app/hotels/'.$image_name);
        if(file_exists($image_url)){
            \File::delete($image_url);
        }
       
        DB::table('hotel_images')->where('id', '=', $imageid)->delete();
        return ['status' => 1, 'message'=>'image deleted Successfully'];
    }
    public function RoomimageDelete(Request $request)
    {
        $imageid = $request->input('image_id');
        $image_name = DB::table('hotel_room_images')->where('id','=', $imageid)->pluck('image_name')->first();
        $image_url = storage_path('/app/hotels/rooms/'.$image_name);
        if(file_exists($image_url)){
            \File::delete($image_url);
        } 
        DB::table('hotel_room_images')->where('id', '=', $imageid)->delete();
        return ['status' => 1, 'message'=>'image deleted Successfully'];
    }

    public function hotelUpdate(Request $request){
        //return $request->all();
        $request->validate([
            'hotel_name' => 'required',
                ], [
            'hotel_name.required' => 'please enter Hotel name',
        ]);
        $autoid = $request->input('autoid');
        $hotel = Hotel::find($autoid);

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
        $hotel->status = 1;
        $hotel->save();

        $files = $request->file('hotel_images');
        if($request->hasFile('hotel_images'))
        {
            
            $slno = 1;
            foreach ($files as $file) {
                $extension = $file->getClientOriginalExtension();
                $imageName = $hotel->id.'_'.date('Ymdhis').$slno.'.'.$extension;
                $file->storeAs('hotels' , $imageName  ,'local');

                DB::table('hotel_images')->insert(
                    ['hotel_id' => $hotel->id, 'image_name' => $imageName]
                );
                $slno++;
            }
        }

        $amenities = $request->input('amenities');

        $hotel->amenities()->sync($amenities);
        
        // if(isset($amenities)){
        //     foreach ($amenities as $amenity) {
        //         DB::table('hotel_amenities')->insertOrIgnore(
        //             ['hotel_id' => $hotel->id, 'amenity_id' => $amenity]
        //         );
        //     }
        // }
    //    / dd( $amenities);

        // $room_type = $request->input('room_typ');
        // $hotel->roomtypes()->sync($room_type);
        // if(isset($room_type)){
        //     foreach ($room_type as $type) {
        //         DB::table('hotel_roomtypes')->insertOrIgnore(
        //             ['hotel_id' => $hotel->id, 'roomtype_id' => $type]
        //         );
        //     }
        // }
        $check_room_type = $request->input('room_typ');
        if(isset($check_room_type))
        {
           $room_count = count($request->input('room_typ'));
            for($i=0;$i<$room_count;$i++)
            {  
                  $price = $request->input('price')[$i];
                  $room_type = $request->input('room_typ')[$i];
                  DB::table('hotel_roomtypes')->insert(
                                  ['hotel_id' => $hotel->id, 'roomtype_id' => $room_type, 'price' => $price]
                              );
            }
        }
        //$file_name = $hotel->id.strtotime('Ymd');
        // $imageName = $hotel->id.time().'.'.$request->hotel_images->getClientOriginalExtension();

        // if(Input::hasFile('file')){
        //     $file = $request->file('hotel_images')->storeAs('hotels', $imageName  ,'local');
        // }

        return redirect('/hotels')->with('message','Hotel Details Updated Successfully!!');
    }
    public function hotelroomSave(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required',
            'roomtype_id' => 'required',
            'room_number' => 'required',
            'room_no_of_beds' => 'required',
            'status' => 'required',
                ], [
            'hotel_id.required' => 'please select Hotel name',
            'roomtype_id.required' => 'please select Room Type name',
            'room_number.required' => 'please Enter room number',
            'room_no_of_beds.required' => 'please Enter no of beds',
            'status.required' => 'please select Status name',
        ]);
        $data = $request->all();
        if(!empty($data))
        {
            $Roomsavedata = new HotelRooms();
            $Roomsavedata['hotel_id'] = $request->hotel_id;
            $Roomsavedata['roomtype_id'] = $request->roomtype_id;
            $Roomsavedata['room_number'] = $request->room_number;
            $Roomsavedata['room_no_of_beds'] = $request->room_no_of_beds;
            $Roomsavedata['status'] = $request->status;
            $Roomsavedata->save();
            $last_id = $Roomsavedata->id;

            if($last_id)
            {
                if($request->hasfile('image_name'))
                {
                    // $rules = array(
                    //     'image_name' => 'required|mimes:jpeg,png,jpg',
                    // );
                   // $validator = Validator::make($request->all(), $rules);
                    //return Redirect::back()->withInput($request->all())->withErrors($validator);
                    // if($validator->fails())
                    // {
                    //     return back()->withErrors($validator);
                    // }
                    // request()->validate([

                    //     'image_name' => 'mimes:jpeg,png,jpg|max:2048|dimensions:max_width=1200,max_height=700',
            
                    // ]);

                    $slno = 1;
                    foreach ($request->file('image_name') as $file) {
                        $extension = $file->getClientOriginalExtension();
                        $imageName = $last_id.'_'.date('Ymdhis').$slno.'.'.$extension;
                        $file->storeAs('hotels' , $imageName  ,'local');
        
                        DB::table('hotel_room_images')->insert(
                            ['hotel_id' => $last_id, 'image_name' => $imageName]
                        );
                        $slno++;
                    }
                }      
            }
        }
        return redirect('/hotel_room')->with('message','Room Details Added Successfully!!');
    }
    public function hotelroomEdit($id)
    {
         $id = Crypt::decrypt($id);
         $data['hotel_view'] = DB::table('hotels')->where('status','=','1')->get();
         $data['roomtype_view'] = DB::table('room_type')->where('status','=','1')->get();
         $data['room_list'] = DB::table('hotel_rooms')
         ->where('id','=',$id)
         ->get();
        $data['images'] = DB::table('hotel_room_images')->where('hotel_id','=',$id)->get();
       // dd($data['images']);
        return view('hotels.rooms.edit_room',compact('data',$data));
    }
    public function hotelRoomsEdit(Request $request)
    {
        $request->validate([
            'hotel_id' => 'required',
            'roomtype_id' => 'required',
            'room_number' => 'required',
            'room_no_of_beds' => 'required',
            'status' => 'required',
                ], [
            'hotel_id.required' => 'please select Hotel name',
            'roomtype_id.required' => 'please select Room Type name',
            'room_number.required' => 'please Enter room number',
            'room_no_of_beds.required' => 'please Enter no of beds',
            'status.required' => 'please select Status name',
        ]);
        $autoid = $request->input('hotelroomid');
        $hotel = HotelRooms::find($autoid);
        
        $hotel->hotel_id = $request->input('hotel_id');
        $hotel->roomtype_id = $request->input('roomtype_id');
        $hotel->room_number = $request->input('room_number');
        $hotel->room_no_of_beds = $request->input('room_no_of_beds');
        $hotel->status = $request->input('status');
        $hotel->save();

        if($request->hasfile('image_name'))
                {
                    $s1 = 0;
                    $slno = 1;
                    foreach ($request->file('image_name') as $file) {
                        $extension = $file->getClientOriginalExtension();
                        $imageName = $last_id.'_'.date('Ymdhis').$slno.'.'.$extension;
                        $file->storeAs('hotels' , $imageName  ,'local');
        
                        DB::table('hotel_room_images')->insert(
                            ['hotel_id' => $last_id, 'image_name' => $imageName]
                        );
                        $slno++;
                    }
                }
                return redirect('/hotel_room')->with('message','Room Details Updated Successfully!!');
    }
    public function deleteRoomtype(Request $request){
        $delete = DB::table('hotel_roomtypes')->where('id','=',$request->roomtype_id)->delete();
        $returndata = array('message' => '', 'data' => ''); 
        if($delete){
            $returndata = array('message' => 'Room Type data deleted successfully', 'data' => '');
        }else{
            $returndata = array('message' => 'Failed to delete', 'data' => '');
            
        }
        echo json_encode($returndata);
    }
}
