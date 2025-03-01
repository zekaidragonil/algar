<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recetas extends Model
{
    use HasFactory;
    protected $fillable = ['cita_id', 'medicamento', 'dosis', 'frecuencia', 'duracion'];

    public function cita()
    {
        return $this->belongsTo(Citas::class);
    }
}
