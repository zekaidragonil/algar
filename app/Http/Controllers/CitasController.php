<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Paciente;
use App\Models\Espacialidades;
use App\Exports\CitasExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class CitasController extends Controller
{
    public function index()
    {
        $citas = Citas::with('paciente')->where('estado', 'pendiente')->get();
        $asignacion = Doctor::with('user', 'cita')->get();
        $doctores = User::role('medico')->get();
        $especialidades = Espacialidades::all(); 
        return view('citas.index', compact('citas', 'doctores', 'especialidades','asignacion'));
    }

    public function create()
    {
        $pacientes = Paciente::all();
        $medicos = Doctor::with('especialidad')->get();
        return view('citas.create', compact('pacientes', 'medicos'));
    }

    public function store(Request $request)
    {
         $crear = new Citas();
         $crear->paciente_id = auth()->user()->id;
         $crear->estado = 'pendiente';
         $crear->especialidad = $request->especialidad;
         $crear->save();

        return redirect()->route('dashboardpaciente')->with('success', 'Cita creada exitosamente.');
    }
    
   

    public function show(Citas $cita)
    {
        return view('citas.show', compact('cita'));
    }

    public function edit(Citas $cita)
    {
        return view('citas.edit', compact('cita'));
    }

    public function update(Request $request, Citas $cita)
    {
        $request->validate([
            'fecha_hora' => 'required|date_format:Y-m-d\TH:i',
            'estado' => 'required|in:pendiente,completada,cancelada',
            'observaciones' => 'nullable|string|max:1000',
        ]);

        $cita->update($request->all());
        return redirect()->route('dashboardmedico')->with('success', 'Cita Tomada exitosamente.');
    }

    public function destroy(Citas $cita)
    {
        $cita->delete();
        return redirect()->route('citas.index')->with('success', 'Cita eliminada exitosamente.');
    }
    public function exportToExcel()
    {
        return Excel::download(new CitasExport, 'citas.xlsx');
    }
    public function exportToPdf($id)
    {
        $recetas = Citas::find($id);
        $pdf = Pdf::loadView('citas.pdf', compact('recetas'));
        return $pdf->download('citas.pdf');
    }

    public function sendByEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
    
        $recetas = recetas::with('cita')->get();
        Mail::to($request->email)->send(new RecetasMail($recetas));
    
        return redirect()->route('recetas.index')->with('success', 'Correo enviado exitosamente a ' . $request->email);
    }
}