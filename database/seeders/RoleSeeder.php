<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Role::create(['name' => 'administrador']);
        #MODULO Clientes
        Role::create(['name' => 'Clientes - Crear' , 'group_name' => 'A']);
        Role::create(['name' => 'Clientes - Editar' , 'group_name' => 'A']);
        Role::create(['name' => 'Clientes - Eliminar' , 'group_name' => 'A']);
        Role::create(['name' => 'Clientes - Ver' , 'group_name' => 'A']);
        #MODULO Propiedades
        Role::create(['name' => 'Propiedades - Crear' , 'group_name' => 'B']);
        Role::create(['name' => 'Propiedades - Editar' , 'group_name' => 'B']);
        Role::create(['name' => 'Propiedades - Eliminar' , 'group_name' => 'B']);
        Role::create(['name' => 'Propiedades - Ver' , 'group_name' => 'B']);
        #MODULO Contratos
        Role::create(['name' => 'Contratos - Crear' , 'group_name' => 'C']);
        Role::create(['name' => 'Contratos - Editar' , 'group_name' => 'C']);
        Role::create(['name' => 'Contratos - Eliminar' , 'group_name' => 'C']);
        Role::create(['name' => 'Contratos - Ver' , 'group_name' => 'C']);
        #MODULO Movimientos
        Role::create(['name' => 'Movimientos - Crear' , 'group_name' => 'D']);
        Role::create(['name' => 'Movimientos - Editar' , 'group_name' => 'D']);
        Role::create(['name' => 'Movimientos - Eliminar' , 'group_name' => 'D']);
        Role::create(['name' => 'Movimientos - Ver' , 'group_name' => 'D']);

    }
}
