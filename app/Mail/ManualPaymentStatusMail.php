<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ManualPaymentStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $input;

    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($input, $email)
    {
        $this->input = $input;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Manual Payment Status';

        return $this->subject($subject)
            ->markdown('emails.manual_payment_status')
            ->with($this->input);
    }
}
