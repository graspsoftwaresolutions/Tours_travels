<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Country;
use App\Model\Admin\State;
use App\Model\Admin\City;
use App\Model\Admin\Hotel;
use App\Model\Admin\HotelRooms;
use App\Model\Admin\HotelRoomsImages;
use App\Model\Admin\Amenities;
use DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Redirect,Response,File;

class HotelController extends CommonController
{
    public function __construct()
	{
	    $this->middleware('auth:admin');
	}

	public function index()
    {
        $data['country_view'] = Country::where('status','=','1')->get();
        $data['features_view'] = DB::table('amenities')->where('status','=','1')->get();
        $data['types_view'] = DB::table('room_type')->where('status','=','1')->get();
        $data['state_view'] = State::where('status','=','1')->get();
        return view('admin.hotels.new',compact('data',$data));
    }

    public function newAmnities()
    {
        $data['amenities_list'] = Amenities::where('status','=','1')->get(); 
        return view('admin.master.amenities.amenities',compact('data',$data));
    }   

    public function hotelSave(Request $request){
        $request->validate([
            'hotel_name' => 'required',
                ], [
            'hotel_name.required' => 'please enter Hotel name',
        ]);
        $hotel = new Hotel();

        $hotel->hotel_name = ucfirst($request->input('hotel_name'));
        $hotel->contact_name = $request->input('contact_name');
        $hotel->contact_email = $request->input('contact_email');
        $hotel->country_id = $request->input('country_id');
        $hotel->state_id = $request->input('state_id');
        $hotel->city_id = $request->input('city_id');
        $hotel->address_one = $request->input('address_one');
        $hotel->address_two = $request->input('address_two');
        $hotel->ratings = $request->input('ratings');
        $hotel->overview = $request->input('overview');
        $hotel->listing_descriptions = $request->input('listing_descriptions');
        $hotel->status = 1;
        $hotel->save();

        $files = $request->file('hotel_images');
        if($request->hasFile('hotel_images'))
        {
            // request()->validate([
            //     'hotel_images' => 'required',
            //     'hotel_images.*' => 'mimes:png,jpg'
            //   ]);
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
                    $description = $request->input('description')[$i];
                    DB::table('hotel_roomtypes')->insert(
                                    ['hotel_id' => $hotel->id, 'roomtype_id' => $room_type, 'price' => $price ,'description' => $description]
                    );
              }
          }
        //$file_name = $hotel->id.strtotime('Ymd');
        // $imageName = $hotel->id.time().'.'.$request->hotel_images->getClientOriginalExtension();

        // if(Input::hasFile('file')){
        //     $file = $request->file('hotel_images')->storeAs('hotels', $imageName  ,'local');
        // }

