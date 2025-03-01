<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    use HasFactory;
    protected $fillable = ['paciente_id', 'medico_id', 'fecha_hora', 'estado', 'observaciones'];

    public function paciente()
    {
        return $this->belongsTo(User::class, 'paciente_id');
    }
    public function medico()
    {
        return $this->belongsTo(User::class);
    }

    public function informe()
    {
        return $this->hasOne(Informes_medicos::class);
    }

    public function factura()
    {
        return $this->hasOne(Facturas::class);
    }

    public function receta()
    {
        return $this->hasOne(recetas::class);
    }
}
