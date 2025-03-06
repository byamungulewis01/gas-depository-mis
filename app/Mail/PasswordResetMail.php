<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PasswordResetMail extends Mailable
{
    use Queueable, SerializesModels;

    public $resetPin;
    public $appName;

    /**
     * Create a new message instance.
     *
     * @param string $resetPin
     * @return void
     */
    public function __construct(string $resetPin)
    {
        $this->resetPin = $resetPin;
        $this->appName = config('app.name', 'Ubudozi App');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.password-reset')
            ->subject("Reset Your {$this->appName} Password");
    }

}
