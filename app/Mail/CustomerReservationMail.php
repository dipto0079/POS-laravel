<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerReservationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $restaurant;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($restaurant)
    {
        $this->restaurant = $restaurant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.customer.tableReservation');
    }
}
