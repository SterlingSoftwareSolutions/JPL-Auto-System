<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class PasswordReset extends Mailable
{
    use Queueable, SerializesModels;

    public $token;  // Public property to hold the token

    /**
     * Create a new message instance.
     *
     * @param string $token
     */
    public function __construct($token)
    {
        $this->token = $token;  // Assign the passed token to the public property
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.resetpassword')  // Specify the view
                    ->with('token', $this->token);  // Pass the token to the view
    }
}
