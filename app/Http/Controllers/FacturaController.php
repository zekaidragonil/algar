<?php

namespace App\Http\Controllers;

use App\Models\Citas;
use App\Models\Facturas;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Mail\FacturaMail;
use App\Exports\FacturasExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FacturaController extends Controller
{
    public function index()
    {
        $medicoId = Auth::user()->id;
        $facturas = Facturas::with('cita')
        ->whereHas('cita', function ($query) use ($medicoId) {
            $query->where('medico_id', $medicoId);
        })
        ->get();
        return view('facturas.index', compact('facturas'));
    }

    public function create()
    {
        $medico_id = Auth::user()->id;
        $citas = Citas::where('medico_id', $medico_id)->get();
        return view('facturas.create', compact('citas'));
    }


    public function email($id)
    {
        $id_receta = $id;
        return view('facturas.correo', compact('id_receta'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'cita_id' => 'required|exists:citas,id',
            'monto_total' => 'required|numeric',
            'metodo_pago' => 'required|in:efectivo,tarjeta,transferencia',
        ]);

        Facturas::create($request->all());
        return redirect()->route('facturas.index')->with('success', 'Factura creada exitosamente.');
    }

    public function show(Facturas $factura)
    {
        return view('facturas.show', compact('factura'));
    }

    public function edit(Facturas $factura)
    {
        $citas = Citas::all();
        return view('facturas.edit', compact('factura', 'citas'));
    }

    public function update(Request $request, Facturas $factura)
    {
        $request->validate([
            'cita_id' => 'required|exists:citas,id',
            'monto_total' => 'required|numeric',
            'metodo_pago' => 'required|in:efectivo,tarjeta,transferencia',
        ]);

        $factura->update($request->all());
        return redirect()->route('facturas.index')->with('success', 'Factura actualizada exitosamente.');
    }

    public function destroy(Facturas $factura)
    {
        $factura->delete();
        return redirect()->route('facturas.index')->with('success', 'Factura eliminada exitosamente.');
    }

    public function exportToExcel()
    {
        return Excel::download(new FacturasExport, 'citas.xlsx');
    }
    public function exportToPdf()
    {
        $recetas = Facturas::all();
        $pdf = Pdf::loadView('facturas.pdf', compact('recetas'));
        return $pdf->download('citas.pdf');
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);
    
       
        $receta = Facturas::find($request->id_receta);
        if ($receta) {
            Mail::to($request->email)->send(new FacturaMail($receta));
           return  redirect()->route('facturas.index')->with('success', 'informe enviada exitosamente');
        }
    
        return back()->with('error', 'No se encontró la receta.');
    }
}
