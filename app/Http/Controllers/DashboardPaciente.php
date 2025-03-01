<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citas;
use Carbon\Carbon;
use App\Models\Espacialidades;
use App\Models\Informes_medicos;
use App\Models\recetas;
use App\Models\Facturas;
use Illuminate\Support\Facades\Auth;


class DashboardPaciente extends Controller
{
    public function index()
    {    
        $especialidades = Espacialidades::all(); 
         $paciente_id = Auth::user()->id; 
         $citas = Citas::where('paciente_id', $paciente_id)->get();
         $informes = Informes_medicos::with('cita')->whereHas('cita', function($query) use ($paciente_id) {
            $query->where('paciente_id', $paciente_id);
        })->get();
         $recetas = recetas::with('cita')->whereHas('cita', function($query) use ($paciente_id) {
            $query->where('paciente_id', $paciente_id);
        })->get();
         $facturas = Facturas::with('cita')->whereHas('cita', function($query) use ($paciente_id) {
            $query->where('paciente_id', $paciente_id);
        })->get();
        return view('pacienteDashboard', compact('citas', 'especialidades', 'informes', 'recetas', 'facturas' ));
    }
}
