<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;


    /**
     * Create a new message instance.
     */
   public function __construct($data)
    {
        $this->data = $data;
    }
    /**
     * Get the message envelope.
     */
 

    /**
     * Get the message content definition.
     */
  

    public function build()
    {
        return $this->subject('New Contact Form Query')
                    ->view('emails.contact');
    }


}
