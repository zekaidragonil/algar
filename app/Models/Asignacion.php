<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    use HasFactory;
    protected $fillable = ['doctor_id', 'asignado'];

    public function especialidad()
    {
        return $this->belongsTo(Espacialidades::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function cita()
    {
        return $this->belongsTo(Citas::class, 'asignado');
    }
}
