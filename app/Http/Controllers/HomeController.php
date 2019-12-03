<?php

namespace App\Http\Controllers;
use Auth;
use Hash;
use App\Model\Tax;
use Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.dashboard');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        return view('auth.login');
    }

    public function menuSettings()
    {
        return view('ajax.menu-settings');
    }

    public function showChangePasswordForm(){
        return view('change_password');
    }
	
	public function changePassword(Request $request){
        if (!(Hash::check($request->get('currentpassword'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('currentpassword'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        $validatedData = $request->validate([
            'currentpassword' => 'required',
            'password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");
    }
    public function taxSettings()
    {
        $data = Tax::where('status','=','1')->first();
        
        return view('settings.tax')->with('data',$data);
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
}
