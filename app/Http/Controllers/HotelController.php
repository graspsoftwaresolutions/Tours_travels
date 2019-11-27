<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Country;
use App\Model\State;
use App\Model\City;

class HotelController extends CommonController
{
    public function __construct()
	{
	    $this->middleware('auth');
	}

	public function index()
    {
        $data['country_view'] = Country::where('status','=','1')->get();
        $data['state_view'] = State::where('status','=','1')->get();
        return view('hotels.new',compact('data',$data));
    }

    public function newAmnities()
    {
        return view('master.amenities.amenities');
    }

    public function hotelSave(Request $request){
        return $request->all();
    }
}
