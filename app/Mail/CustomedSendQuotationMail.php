<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomedSendQuotationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $packageid; 
    public $customer_data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($packageid,$customer_data)
    {
        $this->packageid = $packageid;
        $this->customer_data = $customer_data;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       // dd($this->customer_data);
        return $this->view('admin.email.customer_send_quation_package')
        ->attach('storage/app/pdf/'.$this->packageid."_admin_customer_package_details.pdf");
    }
}
