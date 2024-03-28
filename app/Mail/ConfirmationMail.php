<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $titulaireCompte;
    public $codeBanque;
    public $codeGuichet;
    public $numeroCompte;
    public $cleRib;
    public $iban;
    public $solde;

    public function __construct($numeroCompte, $codeBanque, $codeGuichet, $cleRib, $iban, $titulaireCompte, $solde)
    {
        $this->numeroCompte = $numeroCompte;
        $this->codeBanque = $codeBanque;
        $this->codeGuichet = $codeGuichet;
        $this->cleRib = $cleRib;
        $this->iban = $iban;
        $this->titulaireCompte = $titulaireCompte;
        $this->solde = $solde;
    }

    public function build()
    {
        return $this->view('mails.confirmation');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Confirmation Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.confirmation',
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
