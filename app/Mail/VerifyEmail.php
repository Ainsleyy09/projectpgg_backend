<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $token;

    // constructor
    public function __construct($user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    public function build()
    {
        $url = url("/verify-email/{$this->token}");

        return $this->subject('Verify Your Email')
            ->view('emails.verify-email')
            ->with([
                'user' => $this->user,
                'url'  => $url
            ]);
    }
}
