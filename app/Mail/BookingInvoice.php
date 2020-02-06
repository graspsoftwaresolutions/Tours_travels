<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingInvoice extends Mailable
{
    use Queueable, SerializesModels;
    public $bookingid; 
    public $customer_data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($bookingid,$customer_data)
    {
        $this->bookingid = $bookingid;
        $this->customer_data = $customer_data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('web.email.booking_invoice')
        ->attach('storage/app/pdf/'.$this->bookingid."_booking_invoice.pdf");
    }
}
