<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informes_medicos extends Model
{
    use HasFactory;
    protected $fillable = ['cita_id', 'descripcion'];

    public function cita()
    {
        return $this->belongsTo(Citas::class);
    }
}
