<?php

namespace App\Http\Controllers;
use App\Model\CustomerDetails;
use App\Model\Country;
use App\Model\State;
use App\Model\City;
use Session;
use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\API\BaseController as BaseController;

use Illuminate\Http\Request;

class CustomerController extends BaseController
{
    public function customerList()
    {
        $data['customer_view'] = CustomerDetails::where('status','=','1')->get();
        return view('customer.list')->with('data',$data);
    }
    public function customerNew()
    {
        $data['country_view'] = Country::where('status','=','1')->get();
        $data['state_view'] = State::where('status','=','1')->get();
        return view('customer.new',compact('data',$data));
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
            $CustomerDetails =  CustomerDetails::find($data['id']);
            Session::flash('message', 'Customer Detail Updated Succesfully');
            return $this->sendResponse($CustomerDetails->toArray(), $customerid, 'Customer Details Updated Succesfully');
        }
        else{
            $CustomerDetails = CustomerDetails::create($data);
            $customerid = $CustomerDetails->id;
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
        return view('customer.edit')->with('data',$data);
    }
}
