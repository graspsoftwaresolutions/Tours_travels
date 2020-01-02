<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MyPackagePdfTestMail extends Mailable
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
    //     return $this->subject('Mail from ItSolutionStuff.com')
    //                 ->view('admin.email.packagepdf');

    //    return $details;

        return $this->view('admin.email.packagepdf')
                    ->attach('storage/app/pdf/1_package_details.pdf', [
                        'as' => 'name.pdf',
                        'mime' => 'application/pdf',
                    ]);
        // $message = 'test';   
        // $files = ['storage/app/pdf/1_package_details.pdf','storage/app/pdf/2_package_details.pdf','storage/app/pdf/6_package_details.pdf'];

        // foreach ($files as $file) { 
        //     $message->attach($file); // attach each file
        // }
    }
}
