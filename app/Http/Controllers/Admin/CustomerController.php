<?php

namespace App\Http\Controllers\Admin;
use App\Model\Admin\CustomerDetails;
use App\Model\Admin\Country;
use App\Model\Admin\State;
use App\Model\Admin\City;
use App\Model\Admin\Tax;
use App\Model\Admin\Website;
use Session;
use DB;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Helpers\CommonHelper;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class CustomerController extends BaseController
{
    public function customerList()
    {
        $data['customer_view'] = CustomerDetails::where('status','=','1')->get();
        return view('admin.customer.list')->with('data',$data);
    }
    public function customerNew()
    {
        $data['country_view'] = Country::where('status','=','1')->get();
        $data['state_view'] = State::where('status','=','1')->get();
        return view('admin.customer.new',compact('data',$data));
    }
    public function customerSave(Request $request)
    {
        $data = $request->all();
        $data['id'] = $request->customer_id;
        $request->validate([
            'name' => 'required', 
            'email' => 'required',        
            'phone' => 'required',
            'country_id' => 'required',
            'state_id' => 'required',
            'city_id' => 'required',
            'zipcode' => 'required',
                ], [
            'name.required' => 'please enter  name',
            'email.required' => 'please enter Email',
            'phone.required' => 'please enter Phone',
            'country_id.required' => 'please select Country',
            'state_id.required' => 'please select State',
            'city_id.required' => 'please select City',
            'zipcode.required' => 'please enter Zipcode',
        ]);
        if(!empty($data['id']))
        {
            $SaveCustomer = CustomerDetails::find($data['id'])->update($data);
            $customerid = $data['id'];
            $count = DB::table('users')->where('customer_id','=',$customerid)->count();
            if($count > 0)
            {
                DB::table('users')->where('customer_id','=',$customerid)->update(['name'=>$data['name'],'phone' =>$data['phone']]);
            }          
            $CustomerDetails =  CustomerDetails::find($data['id']);
            Session::flash('message', 'Customer Detail Updated Succesfully');
            return $this->sendResponse($CustomerDetails->toArray(), $customerid, 'Customer Details Updated Succesfully');
        }
        else{
            $CustomerDetails = CustomerDetails::create($data);
            $customerid = $CustomerDetails->id;

            $length = 8;
            $alpha='a';
            $randomPassword = CommonHelper::random_password($length,$alpha);
            $pass = Hash::make($randomPassword);
             
            DB::table('users')->insert(['name'=>$CustomerDetails->name , 'password'=>$pass,'email'=>$CustomerDetails->email ,'phone' =>$CustomerDetails->phone ,'customer_id'=>$CustomerDetails->id]);

            $details = [
                'name'=>$CustomerDetails->name,
                'email'=>$CustomerDetails->email,
                'password'=>$randomPassword,
            ];
                $to_email =  $CustomerDetails->email;
                $cc_email = 'shyni.bizsoft@gmail.com';

                \Mail::to($to_email)->cc($cc_email)->send(new \App\Mail\CustomerPasswordEmail($details));
            
           Session::flash('message', 'Customer Details Added Succesfully');
           return $this->sendResponse($CustomerDetails->toArray(), $customerid, 'Customer Details Saved Succesfully');
        }
    }
    public function customerEdit($id)
    { 
       
        $id = crypt::decrypt($id);
        $data['country_view'] = Country::where('status','=','1')->get();
        $data['state_view'] = State::where('status','=','1')->get();
        $data['customer_view'] = CustomerDetails::where('id','=',$id)->get();
        return view('admin.customer.edit')->with('data',$data);
    }
}
