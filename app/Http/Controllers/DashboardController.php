<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Models\Espacialidades;

class DashboardController extends Controller
{
    public function index()
    {    
        $citas = Citas::all()->map(function($cita) {
            return [
                'title' => $cita->paciente->nombre . ' ' . $cita->paciente->apellido,
                'start' => Carbon::parse($cita->fecha_hora)->format('Y-m-d\TH:i:s'),
                
            ];
        });

        $pacientesCount = Role::where('name', 'paciente')->first()->users()->count();
        $medicosCount = Role::where('name', 'medico')->first()->users()->count();
        $especialidadesCount = Espacialidades::count();

        return view('dashboard', compact('citas', 'pacientesCount', 'medicosCount', 'especialidadesCount'));
    }
}
