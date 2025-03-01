<?php

use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CitasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\InformeController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\DashboardPaciente;
use App\Http\Controllers\DashboardMedico;
use App\Http\Controllers\AsignacionController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('recetas/export', [RecetaController::class, 'exportToExcel'])->name('recetas.export');
Route::get('recetas/pdf/{id}', [RecetaController::class, 'exportToPdf'])->name('recetas.pdf');
Route::get('cita/export', [CitasController::class, 'exportToExcel'])->name('cita.export');
Route::get('cita/pdf/{id}', [CitasController::class, 'exportToPdf'])->name('cita.pdf');
Route::get('informe/export', [InformeController::class, 'exportToExcel'])->name('informe.export');
Route::get('informe/pdf/{id}', [InformeController::class, 'exportToPdf'])->name('informe.pdf');
Route::get('factura/export', [FacturaController::class, 'exportToExcel'])->name('facturas.export');
Route::get('factura/pdf', [FacturaController::class, 'exportToPdf'])->name('facturas.pdf');
Route::get('/cita/correo/{id}', [RecetaController::class, 'email'])->name('correo');
Route::get('/informe/correo/{id}', [InformeController::class, 'email'])->name('inf.correo');
Route::get('/factura/correo/{id}', [FacturaController::class, 'email'])->name('factura.correo');
Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified',  'role:admin'])->name('dashboard');
Route::get('/pacienteDash', [DashboardPaciente::class, 'index'])->middleware(['auth', 'verified'])->name('dashboardpaciente');
Route::get('/doc-Dash', [DashboardMedico::class, 'index'])->middleware(['auth', 'verified'])->name('dashboardmedico');
Route::post('/citas', [CitasController::class, 'store'])->name('citas.store');
Route::get('/login-medico', function () {
    return view('auth.login-medico');
})->name('login-medico');

Route::get('/login-admin', function () {
    return view('auth.login-admin');
})->name('login-admin');
Route::middleware(['auth', 'verified' ,'role:admin'  ])->group(function () {
    Route::get('/especialidades', [EspecialidadController::class, 'index'])->name('especialidades.index');
    Route::get('/especialidades/create', [EspecialidadController::class, 'create'])->name('especialidades.create');
    Route::post('/especialidades', [EspecialidadController::class, 'store'])->name('especialidades.store');
    Route::get('/especialidades/{especialidad}', [EspecialidadController::class, 'show'])->name('especialidades.show');
    Route::get('/especialidades/{especialidad}/edit', [EspecialidadController::class, 'edit'])->name('especialidades.edit');
    Route::put('/especialidades/{especialidad}', [EspecialidadController::class, 'update'])->name('especialidades.update');
    Route::delete('/especialidades/{especialidad}', [EspecialidadController::class, 'destroy'])->name('especialidades.destroy');
});

Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/asignacion', [AsignacionController::class, 'index'])->name('asignacion.index');
    Route::get('/create', [AsignacionController::class, 'create'])->name('asignacion.create');
    Route::post('/asignacion/create', [AsignacionController::class, 'store'])->name('asignacion.store');
    Route::get('/asignacion/{id}/edit', [AsignacionController::class, 'edit'])->name('asignacion.edit');
    Route::put('/asignacion/{id}', [AsignacionController::class, 'update'])->name('asignacion.update');
    Route::delete('/asignacion/{id}', [AsignacionController::class, 'destroy'])->name('asignacion.destroy');
});
Route::middleware(['auth', 'verified', 'role:admin|medico'])->group(function () {
    Route::get('/users', [UsersController::class,'index'])->name('users.index');
    Route::get('/users/create', [UsersController::class, 'create'])->name('users.create');
    Route::post('/users', [UsersController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UsersController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UsersController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UsersController::class, 'destroy'])->name('users.destroy');

});

Route::middleware(['auth', 'verified', 'role:medico'])->group(function () {
    Route::get('/pacientes', [PacienteController::class, 'index'])->name('pacientes.index');
    Route::get('/pacientes/create', [PacienteController::class, 'create'])->name('pacientes.create');
    Route::post('/pacientes', [PacienteController::class, 'store'])->name('pacientes.store');
    Route::get('/pacientes/{paciente}', [PacienteController::class, 'show'])->name('pacientes.show');
    Route::get('/pacientes/{paciente}/edit', [PacienteController::class, 'edit'])->name('pacientes.edit');
    Route::put('/pacientes/{paciente}', [PacienteController::class, 'update'])->name('pacientes.update');
    Route::delete('/pacientes/{paciente}', [PacienteController::class, 'destroy'])->name('pacientes.destroy');
});

