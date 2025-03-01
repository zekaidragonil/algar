<?php

namespace App\Mail;
use App\Models\recetas as Receta;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class RecetasMail extends Mailable
{
    use Queueable, SerializesModels;

    public $recetas;

    public function __construct(Receta $receta)
    {
        $this->recetas = $receta;
    }

    public function build()
    {
        
        if (!$this->recetas) {
            return; 
        }
    
        return $this->view('emails.recetas')
            ->subject('Tu receta médica')
            ->with([
                'paciente' =>$this->recetas->cita->paciente->name ?? 'No disponible',
                'medico' =>$this->recetas->cita->medico->name ?? 'No disponible',
                'medicamento' => $this->recetas->medicamento ?? 'No disponible',
                'dosis' => $this->recetas->dosis ?? 'No disponible',
                'frecuencia' => $this->recetas->frecuencia ?? 'No disponible',
                'duracion' => $this->recetas->duracion ?? 'No disponible',
            ]);
    }

    public function attachments(): array
    {
        return [];
    }
}