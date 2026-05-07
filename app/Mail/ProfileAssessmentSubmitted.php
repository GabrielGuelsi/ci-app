<?php

namespace App\Mail;

use App\Models\ProfileAssessment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProfileAssessmentSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public ProfileAssessment $assessment) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            replyTo: [$this->assessment->email],
            subject: 'New profile assessment — '.$this->assessment->full_name,
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.profile-assessment',
            with: ['assessment' => $this->assessment],
        );
    }
}
