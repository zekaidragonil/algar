<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Spatie\Permission\Models\Role;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'index_crear']);
        Permission::create(['name' => 'index_ver']);
        
 
        //lista de roles
        $admin = Role::create(['name'=> 'admin']);
        $medico = Role::create(['name'=> 'medico']);
        $usuario = Role::create(['name'=> 'paciente']);
         
        // agregar permisos
        $admin->givePermissionTo([
         'index_crear'
        ]);
        $usuario->givePermissionTo([
         'index_ver'
        ]);
        // asignar usuario
         
        $root = User::create([
         'name' => 'administrador', 
         'email' => 'admin@negocio.com',
         'password' => bcrypt('12345678')
        ]);
          $root->assignRole('admin');
    }
}
