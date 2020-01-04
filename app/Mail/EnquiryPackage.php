<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnquiryPackage extends Mailable
{
    use Queueable, SerializesModels;
    public $package;
    public $enquiry;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($package,$enquiry)
    {
      // dd($package);
        $this->package = $package;
        $this->enquiry = $enquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
            //Multiple Attachemnt
            foreach($this->package as $key => $values)
            {
               // print_r($values); die;
                $files = ['storage/app/pdf/'.$values.'_package_details.pdf'];

                $message = $this->subject('Tours Package Info')
                            ->markdown('admin.email.packagepdf');    
            
                foreach ($files as $file) { 
                    $message->attach($file); // attach each file
                } 
            }          
                return $message; //Send mail
            }
}
