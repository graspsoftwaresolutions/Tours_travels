<?php

namespace App\Http\Controllers;
use App\Http\Controllers\API\BaseController as BaseController;

use Illuminate\Http\Request;
use App\Model\Country;
use App\Model\State;
use App\Model\City;
use App\Model\ActivityImages;
use App\Model\Activity;
use App\Model\Enquiry;
use DB;
use Session;
use Illuminate\Support\Facades\Crypt;

class ActivityController extends BaseController
{
	public function __construct()
	{
	    $this->middleware('auth');
	}

    public function index()
    {
        $data['country_view'] = Country::where('status','=','1')->get();
        $data['state_view'] = State::where('status','=','1')->get();
        return view('activity.new',compact('data',$data));
    }
    public function activityList(){
        $data = [];
        return view('activity.list')->with('data',$data);
    }
    public function activitySave(Request $request)
    {
        $request->validate([
            'title_name' => 'required',    
                ], [
            'title_name.required' => 'please enter title name',

        ]);
        $data = $request->all();
        $hours = $request->hours * 60 ;
        $minutes = $request->minutes;
        if(!empty($data))
        {
            $Activitysavedata = new Activity();
            $Activitysavedata['title_name'] = $request->title_name;
            $Activitysavedata['duartion_hours'] = $hours + $minutes ;
            $Activitysavedata['amount'] = $request->amount;
            $Activitysavedata['country_id'] = $request->country_id;
            $Activitysavedata['state_id'] = $request->state_id;
            $Activitysavedata['city_id'] = $request->city_id;
            $Activitysavedata['address_one'] = $request->address_one;
            $Activitysavedata['address_two'] = $request->address_two;
            $Activitysavedata['zip_code'] = $request->zip_code;
            $Activitysavedata['langitude'] = $request->langitude;
            $Activitysavedata['latitude'] = $request->latitude;
            $Activitysavedata['short_description'] = $request->short_description;
            $Activitysavedata['overview'] = $request->overview;
            $Activitysavedata['additional_info'] = $request->additional_info;
            $exclusion['datain'] = $request->inclusion_name;
            $Activitysavedata['inclusion_name'] = json_encode($exclusion['datain']);
            if(!empty($exclusion['datain']))
            {
                $Activitysavedata['inclusion_name'] = json_encode($exclusion['datain']);
            }
            $exclusion['dataex'] =  $request->exclusion_name ;
            if(!empty($exclusion['dataex'] ))
            {
                $Activitysavedata['exclusion_name'] = json_encode($exclusion['dataex']);
            }
            
            $Activitysavedata->save();
            $last_id = $Activitysavedata->id;

            if($last_id)
            {
                if($request->hasfile('image_name'))
                { 
                    request()->validate([
                        'image_name' => 'required',
                        'image_name.*' => 'mimes:png,jpg'
                      ]);
                    $slno = 1;
                    foreach ($request->file('image_name') as $file) {
                        $extension = $file->getClientOriginalExtension();
                        $imageName = $last_id.'_'.date('Ymdhis').$slno.'.'.$extension;
                        $file->storeAs('activity' , $imageName  ,'local');
        
                        DB::table('activity_images')->insert(
                            ['activity_id' => $last_id, 'image_name' => $imageName]
                        );
                        $slno++;
                    }
                }     
            }
        }
        return redirect('/activity')->with('message','Activity Details Added Successfully!!');
    }
    public function EditActivity($activityid)
    {
        $id = crypt::decrypt($activityid);
        $data['images'] = ActivityImages::where('activity_id','=',$id)->get();
        $data['country_view'] = Country::where('status','=','1')->get();
        $data['state_view'] = State::where('status','=','1')->get();
        $data['activity_view'] = Activity::where('id','=',$id)->get();
        return view('activity.edit',compact('data',$data));
    }
    public function ActivityimageDelete(Request $request)
    {
        $imageid = $request->input('image_id');
        $image_name = DB::table('activity_images')->where('id','=', $imageid)->pluck('image_name')->first();
        $image_url = storage_path('/app/activity/'.$image_name);
        if(file_exists($image_url)){
            \File::delete($image_url);
        }
        DB::table('activity_images')->where('id', '=', $imageid)->delete();
        return ['status' => 1, 'message'=>'image deleted Successfully'];
    }
    public function activityEdit(Request $request)
    {
        $data = $request->all();
       // dd($data);

        $request->validate([
            'title_name' => 'required',
            
            
                ], [
            'title_name.required' => 'please enter title name',
            
            
        ]);
        $autoid = $request->input('autoid');
        $Activitysavedata = Activity::find($autoid);

        $hours = $request->hours * 60 ;
        $minutes = $request->minutes;

        $Activitysavedata['title_name'] = $request->title_name;
        $Activitysavedata['duartion_hours'] = $hours+$minutes;
        $Activitysavedata['amount'] = $request->amount;
        $Activitysavedata['country_id'] = $request->country_id;
        $Activitysavedata['state_id'] = $request->state_id;
        $Activitysavedata['city_id'] = $request->city_id;
        $Activitysavedata['address_one'] = $request->address_one;
        $Activitysavedata['address_two'] = $request->address_two;
        $Activitysavedata['zip_code'] = $request->zip_code;
        $Activitysavedata['langitude'] = $request->langitude;
        $Activitysavedata['latitude'] = $request->latitude;
        $Activitysavedata['short_description'] = $request->short_description;
        $Activitysavedata['overview'] = $request->overview;
        $Activitysavedata['additional_info'] = $request->additional_info;
        $exclusion['datain'] = $request->inclusion_name;
        $Activitysavedata['inclusion_name'] = json_encode($exclusion['datain']);
        if(!empty($exclusion['datain']))
        {
            $Activitysavedata['inclusion_name'] = json_encode($exclusion['datain']);
        }
        $exclusion['dataex'] =  $request->exclusion_name ;
        if(!empty($exclusion['dataex'] ))
        {
            $Activitysavedata['exclusion_name'] = json_encode($exclusion['dataex']);
        }
        $Activitysavedata->status = 1;
        $Activitysavedata->save();
        $last_id = $Activitysavedata->id;

       // $files = $request->file('image_name');
        if($request->hasfile('image_name'))
        {
            request()->validate([
                'image_name' => 'required',
                'image_name.*' => 'mimes:png,jpg'
              ]);
                $slno = 1;
                foreach ($request->file('image_name') as $file) {
                $extension = $file->getClientOriginalExtension();
                $imageName = $last_id.'_'.date('Ymdhis').$slno.'.'.$extension;
                $file->storeAs('activity' , $imageName  ,'local');

                DB::table('activity_images')->insert(
                    ['activity_id' => $last_id, 'image_name' => $imageName]
                );
                $slno++;
            }
        }

        return redirect('/activity')->with('message','Activity Details Updated Successfully!!');
    }
    public function enquiryList()
    {
        $data['enq_view'] = Enquiry::where('status','=','1')->get();
        return view('enquiry.list',compact('data',$data));
    }
    public function enquiryNew()
    {
        $data['country_view'] = Country::where('status','=','1')->get();
        $data['state_view'] = State::where('status','=','1')->get();
        return view('enquiry.new')->with('data',$data);
    }
    public function enquirySave(Request $request)
    {
        $data = $request->all();
        $data['id'] = $request->enquiry_id;
        
        if(!empty($data['id']))
        {
            $SaveEnquiry = Enquiry::find($data['id'])->update($data);
            $enquiryid = $data['id'];
            $data =  Enquiry::find($data['id']);
            Session::flash('message', 'Enquiry Detail Updated Succesfully');
            return $this->sendResponse($data->toArray(), $enquiryid, 'Enquiry Details Updated Succesfully');
        }
        else{
            $SaveEnquiry = Enquiry::create($data);
            $enquiryid = $SaveEnquiry->id;
            Session::flash('message', 'Enquiry Details Added Succesfully');
            return $this->sendResponse($SaveEnquiry->toArray(), $enquiryid, 'Enquiry Details Saved Succesfully');
        }
    }
    public function enquiryEdit($id)
    {
        $id = crypt::decrypt($id);
        $data['country_view'] = Country::where('status','=','1')->get();
        $data['state_view'] = State::where('status','=','1')->get();
        $data['enq_view'] = Enquiry::where('id','=',$id)->get();
        return view('enquiry.edit')->with('data',$data);
    }
    public function deleteInclusion(Request $request)
    {
        $data = $request->all();
        $data['inclusion_data'] = Activity::where('id','=',$request->id)->get();

        $json_inclusion = $data['inclusion_data'][0]->inclusion_name ;
        $decode_array = json_decode($json_inclusion);
        $array_inclu= array_diff($decode_array,[$request->inclusionname]); 
        $array = array_values($array_inclu);
        $update_json_inclusion = json_encode($array);
        
        $update = Activity::where('id','=',$request->id)->update(['inclusion_name' => $array]);
       
        return json_encode($update);
    }
    public function deleteExclusion(Request $request)
    {
        $data = $request->all();
        $data['exclusion_data'] = Activity::where('id','=',$request->id)->get();

        $json_inclusion = $data['exclusion_data'][0]->exclusion_name ;
        $decode_array = json_decode($json_inclusion);
        $array_exclu= array_diff($decode_array,[$request->exclusion_name]); 
        $array = array_values($array_exclu);
        //$update_json_exclusion = json_encode($array);
        
        $update = Activity::where('id','=',$request->id)->update(['exclusion_name' => $array]);
       
        return json_encode($update);
    }
}