Route::middleware(['auth', 'verified', 'role:medico'])->group(function () {
    Route::get('/medicos', [MedicoController::class, 'index'])->name('medicos.index');
    Route::get('/medicos/create', [MedicoController::class, 'create'])->name('medicos.create');
    Route::get('/medicos/{medico}', [MedicoController::class, 'show'])->name('medicos.show');
    Route::get('/medicos/{medico}/edit', [MedicoController::class, 'edit'])->name('medicos.edit');
    Route::put('/medicos/{medico}', [MedicoController::class, 'update'])->name('medicos.update');
    Route::delete('/medicos/{medico}', [MedicoController::class, 'destroy'])->name('medicos.destroy');
});
Route::middleware(['auth', 'verified', 'role:medico'])->group(function () {
    Route::get('/citas', [CitasController::class, 'index'])->name('citas.index');
    Route::get('/citas/create', [CitasController::class, 'create'])->name('citas.create');
    
    Route::post('/asignado', [CitasController::class, 'asignacion'])->name('medicos.store');
    Route::get('/citas/{cita}', [CitasController::class, 'show'])->name('citas.show');
    Route::get('/citas/{cita}/edit', [CitasController::class, 'edit'])->name('citas.edit');
    Route::put('/citas/{cita}', [CitasController::class, 'update'])->name('citas.update');
    Route::delete('/citas/{cita}', [CitasController::class, 'destroy'])->name('citas.destroy');
});
Route::middleware(['auth', 'verified', 'role:medico'])->group(function () {
    Route::get('/informes', [InformeController::class, 'index'])->name('informes.index');
    Route::get('/informes/create', [InformeController::class, 'create'])->name('informes.create');
    Route::post('/informes', [InformeController::class, 'store'])->name('informes.store');
    Route::get('/informes/{informe}', [InformeController::class, 'show'])->name('informes.show');
    Route::get('/informes/{informe}/edit', [InformeController::class, 'edit'])->name('informes.edit');
    Route::put('/informes/{informe}', [InformeController::class, 'update'])->name('informes.update');
    Route::delete('/informes/{informe}', [InformeController::class, 'destroy'])->name('informes.destroy');
    Route::post('/informes/correo', [InformeController::class, 'sendEmail'])->name('informe.send-email');
});
Route::middleware(['auth', 'verified' , 'role:medico'])->group(function () {
    Route::get('/facturas', [FacturaController::class, 'index'])->name('facturas.index');
    Route::get('/facturas/create', [FacturaController::class, 'create'])->name('facturas.create');
    Route::post('/facturas', [FacturaController::class, 'store'])->name('facturas.store');
    Route::get('/facturas/{factura}', [FacturaController::class, 'show'])->name('facturas.show');
    Route::get('/facturas/{factura}/edit', [FacturaController::class, 'edit'])->name('facturas.edit');
    Route::put('/facturas/{factura}', [FacturaController::class, 'update'])->name('facturas.update');
    Route::delete('/facturas/{factura}', [FacturaController::class, 'destroy'])->name('facturas.destroy');
    Route::post('/factura/correo', [FacturaController::class, 'sendEmail'])->name('factura.send-email');
});

Route::middleware(['auth', 'verified' , 'role:medico'])->group(function () {
    Route::get('/recetas', [RecetaController::class, 'index'])->name('recetas.index');
    Route::get('/recetas/create', [RecetaController::class, 'create'])->name('recetas.create');
    Route::post('/recetas', [RecetaController::class, 'store'])->name('recetas.store');
    Route::get('/recetas/{receta}', [RecetaController::class, 'show'])->name('recetas.show');
    Route::get('/recetas/{receta}/edit', [RecetaController::class, 'edit'])->name('recetas.edit');
    Route::put('/recetas/{receta}', [RecetaController::class, 'update'])->name('recetas.update');
    Route::delete('/recetas/{receta}', [RecetaController::class, 'destroy'])->name('recetas.destroy');
  
    Route::post('/recetas/correo', [RecetaController::class, 'sendEmail'])->name('recetas.send-email');
   
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
