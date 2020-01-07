<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WebPackageQuotation extends Mailable
{
    use Queueable, SerializesModels;
    public $userdata;
    public $package_data;
    public $package_places;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($package,$package_places,$user)
    {
        $this->package_places = $package_places;
        $this->userdata = $user;
        $this->package_data = $package;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('web.email.new_package');
    }
}
