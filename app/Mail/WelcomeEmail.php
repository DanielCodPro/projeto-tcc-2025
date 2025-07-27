<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WelcomeEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $usuario;

    /**
     * Cria uma nova instância do e-mail.
     */
    public function __construct($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * Define o envelope (assunto, remetente, etc.).
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Boas Vindas à família Casa dos Salgados',
        );
    }

    /**
     * Define o conteúdo da mensagem (view, dados).
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.welcome',
            with: [
                'usuario' => $this->usuario,
            ],
        );
    }

    /**
     * Define anexos (se houver).
     */
    public function attachments(): array
    {
        return [];
    }
}
