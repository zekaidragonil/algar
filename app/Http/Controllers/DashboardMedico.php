<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Citas;
use Illuminate\Support\Facades\Auth;

class DashboardMedico extends Controller
{
    public function index()
    {    
        $medico_id = Auth::user()->id;
        $citas = Citas::where('medico_id', $medico_id)->get();
        return view('MedicosDasboard', compact('citas'));
    }
}
