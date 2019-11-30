<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Country;
use App\Model\State;
use App\Model\City;
use App\Model\ActivityImages;
use App\Model\Activity;
use DB;
use Illuminate\Support\Facades\Crypt;

class ActivityController extends Controller
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
            'duartion_hours' => 'required',
            'inclusion_name' => 'required',
            'exclusion_name' => 'required',
            
                ], [
            'title_name.required' => 'please enter title name',
            'duartion_hours.required' => 'please select Room Type name',
            'inclusion_name.required' => 'please enter inclusion name',
            'exclusion_name.required' => 'please enter exclusion name',
        ]);
        $data = $request->all();
        if(!empty($data))
        {
            $Activitysavedata = new Activity();
            $Activitysavedata['title_name'] = $request->title_name;
            $Activitysavedata['duartion_hours'] = $request->duartion_hours;
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
                    $s1 = 0;
                    foreach($request->file('image_name') as $file)
                    {
                        $name = ($s1+1).'-'.time().'.'.$file->extension();  
                        $file->move('storage/app/hotels/rooms',$name); 
                        $file= new ActivityImages();
                        $file->activity_id =  $last_id;
                        $file->image_name= $name;
                        $file->save();
                        $s1++;
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
        $image_name = ActivityImages::where('id','=', $imageid)->pluck('image_name')->first();
        $image_url = storage_path('/app/hotels/'.$image_name);
        if(file_exists($image_url)){
            \File::delete($image_url);
        }
       
        ActivityImages::where('id', '=', $imageid)->delete();
        return ['status' => 1, 'message'=>'image deleted Successfully'];
    }
    public function activityEdit(Request $request)
    {
        $data = $request->all();
       // dd($data);

        $request->validate([
            'title_name' => 'required',
            'duartion_hours' => 'required',
            'inclusion_name' => 'required',
            'exclusion_name' => 'required',
            
                ], [
            'title_name.required' => 'please enter title name',
            'duartion_hours.required' => 'please select Room Type name',
            'inclusion_name.required' => 'please enter inclusion name',
            'exclusion_name.required' => 'please enter exclusion name',
        ]);
        $autoid = $request->input('autoid');
        $Activitysavedata = Activity::find($autoid);

        $Activitysavedata['title_name'] = $request->title_name;
        $Activitysavedata['duartion_hours'] = $request->duartion_hours;
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

       // $files = $request->file('image_name');
        if($request->hasfile('image_name'))
        {
            $s1 = 0;
            foreach($request->file('image_name') as $file)
            {
                $name = ($s1+1).'-'.time().'.'.$file->extension();  
                $file->move('storage/app/hotels/rooms',$name); 
                $file= new ActivityImages();
                $file->activity_id =  $autoid;
                $file->image_name= $name;
                $file->save();
                $s1++;
            }
        }

        return redirect('/activity')->with('message','Activity Details Updated Successfully!!');
    }
}
