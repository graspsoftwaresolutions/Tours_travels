<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Model\Admin\CustomerDetails;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required','numeric'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
            // $email_valid = $data['email'];
            // $phone_valid = $data['phone'];

            // if($email_valid!='' && $phone_valid!=''){
            //     $auth_email_count = User::where('email','=',$email_valid)->count();
            //     $customer_email_count = CustomerDetails::where('email','=',$email_valid)->count();
            //     $auth_phone_count = User::where('phone','=',$phone_valid)->count();
            //     $customer_phone_count = CustomerDetails::where('phone','=',$phone_valid)->count();
            // }
            // if($auth_email_count>0 && $customer_email_count>0)
            // {
            //    // return view('auth.register')->with('message','Email Already Exists');
            //    return redirect('/');
            // }
            // elseif($auth_phone_count> 0 && $customer_phone_count >0 )
            // {
            //    // return view('auth.register')->with('message','Phone number Already Exists');
            //    return redirect('/');
            // }
            // else{
                $CustomerDetails = new CustomerDetails();
                $CustomerDetails->name = $data['name'] ; 
                $CustomerDetails->email = $data['email'] ; 
                $CustomerDetails->phone = $data['phone'] ; 
                $CustomerDetails->save();
                $customerid = $CustomerDetails->id;

                return User::create([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'],
                    'password' => Hash::make($data['password']),
                    'customer_id'=>$customerid,
                ]);
            // }
    }
        
}
