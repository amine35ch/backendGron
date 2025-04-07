<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SampleEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $username;

    public $password;

    /**
     * Create a new message instance.
     */
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function build()
    {
        return $this->subject('Sample Email')
            ->view('emails.sample'); // Create a corresponding view file in resources/views/emails
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Sample Email',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.sample',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
