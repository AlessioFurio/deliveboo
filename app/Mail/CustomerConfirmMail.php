<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerConfirmMail extends Mailable
{
    use Queueable, SerializesModels;
    public $new_payment;
    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($_new_payment)
     {
         $this->new_payment = $_new_payment;
         //
     }

    /**
     * Build the message.
     *
     * @return $this
     */
     public function build()
     {
         return $this->view('mail.customermsg');

     }
}
