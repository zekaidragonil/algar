<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use App\Models\Informes_medicos;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\InformeExport;
use App\Mail\InfomeMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class InformeController extends Controller
{
    public function index()
    {
        $medicoId = Auth::user()->id;
        $informes = Informes_medicos::with('cita')
        ->whereHas('cita', function ($query) use ($medicoId) {
            $query->where('medico_id', $medicoId);
        })
        ->get();

        return view('informes.index', compact('informes'));
    }

    public function create()
    {
        $medico_id = Auth::user()->id;
        $citas = Citas::where('medico_id', $medico_id)->get();
        return view('informes.create', compact('citas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cita_id' => 'required|exists:citas,id',
            'descripcion' => 'required|string|max:1000',
        ]);

        Informes_medicos::create($request->all());
        return redirect()->route('informes.index')->with('success', 'Informe creado exitosamente.');
    }

    public function show(Informes_medicos $informe)
    {
        return view('informes.show', compact('informe'));
    }

    public function edit(Informes_medicos $informe)
    {
        $citas = Citas::all();
        return view('informes.edit', compact('informe', 'citas'));
    }

    public function update(Request $request, Informes_medicos $informe)
    {
        $request->validate([
            'cita_id' => 'required|exists:citas,id',
            'descripcion' => 'required|string|max:1000',
        ]);

        $informe->update($request->all());
        return redirect()->route('informes.index')->with('success', 'Informe actualizado exitosamente.');
    }

    public function email($id)
    {
        $id_receta = $id;
        return view('informes.correo', compact('id_receta'));
    }

    public function destroy(Informes_medicos $informe)
    {
        $informe->delete();
        return redirect()->route('informes.index')->with('success', 'Informe eliminado exitosamente.');
    }

    public function exportToExcel()
    {
        return Excel::download(new InformeExport, 'citas.xlsx');
    }
    public function exportToPdf($id)
    {
        $informe = Informes_medicos::with('cita.paciente', 'cita.medico')->find($id);
        $pdf = Pdf::loadView('informes.pdf', compact('informe'));
        return $pdf->download('citas.pdf');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
    
       
        $receta = Informes_medicos::find($request->id_receta);
        if ($receta) {
            Mail::to($request->email)->send(new InfomeMail($receta));
           return  redirect()->route('informes.index')->with('success', 'informe enviada exitosamente');
        }
    
        return back()->with('error', 'No se encontró la receta.');
    }
}
