<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnquiryConfirmMail extends Mailable
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
        if($this->details['package']!='')
        {
            foreach($this->details['package'] as $key => $values)
            {
               // print_r($values); die;
                $files = ['storage/app/pdf/'.$values.'_package_details.pdf'];

                $message = $this->markdown('web.email.enquiryConfirmEmail');    
            
                foreach ($files as $file) { 
                    $message->attach($file); // attach each file
                } 
            }          
                return $message;
        }
        else{
            return $this->subject('Mail from Tours and Travels')
                    ->view('web.email.enquiryConfirmEmail');
        }
       
    }
}
