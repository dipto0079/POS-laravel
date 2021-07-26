<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageByMail extends Mailable
{
    use Queueable, SerializesModels;

    public $receiver;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($receiver)
    {
        $this->receiver = $receiver;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->view('emails.messageByMail');
    }
}
