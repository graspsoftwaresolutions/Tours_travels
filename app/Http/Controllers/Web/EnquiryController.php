<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Package;
use mail;
use App\Model\Admin\Website;
use App\Model\Admin\CustomerDetails;
use App\User;
use App\Helpers\CommonHelper;
use App\Model\Admin\Enquiry;
use DB;
use Session;
use Illuminate\Support\Facades\Hash;

class EnquiryController extends Controller
{
    public function enquiryView()
    {
        $data['packages_view'] = Package::where('user_package','=','0')->get();
        return view('web.enquiry')->with('data',$data);
    }
    public function enquiryEmail(Request $request)
    {
        $data = $request->all();
        $auth_id = $request->auth_id;

       if($auth_id!='')
       { 
            $auth_customer_id = User::where('id','=',$auth_id)->pluck('customer_id')->first();
           
            if($auth_customer_id!='')
            {
                $SaveEnquiry = new Enquiry();
                $SaveEnquiry->customer_id =  $auth_customer_id;
                $SaveEnquiry->type = $request->type;
                $SaveEnquiry->message =  $request->message;
                $SaveEnquiry->save();
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
                $websiteEmail = Website::where('status','=','1')->pluck('company_email')->first();

                $details = [
                    'name' =>  $request->name,
                    'email' =>  $request->email,
                    'phone' => $request->phone,
                    'type' => $request->type,
                    'package' => $request->package,
                    'message' => $request->message,
                    'address' => $request->address,
                ];
                $cc_email =  'shyni.bizsoft@gmail.com';
                $to_email =  $websiteEmail;
                if($cc_email && $to_email)
                {
                    \Mail::to($to_email)->cc($cc_email)->send(new \App\Mail\EnquiryMail($details));
                }
                $user_to_mail = $request->email;
                $user_cc_email =  'shyni.bizsoft@gmail.com';

                if($user_to_mail && $user_cc_email)
                {
                    \Mail::to($user_to_mail)->cc($user_cc_email)->send(new \App\Mail\EnquiryConfirmMail($details));
                }
                    $resdata['status'] = 1;
                    $resdata['message']= 'success';
                    return json_encode($resdata);
                }
        }
        else{
            $email_valid = $request->email;
            $phone_valid = $request->phone;

            if($email_valid!='' && $phone_valid!=''){
                $auth_email_count = User::where('email','=',$email_valid)->count();
                $customer_email_count = CustomerDetails::where('email','=',$email_valid)->count();
                $auth_phone_count = User::where('phone','=',$phone_valid)->count();
                $customer_phone_count = CustomerDetails::where('phone','=',$phone_valid)->count();
            }
            if($auth_email_count>0 && $customer_email_count>0)
            {
                //Session::flash('error', 'Email Already Exists'); 
                $resdata['status'] = 0;
                $resdata['message']= 'Email Already Exists, Please Login!';
                return json_encode($resdata);
            }
            elseif($auth_phone_count> 0 && $customer_phone_count >0 )
            {
               // Session::flash('error', 'Phone number Already Exists'); 
                $resdata['status'] = 0;
                $resdata['message']= 'Phone number Already Exists, Please Login!';
                return json_encode($resdata);
            }
            else{

                $CustomerDetails = new CustomerDetails();
                $CustomerDetails->name = $request->name ; 
                $CustomerDetails->email = $request->email ; 
                $CustomerDetails->phone = $request->phone ; 
                $CustomerDetails->address_one = $request->address ; 
                $CustomerDetails->save();
                $customerid = $CustomerDetails->id;

                $length = 8;
                $alpha='a';
                $randomPassword = CommonHelper::random_password($length,$alpha);
                $pass = Hash::make($randomPassword);
    
                DB::table('users')->insert(['name'=>$CustomerDetails->name , 'password'=>$pass,'email'=>$CustomerDetails->email ,'phone' =>$CustomerDetails->phone ,'customer_id'=>$customerid]);

                $details = [
                    'name'=>$CustomerDetails->name,
                    'email'=>$CustomerDetails->email,
                    'password'=>$randomPassword,
                ];
                $to_email =  $CustomerDetails->email;
                $cc_email = 'shyni.bizsoft@gmail.com';

                \Mail::to($to_email)->cc($cc_email)->send(new \App\Mail\CustomerPasswordEmail($details));

                $SaveEnquiry = new Enquiry();
                $SaveEnquiry->customer_id =  $customerid;
                $SaveEnquiry->type = $request->type;
                $SaveEnquiry->message =  $request->message;
                $SaveEnquiry->save();
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
                $websiteEmail = Website::where('status','=','1')->pluck('company_email')->first();

                $details = [
                    'name' =>  $request->name,
                    'email' =>  $request->email,
                    'phone' => $request->phone,
                    'type' => $request->type,
                    'package' => $request->package,
                    'message' => $request->message,
                    'address' => $request->address,
                ];
                $cc_email =  'shyni.bizsoft@gmail.com';
                $to_email =  $websiteEmail;
                if($cc_email && $to_email)
                {
                    \Mail::to($to_email)->cc($cc_email)->send(new \App\Mail\EnquiryMail($details));
                }
                $user_to_mail = $request->email;
                $user_cc_email =  'shyni.bizsoft@gmail.com';

                if($user_to_mail && $user_cc_email)
                {
                    \Mail::to($user_to_mail)->cc($user_cc_email)->send(new \App\Mail\EnquiryConfirmMail($details));
                }
                $resdata['status'] = 1;
                $resdata['message']= 'success';
                 return json_encode($resdata);
                }
        }
        
    }
}
