<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class TroupeValidatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: ' Bonne nouvelle ! Votre compte Troupe a été validé',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.troupe_validated',
        );
    }

    /**
     *
     * @return array<int, Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
