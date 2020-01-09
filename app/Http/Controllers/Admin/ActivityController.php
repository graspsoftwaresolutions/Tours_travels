<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\API\BaseController as BaseController;

use Illuminate\Http\Request;
use App\Model\Admin\Country;
use App\Model\Admin\State;
use App\Model\Admin\City;
use App\Model\Admin\ActivityImages;
use App\Model\Admin\Activity;
use App\Model\Admin\Enquiry;
use App\Model\Admin\Package;
use PDF;
use App\Model\Admin\Website;

use App\Model\Admin\EnquiryPackages;
use DB;
use Session;
use Illuminate\Support\Facades\Crypt;

class ActivityController extends BaseController
{
	public function __construct()
	{
	    $this->middleware('auth:admin');
	}

    public function index()
    {
        $data['country_view'] = Country::where('status','=','1')->get();
        $data['state_view'] = State::where('status','=','1')->get();
        return view('admin.activity.new',compact('data',$data));
    }
    public function activityList(){
        $data = [];
        return view('admin.activity.list')->with('data',$data);
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
            $Activitysavedata['title_name'] = ucfirst($request->title_name);
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
                    // request()->validate([
                    //     'image_name' => 'required',
                    //     'image_name.*' => 'mimes:png,jpg'
                    //   ]);
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
        return redirect('admin/activity')->with('message','Activity Details Added Successfully!!');
    }
    public function EditActivity($activityid)
    {
        $id = crypt::decrypt($activityid);
        $data['images'] = ActivityImages::where('activity_id','=',$id)->get();
        $data['country_view'] = Country::where('status','=','1')->get();
        $data['state_view'] = State::where('status','=','1')->get();
        $data['activity_view'] = Activity::where('id','=',$id)->get();
        return view('admin.activity.edit',compact('data',$data));
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

        $Activitysavedata['title_name'] = ucfirst($request->title_name);
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
            // request()->validate([
            //     'image_name' => 'required',
            //     'image_name.*' => 'mimes:png,jpg'
            //   ]);
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

        return redirect('admin/activity')->with('message','Activity Details Updated Successfully!!');
    }
    public function enquiryList()
    {
        $data['enq_view'] = Enquiry::where('status','=','1')->get();
        
       
        return view('admin.enquiry.list',compact('data',$data));
    }
    public function enquiryNew()
    {
        $data['country_view'] = Country::where('status','=','1')->get();
        $data['state_view'] = State::where('status','=','1')->get();
        $data['packages_view'] = Package::where('user_package','=','0')->get();
        return view('admin.enquiry.new')->with('data',$data);
    }
    public function enquirySave(Request $request)
    {
        $data = $request->all();
        $data['id'] = $request->enquiry_id;
        $send_quotation_value = $request->send_quotation_value;
        
        if(!empty($data['id']))
        {
             $data = $request->all();
            $enquiryid = $request->enquiry_id;
            $enquiry = Enquiry::find($enquiryid);
            $enquiry->customer_id = $request->input('customer_id');
           
            $enquiry->type = $request->input('type');
            $enquiry->enquiry_status = $request->input('enquiry_status');
            $enquiry->message = $request->input('message');
            $enquiry->remarks = $request->input('remarks');
            $enquiry->status = 1;
            $enquiry->save();
            $package = $request->package;

            $enquiry->enquirypackages()->sync($package);

            $data =  Enquiry::find($enquiryid);
            Session::flash('message', 'Enquiry Detail Updated Succesfully');
            return $this->sendResponse($data->toArray(), $enquiryid, 'Enquiry Details Updated Succesfully');
        }
        else{
           // $SaveEnquiry = new Enquiry();
            $SaveEnquiry = Enquiry::create($data);
            $enquiryid = $SaveEnquiry->id;
            $package = $request->package;
            if($package!='')
            {
                foreach($package as $packageid)
                {
                    DB::table('enquiry_packages')->insert(
                        ['enquiry_id' => $enquiryid, 'package_id' => $packageid]
                    );
                }
            }
            Session::flash('message', 'Enquiry Details Added Succesfully');
            return $this->sendResponse($SaveEnquiry->toArray(), $enquiryid, 'Enquiry Details Saved Succesfully');
        }
    }
    public function enquiryQuotation(Request $request)
    {
        $data['id'] = $request->enquiry_id;
        $send_quotation_value = $request->send_quotation_value;

            $data = $request->all();
            $enquiryid = $request->enquiry_id;
            $customer_id = $request->input('customer_id');
            $enquiry = Enquiry::find($enquiryid);
           
            $enquiry->customer_id = $request->input('customer_id');
            $enquiry->type = $request->input('type');
            $enquiry->enquiry_status = $request->input('enquiry_status');
            $enquiry->message = $request->input('message');
            $enquiry->remarks = $request->input('remarks');
            $enquiry->status = 1;
            $enquiry->save();
               

            $package = $request->package;

            $enquiry->enquirypackages()->sync($package);

            if(!empty($send_quotation_value))
            {   
                foreach($package as $key=> $values)
                { 
                    $data['package_data'] = DB::table('package_master as pm')->select('pm.id as packageautoid','pm.package_name','pm.from_country_id','pm.from_state_id','pm.from_city_id','pm.adult_count','pm.child_count','pm.infant_count','pm.transport_charges','pm.additional_charges','total_package_value','pm.total_accommodation','pm.total_activities','pm.total_amount','con.country_name','st.state_name','cit.city_name','adult_price_person','child_price_person','infant_price' ,'pm.tax_percentage','pm.tax_amount','pm.package_type','pm.to_city_id')
                    ->leftjoin('country as con','con.id','=','pm.to_country_id')
                    ->leftjoin('state as st','st.id','=','pm.to_state_id')
                    ->leftjoin('city as cit','cit.id','=','pm.to_city_id')
                    ->where('pm.id','=',$values)->get();                        
                    $data['package_activities'] = DB::table('package_activities as pa')
                                            ->leftjoin('package_master as pm','pm.id','=','pa.package_id')
                                            ->where('pm.id','=',$values)->get();
                    $data['package_hotel'] = DB::table('package_hotel as ph')
                                                ->leftjoin('package_master as pm','pm.id','=','ph.package_id')
                                                ->where('pm.id','=',$values)->get();       
                    $data['package_place'] = DB::table('package_place as pp')
                                                ->leftjoin('package_master as pm','pm.id','=','pp.package_id')
                                                ->where('pm.id','=',$values)->get();

                    $data['website_data'] = Website::where('status','=','1')->get();
                    $data['customized_data'] = 'no';

                    if($data!='')
                    {
                        $pdf = PDF::loadView('admin.package.pdf.packagepdf', $data);
                        $pdf->save(storage_path('app/pdf/'.$values.'_package_details.pdf'));
                    }
                    $pdf_file = $values.'_package_details.pdf';
                    $enquiryid = $request->enquiry_id;
                    DB::table('enquiry_packages')->where('package_id','=',$values)->where('enquiry_id','=',$enquiryid)
                                                                ->update(['pdf_file' => $pdf_file]);
                }
                     $details = DB::table("enquiry_packages")->whereIn('package_id',$package)
                                                ->where('enquiry_id','=',$enquiryid)
                                                ->select('pdf_file','package_id')
                                                ->get();
                    $to_email =  $request->input('email');
                    $cc_email = 'shyni.bizsoft@gmail.com';

                    \Mail::to($to_email)->cc($cc_email)->send(new \App\Mail\EnquiryPackage($package,$enquiry));

                    return json_encode($details);
            } 
    }
    public function enquiryEdit($id)
    {
        $id = crypt::decrypt($id);
        $data['country_view'] = Country::where('status','=','1')->get();
        $data['state_view'] = State::where('status','=','1')->get();
        $data['enq_view'] = Enquiry::where('id','=',$id)->get();
        $data['packages_view'] = Package::where('user_package','=','0')->get();
        $data['enquiry_packages'] = DB::table('enquiry_packages')->where('enquiry_id','=', $id)->pluck('package_id')->toArray();
       
        //dd($data['enquiry_packages']);
        return view('admin.enquiry.edit')->with('data',$data);
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
