<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingConfimationCustomerMail extends Mailable
{
    use Queueable, SerializesModels;
    public $bookingid;
    public $booking_number;
    public $customer_data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bookingid,$booking_number,$customer_data)
    {
        $this->bookingid = $bookingid;
        $this->booking_number = $booking_number;
        $this->customer_data = $customer_data;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.email.booking_confirmation_customer_mail')
        // return $this->view('web.email.booking_confirmation_customer_mail')
        // ->with(['message' => $this])
        ->attach('storage/app/pdf/'.$this->booking_number."_booking_details.pdf");
    }
}
