<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturas extends Model
{
    use HasFactory;
    
    protected $fillable = ['cita_id', 'monto_total', 'metodo_pago'];

    public function cita()
    {
        return $this->belongsTo(Citas::class);
    }
}
