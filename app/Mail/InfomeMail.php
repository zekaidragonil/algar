<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use App\Models\Informes_medicos;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InfomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $recetas;
    /**
     * Create a new message instance.
     */
    public function __construct(Informes_medicos $receta)
    {
        $this->recetas = $receta;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Infome Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.informes',
            with: [
                'paciente' =>$this->recetas->cita->paciente->name ?? 'No disponible',
                'medico' =>$this->recetas->cita->medico->name ?? 'No disponible',
                'descripcion' => $this->recetas->descripcion ?? 'No disponible',
            ],
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
