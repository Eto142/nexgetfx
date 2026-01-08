<?php

namespace App\Mail; // ✅ THIS WAS MISSING

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProfitLimitMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function build()
    {
        return $this->subject('Account Profit Threshold Reached')
                    ->view('emails.profit_limit');
    }
}
