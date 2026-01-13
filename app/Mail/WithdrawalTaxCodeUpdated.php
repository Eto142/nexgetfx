<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WithdrawalTaxCodeUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public User $user;

    /**
     * Create a new message instance.
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->from('no-reply@nexglobmarket.com', 'NGM Trd')
            ->replyTo('support@nexglobmarket.com', 'NGM Trd Support')
            ->subject('Withdrawal Tax Code Updated')
            ->view('emails.withdrawal_tax_code_updated')
            ->text('emails.withdrawal_tax_code_updated_plain')
            ->with([
                'user' => $this->user,
            ]);
    }
}
