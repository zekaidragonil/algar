<?php

namespace App\Http\Controllers;

use App\Exports\RecetasExport;
use App\Mail\RecetasMail;
use App\Models\Citas;
use App\Models\recetas;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

class RecetaController extends Controller
{
    public function index()
    {
    
        $medicoId = Auth::user()->id;
        $recetas = recetas::with('cita')
        ->whereHas('cita', function ($query) use ($medicoId) {
            $query->where('medico_id', $medicoId);
        })
        ->get();
        return view('recetas.index', compact('recetas'));
    }

    public function create()
    {
        $medico_id = Auth::user()->id;
        $citas = Citas::where('medico_id', $medico_id)->get();
        return view('recetas.create', compact('citas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cita_id' => 'required|exists:citas,id',
            'medicamento' => 'required|string|max:255',
            'dosis' => 'required|string|max:255',
            'frecuencia' => 'required|string|max:255',
            'duracion' => 'required|string|max:255',
        ]);

        recetas::create($request->all());
        return redirect()->route('recetas.index')->with('success', 'Receta creada exitosamente.');
    }

    public function show(recetas $receta)
    {
        return view('recetas.show', compact('receta'));
    }
    public function email($id)
    {
        $id_receta = $id;
        return view('recetas.correo', compact('id_receta'));
    }

    public function edit(recetas $receta)
    {
        $citas = Citas::all();
        return view('recetas.edit', compact('receta', 'citas'));
    }

    public function update(Request $request, recetas $receta)
    {
        $request->validate([
            'cita_id' => 'required|exists:citas,id',
            'medicamento' => 'required|string|max:255',
            'dosis' => 'required|string|max:255',
            'frecuencia' => 'required|string|max:255',
            'duracion' => 'required|string|max:255',
        ]);

        $receta->update($request->all());
        return redirect()->route('recetas.index')->with('success', 'Receta actualizada exitosamente.');
    }

    public function destroy(recetas $receta)
    {
        $receta->delete();
        return redirect()->route('recetas.index')->with('success', 'Receta eliminada exitosamente.');
    }
    public function exportToExcel()
    {
        return Excel::download(new RecetasExport, 'recetas.xlsx');
    }
    public function exportToPdf($id)
    {
        $recetas = recetas::with('cita')->find($id);
        $pdf = Pdf::loadView('recetas.pdf', compact('recetas'));
        return $pdf->download('recetas.pdf');
    }

     

    public function sendEmail(Request $request)
{
    $request->validate([
        'email' => 'required|email',
    ]);

   
    $receta = recetas::find($request->id_receta);
    if ($receta) {
        Mail::to($request->email)->send(new RecetasMail($receta));

        return  redirect()->route('recetas.index')->with('success', 'Receta enviada exitosamente');
    }

    return back()->with('error', 'No se encontró la receta.');
}
}
