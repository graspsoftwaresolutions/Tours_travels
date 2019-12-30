<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Model\Admin\Tax;
use App\Model\Admin\Website;
use App\Model\Admin\Country;
use App\Model\Admin\State;
use App\Model\Admin\City;
use DB;
use View;
use Session;
class SettingsController extends Controller
{
    public function taxSettings()
    {
        $data = Tax::where('status','=','1')->first();
        
        return view('admin.settings.tax')->with('data',$data);
    }
    public function taxSave(Request $request)
    {
         $data = $request->all();

         if(!empty($request->tax_id))
         {
            
            $SaveTax = Tax::find($request->tax_id)->update($data); 
            Session::flash('message', 'Tax Details updated Succesfully');
         }
         else{
            $SaveTax = Tax::create($data);
            Session::flash('message', 'Tax Details added Succesfully');
         }
        
         return json_encode($SaveTax);
    }
    public function websiteSettings()
    {
        $data = website::where('status','=','1')->first();
        $data['country_view'] = Country::where('status','=','1')->get();
        $data['state_view'] = State::where('status','=','1')->get();
        return view('admin.settings.website')->with('data',$data);
    }
    public function websiteSave(Request $request)
    {
         $data = $request->all(); 
         
         if(!empty($request->website_id))
         {
            if($request->company_logo) {

                $file = $data['company_logo'];
                $extension = $file->getClientOriginalExtension();
                $imageName = time().'.'.$file->getClientOriginalExtension();
                $file->move('public/assets/images/website_logo',$imageName);
             //   $file->storeAs('website' , $imageName  ,'local');
                $data['company_logo'] = $imageName;
            }
            $SaveWebsite= website::find($request->website_id)->update($data);
            return redirect('admin/website')->with('message','Website Details Updated Successfully!!');
         }
         else{
            if($request->company_logo) {
                $file = $data['company_logo'];
                $extension = $file->getClientOriginalExtension();
                $imageName = time().'.'.$file->getClientOriginalExtension();
                $file->move('public/assets/images/website_logo',$imageName);
                $data['company_logo'] = $name;
            }
            $SaveWebsite = website::create($data);
            return redirect('admin/website')->with('message','Website Details Saved Successfully!!');
         }
    }
}
