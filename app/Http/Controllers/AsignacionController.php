<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citas;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Paciente;
use App\Models\Asignacion;
use App\Models\Espacialidades;

class AsignacionController extends Controller
{
    public function index()
    {
        $asignacion = Asignacion::with('user', 'cita')->get();
        return view('Asignacion.index', compact('asignacion'));
    }

    public function create()
    {
        $citas = Citas::with('paciente')->where('estado', 'pendiente')->get();
        $doctores = User::role('medico')->get();
        return view('Asignacion.create', compact('citas', 'doctores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:users,id',
            'asignado' => 'required|exists:citas,id'
        ]);

        $cita = Citas::find($request->asignado);
         
         $cita->update([
            'medico_id' => $request->doctor_id,
         ]);

        Asignacion::create([
            'doctor_id' => $request->input('doctor_id'),
            'asignado' => $request->input('asignado'),
        ]);

        return redirect()->route('asignacion.index')->with('success', 'Cita actualizada exitosamente.');
    }

    public function edit($id)
    {
        $asignacion = Asignacion::findOrFail($id);
        $citas = Citas::with('paciente')->where('estado', 'pendiente')->get();
        $doctores = User::role('medico')->get();
        
        return view('Asignacion.edit', compact('asignacion', 'citas', 'doctores'));
    }

    public function update(Request $request, $id)
    {
        // Validación de los datos
        $request->validate([
            'doctor_id' => 'required|exists:users,id',
            'asignado' => 'required|exists:citas,id'
        ]);

        $asignacion = Asignacion::findOrFail($id);
        $asignacion->update([
            'doctor_id' => $request->input('doctor_id'),
            'asignado' => $request->input('asignado'),
        ]);

        return redirect()->route('asignacion.index')->with('success', 'Cita actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $asignacion = Asignacion::findOrFail($id);
        $asignacion->delete();

        return redirect()->route('asignacion.index')->with('success', 'Cita eliminada exitosamente.');
    }
}
