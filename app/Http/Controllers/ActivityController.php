<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Country;
use App\Model\State;
use App\Model\City;
use DB;
use Illuminate\Support\Facades\Crypt;

class ActivityController extends Controller
{
	public function __construct()
	{
	    $this->middleware('auth');
	}

    public function index()
    {
        $data['country_view'] = Country::where('status','=','1')->get();
        $data['state_view'] = State::where('status','=','1')->get();
        return view('activity.new',compact('data',$data));
    }

    public function activityList(){
        $data = [];
        return view('activity.list')->with('data',$data);
    }
}