        return redirect('admin/hotels')->with('message','Hotel Details Added Successfully!!');
    }

    public function hotelList(){
        $data = [];
        return view('admin.hotels.list')->with('data',$data);
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
        $data['hote_roomtype_data'] =  DB::table('hotel_roomtypes as room')->select('hot.id as hotelid','hot.hotel_name','room.hotel_id as roomhotelid','room.roomtype_id','room.price','room.id as roomtypeid','roomtype.room_type','roomtype.id as roomtypid','room.description') 
                                        ->leftjoin('hotels as hot','room.hotel_id','=','hot.id')
                                        ->leftjoin('room_type as roomtype','room.roomtype_id','=','roomtype.id')
                                        ->where('hotel_id','=', $autoid)->get();
        $data['hotel_images'] = DB::table('hotel_images')->where('hotel_id','=', $autoid)->get();
        return view('admin.hotels.edit',compact('data',$data));
    }

    public function newHotelRoom()
    {
        $data['room_list'] = DB::table('hotel_rooms as hr')->select('hr.id as hotelroomid','h.hotel_name','rt.room_type','hr.room_number','hr.status as roomstatus','s.state_name','c.city_name')
                            ->leftjoin('hotels as h','h.id','=','hr.hotel_id')
                            ->leftjoin('room_type as rt','rt.id','=','hr.roomtype_id') 
                            ->leftjoin('state as s','h.state_id','=','s.id')
                            ->leftjoin('city as c','h.city_id','=','c.id')
                            ->get();
        return view('admin.hotels.rooms.rooms_list',compact('data',$data));
    }
    
    public function addHotelRoom()
    {
        $data['hotel_view'] = DB::table('hotels')->where('status','=','1')->get();
        $data['roomtype_view'] = DB::table('room_type')->where('status','=','1')->get();
        return view('admin.hotels.rooms.add_room')->with('data',$data);
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
        $image_url = storage_path('/app/hotels/room/'.$image_name);
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

        $hotel->hotel_name = ucfirst($request->input('hotel_name'));
        $hotel->contact_name = $request->input('contact_name');
        $hotel->contact_email = $request->input('contact_email');
        $hotel->country_id = $request->input('country_id');
        $hotel->state_id = $request->input('state_id');
        $hotel->city_id = $request->input('city_id');
        $hotel->address_one = $request->input('address_one');
        $hotel->address_two = $request->input('address_two');
        $hotel->ratings = $request->input('ratings');
        $hotel->overview = $request->input('overview');
        $hotel->listing_descriptions = $request->input('listing_descriptions');
        $hotel->status = 1;
        $hotel->save();

        $files = $request->file('hotel_images');
        if($request->hasFile('hotel_images'))
        {
            // request()->validate([
            //     'hotel_images' => 'required',
            //     'hotel_images.*' => 'mimes:png,jpg'
            //   ]);
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
        $roomid = $request->roomid;
        
         if($roomid!='')
         {
            //  $data = $request->all();
            //  dd($data);
            //dd($autoid);
            $check_roomtypeid_db = $request->input('roomtypeid_db');
            $check_room_type = $request->input('edithotelroomtypeid');
            $editprice = $request->input('editrromtypeprice');
            $editdescription = $request->input('editdescription');
            if(isset($check_roomtypeid_db))
            {
                DB::connection()->enableQueryLog();
                $room_count = count($request->input('roomtypeid_db'));
               // dd($check_room_type);
                for($i=0;$i<$room_count;$i++)
                {
                    $autoid = $request->input('roomtypeid_db')[$i];
                    $roomtype_id = $request->input('edithotelroomtypeid')[$i];
                    $price = $request->input('editrromtypeprice')[$i];
                    $description = $request->input('editdescription')[$i];
                   // dd($autoid.$description);
                    $result =  DB::table('hotel_roomtypes')->where('id','=',$autoid)->update([ 'roomtype_id' => $roomtype_id , 'price' => $price ,'description' => $description]);
                }
            }
            
         }
         else{
            $check_room_type = $request->input('room_typ');
            
            if(isset($check_room_type))
            {
               $room_count = count($request->input('room_typ'));
                for($i=0;$i<$room_count;$i++)
                {
                      $price = $request->input('addprice')[$i];
                      $room_type = $request->input('room_typ')[$i];
                      $description  = $request->input('description')[$i];
                      DB::table('hotel_roomtypes')->insert(
                                      ['hotel_id' => $hotel->id, 'roomtype_id' => $room_type, 'price' => $price , 'description' => $description]
                                  );
                }
            }
         }
        return redirect('admin/hotels')->with('message','Hotel Details Updated Successfully!!');
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

                    //    // 'image_name' => 'mimes:jpeg,png,jpg|max:2048|dimensions:max_width=1200,max_height=700',
                    //    'image_name' => 'image|mimes:jpg'
                    // ]);

                    $slno = 1;
                    foreach ($request->file('image_name') as $file) {
                        $extension = $file->getClientOriginalExtension();
                        $imageName = $last_id.'_'.date('Ymdhis').$slno.'.'.$extension;
                        $file->storeAs('hotels/room' , $imageName  ,'local');
        
                        DB::table('hotel_room_images')->insert(
                            ['hotel_id' => $last_id, 'image_name' => $imageName]
                        );
                        $slno++;
                    }
                }
            }
        }
        return redirect('admin/hotel_room')->with('message','Room Details Added Successfully!!');
    }
    public function hotelroomEdit($id)
    {
        //return 1;
         $id = Crypt::decrypt($id);
         $data['hotel_view'] = DB::table('hotels')->where('status','=','1')->get();
         $data['roomtype_view'] = DB::table('room_type')->where('status','=','1')->get();
         $data['room_list'] = DB::table('hotel_rooms')
         ->where('id','=',$id)
         ->get();
        $data['images'] = DB::table('hotel_room_images')->where('hotel_id','=',$id)->get();
       // dd($data['images']);
        return view('admin.hotels.rooms.edit_room',compact('data',$data));
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
                        $imageName = $autoid.'_'.date('Ymdhis').$slno.'.'.$extension;
                        $file->storeAs('hotels\room' , $imageName  ,'local');
        
                        DB::table('hotel_room_images')->insert(
                            ['hotel_id' => $autoid, 'image_name' => $imageName]
                        );
                        $slno++;
                    }
                }
                return redirect('admin/hotel_room')->with('message','Room Details Updated Successfully!!');
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
    public function hotelDestroy($eid)
    { 
        $id = Crypt::decrypt($eid);
        $Hotel = new Hotel();
        $package_hotel =  DB::table('package_hotel')->where('hotel_id','=',$id)->count();
        $hotel_amenities =  DB::table('hotel_amenities')->where('hotel_id','=',$id)->count();
        $hotel_rooms =  DB::table('hotel_rooms')->where('hotel_id','=',$id)->count();
        $hotel_roomtypes =  DB::table('hotel_roomtypes')->where('hotel_id','=',$id)->count();
        if($package_hotel > 0  || $hotel_amenities > 0 || $hotel_rooms > 0 || $hotel_roomtypes > 0)
        {
            return redirect('admin/hotels')->with('error','You cannot delete the Hotel');
        }
        else{
            $Hotel->where('id','=',$id)->update(['status'=>'0']);
            $image_name = DB::table('hotel_images')->where('hotel_id','=', $id)->select('image_name')->get();
               
               foreach($image_name as $values )
               {
                 $image_url = storage_path('/app/hotels/'.$values->image_name);
                    if(file_exists($image_url)){
                        \File::delete($image_url);
                    }
               }
            $hotel_images = DB::table('hotel_images')->where('hotel_id','=',$id)->delete();
            return redirect('admin/hotels')->with('message','Hotel Details Deleted Successfully!!');
        }
    }

}
