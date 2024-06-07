<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Invoice;
use App\Models\Planbooking;
use Illuminate\Mail\Mailables\Envelope;

class PlanPaidInvoice extends Mailable
{
    use Queueable, SerializesModels;

    public $invoice;
    public $planbooking;

    /**
     * Create a new message instance.
     */
    public function __construct(Invoice $invoice, Planbooking $planbooking)
    {
        $this->invoice = $invoice;
        $this->planbooking = $planbooking;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: ' Invoice Paid',
        );
    }

    /**
     * Get the message content definition.
     */
    public function build()
    {
        return $this->subject('Invoice Paid')
                    ->view('Email.Mark-Plan-Paid')
                    ->with([
                        'invoice' => $this->invoice,
                        'planbooking' => $this->planbooking,
                    ]);
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
