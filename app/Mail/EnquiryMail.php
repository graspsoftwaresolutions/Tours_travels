<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\Model\Admin\Package;
use Illuminate\Queue\SerializesModels;
use DB;

class EnquiryMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
      
        return $this->subject('Mail from Tours and Travels')
                    ->view('web.email.enquiryAdminEmail');
      //  return $this->view('web.email.enquiryAdminEmail');
    }
}
