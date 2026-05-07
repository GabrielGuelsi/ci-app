<?php

namespace App\Mail;

use App\Models\AssessmentLead;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class AssessmentLeadSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public AssessmentLead $lead) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            replyTo: [$this->lead->email],
            subject: 'New profile assessment lead — '.$this->lead->full_name,
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.assessment-lead',
            with: ['lead' => $this->lead],
        );
    }
}
