<?php

namespace App\Http\Controllers;

use App\Models\Espacialidades;
use Illuminate\Http\Request;

class EspecialidadController extends Controller
{
    public function index()
    {
        $especialidades = Espacialidades::all();
        return view('especialidades.index', compact('especialidades'));
    }

    public function create()
    {
        return view('especialidades.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        Espacialidades::create($request->all());
        return redirect()->route('especialidades.index')->with('success', 'Especialidad creada exitosamente.');
    }

    public function show(Espacialidades $especialidad)
    {
        return view('especialidades.show', compact('especialidad'));
    }

    public function edit(Espacialidades $especialidad)
    {
        return view('especialidades.edit', compact('especialidad'));
    }

    public function update(Request $request, Espacialidades $especialidad)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $especialidad->update($request->all());
        return redirect()->route('especialidades.index')->with('success', 'Especialidad actualizada exitosamente.');
    }

    public function destroy(Espacialidades $especialidad)
    {
        $especialidad->delete();
        return redirect()->route('especialidades.index')->with('success', 'Especialidad eliminada exitosamente.');
    }
}
