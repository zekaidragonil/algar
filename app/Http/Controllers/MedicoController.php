<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Espacialidades;
use Illuminate\Http\Request;

class MedicoController extends Controller
{
    public function index()
    {
        $medicos = Doctor::with('especialidad')->get();
        return view('medicos.index', compact('medicos'));
    }

    public function create()
    {
        $especialidades = Espacialidades::all();
        return view('medicos.create', compact('especialidades'));
    }

    public function store(Request $request)
    {
           $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'asignado'   => 'required|exists:citas,id',
        ]);

         dd($request->all());
         $cita = new Doctor();
        $cita->asignado = $request->asignado;
        $cita->medico_id = $request->doctor_id;

        $cita->save();
        return redirect()->back()->with('success', 'Cita asignada correctamente.');
    }

    public function show(Doctor $medico)
    {
        return view('medicos.show', compact('medico'));
    }

    public function edit(Doctor $medico)
    {
        $especialidades = Espacialidades::all();
        return view('medicos.edit', compact('medico', 'especialidades'));
    }

    public function update(Request $request, Doctor $medico)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:doctors,email,' . $medico->id,
            'telefono' => 'required|string|max:20',
            'especialidad_id' => 'required|exists:espacialidades,id',
        ]);

        $medico->update($request->all());
        return redirect()->route('medicos.index')->with('success', 'Médico actualizado exitosamente.');
    }

    public function destroy(Doctor $medico)
    {
        $medico->delete();
        return redirect()->route('medicos.index')->with('success', 'Médico eliminado exitosamente.');
    }
}
