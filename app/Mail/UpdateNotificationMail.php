<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UpdateNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $messageText;

    public function __construct($messageText)
    {
        $this->messageText = $messageText;
    }

    public function build()
    {
        return $this->subject('Your Account Notification Update')
                    ->view('emails.update_notification');
    }
}
