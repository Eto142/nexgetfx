<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class UserNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $messageContent;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user, $messageContent)
    {
        $this->user = $user;
        $this->messageContent = $messageContent;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('🔔 New Notification from NGM Platform')
                    ->view('emails.user_notification');
    }
}
