<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HotelController extends CommonController
{
    public function __construct()
	{
	    $this->middleware('auth');
	}

	public function index()
    {
        return view('hotels.new');
    }
}
