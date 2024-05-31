<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PaymentReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $room;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $room)
    {
        $this->user = $user;
        $this->room = $room;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Payment Reminder')
                    ->view('emails.payment_reminder');
    }
}
