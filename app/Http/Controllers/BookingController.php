<?php

namespace App\Http\Controllers;
use App\Model\Country;
use App\Model\State;
use App\Model\City;
use Illuminate\Http\Request;
use DB;

class BookingController extends Controller
{
    public function index()
    {
        $data['country_view'] = Country::where('status','=','1')->get();
        $data['state_view'] = State::where('status','=','1')->get();
        $data['city_view'] = City::where('status','=','1')->get();
        $data['tax_data'] = DB::table('settings_tax')->where('status','=','1')->first();
        $data['package_type'] = DB::table('package_type')->where('status','=','1')->get();
        return view('booking.new')->with('data',$data);
    }
    public function auto()
    {
        $data = DB::table('customer_details as c')->select(DB::raw("CONCAT(c.name,'-',c.zipcode,'-',c.id) AS value"),'c.name','c.email','c.phone','c.address_one','c.address_two','c.zipcode','cit.city_name','s.state_name')
                    ->join('city as cit','cit.id','=','c.city_id')
                    ->join('state as s','s.id','=','c.state_id')
                    //  ->orwhere("c.name","LIKE","%{$keyword}%")
                    //  ->orwhere("c.phone","LIKE","%{$keyword}%")
                    // ->orwhere('c.zipcode','like', '%'.$keyword.'%')
                    // ->orwhere('cit.city_name','like', '%'.$keyword.'%')
                ->get();
        return view('booking.testauto')->with('data',$data);
    }
}
