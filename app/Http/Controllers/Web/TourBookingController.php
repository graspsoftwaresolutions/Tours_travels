<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;

class TourBookingController extends Controller
{
    public function tourBooking()
    {
        return view('web.tour.tour_booking');
    }
}