<?php

namespace App\Mail;
use App\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LeadMail extends Mailable
{
    use Queueable, SerializesModels;

    public $lead;

    public function __construct(Lead $lead)
    {
        $this->lead = $lead;
    }

    public function build()
    {
        return $this->subject('Новая заявка с сайта')
            ->markdown('emails.lead')
            ->with([
            'name' => $this->lead->name,
            'tel' => $this->lead->tel,
            'text' => $this->lead->text,
        ]);
    }
}