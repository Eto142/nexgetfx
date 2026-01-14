<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WithdrawalTaxAmountUpdatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Withdrawal Tax Upadte Notification')
                    ->view('emails.withdrawal_tax_amount_updated');
    }
}
