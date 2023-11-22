<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\URL;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        $verificationUrl = URL::route('verify', ['url' => $this->data]);
        return $this->from('varificationsystem@info.com', 'Jagga Daku')
                    ->subject('Time Pass')
                    ->markdown('emails.sendmail',['url' => $verificationUrl]);
    }
}
