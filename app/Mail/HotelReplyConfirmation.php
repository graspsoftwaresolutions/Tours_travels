<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HotelReplyConfirmation extends Mailable
{
    use Queueable, SerializesModels;
    public $hotel_id;
    public $cityid;
    public $bookingid;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bookingid,$cityid,$hotel_id)
    {
        $this->hotel_id = $hotel_id;
        $this->cityid = $cityid;
        $this->bookingid = $bookingid;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.email.hotel_booking_confirm');
    }
}
