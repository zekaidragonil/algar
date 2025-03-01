<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'apellido', 'email', 'telefono', 'direccion', 'fecha_nacimiento', 'genero'];

    public function citas()
    {
        return $this->hasMany(Citas::class);
    }
}
