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
            'country_id' => ['required'],
            'state_id' => ['required'],
            'city_id' => ['required'],
            'address_one' => ['required'],
            'address_two' => ['required'],
            'pincode' => ['required'],
            'phone' => ['required','numeric', 'unique:users'],
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
        $CustomerDetails = new CustomerDetails();
        $CustomerDetails->name = $data['name'] ; 
        $CustomerDetails->email = $data['email'] ; 
        $CustomerDetails->phone = $data['phone'] ;
        $CustomerDetails->country_id = $data['country_id'] ;
        $CustomerDetails->state_id = $data['state_id'] ;
        $CustomerDetails->city_id = $data['city_id'] ;
        $CustomerDetails->address_one = $data['address_one'] ;
        $CustomerDetails->address_two = $data['address_two'] ;
        $CustomerDetails->zipcode = $data['pincode'] ;
        $CustomerDetails->save();
        $customerid = $CustomerDetails->id;

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'country_id' => $data['country_id'],
            'state_id' => $data['state_id'],
            'city_id' => $data['city_id'],
            'address_one' => $data['address_one'],
            'address_two' => $data['address_two'],
            'pincode' => $data['pincode'],
            'password' => Hash::make($data['password']),
            'customer_id'=>$customerid,
        ]);
    }
}
