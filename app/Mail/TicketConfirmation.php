<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;

class TicketConfirmation extends Mailable
{
    public function __construct(public array $ticket) {}

    public function envelope(): Envelope
    {
        return new Envelope(subject: 'Reservation Confirmed - Ado World Tour ' . $this->ticket['pass_id']);
    }

    public function content(): Content
    {
        return new Content(view: 'emails.ticket-confirmation');
    }
}