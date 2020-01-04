<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Package;
use mail;
use App\Model\Admin\Website;
use App\Model\Admin\Enquiry;
use DB;


class MenuController extends Controller
{
    public function enquiryView()
    {
        $data['packages_view'] = Package::all();
        return view('web.enquiry')->with('data',$data);
    }
    public function enquiryEmail(Request $request)
    {
         $data = $request->all();

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

        return json_encode($websiteEmail);
    }
}
