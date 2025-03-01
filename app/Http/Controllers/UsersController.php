<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Espacialidades;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role; 

class UsersController extends Controller
{
     public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $users = User::all();

        } elseif (Auth::user()->hasRole('medico')) {
            
            $role = Role::where('name', 'paciente')->first();
            $users = $role ? $role->users : collect(); 
        } else {
            $users = collect();
        }
        return view('users.index', compact('users'));
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'string', 'in:admin,medico,paciente'],
        ]);
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'especilidad' => $request->especialidad,
        ]);
        
        $user->assignRole($request->role);

        return redirect()->route('users.index')->with('success', 'Users creada exitosamente.');

    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $especialidades = Espacialidades::all();
        return view('users.edit', compact('user', 'especialidades'));
    }

    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);
        // Actualizar solo el rol y la contraseña si se proporcionan
             
        $user->syncRoles($request->role);
        
       
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')->with('success', 'Usuario actualizado correctamente.');
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Usuario eliminado correctamente.');
    }


    public function create()
    {
        $especialidades = Espacialidades::all();
        return view('users.create', compact('especialidades'));
    }

}
