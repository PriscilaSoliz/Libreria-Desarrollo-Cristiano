<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use app\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        $role1 = Role::firstOrCreate(['name' => 'admin']);
        $role2 = Role::firstOrCreate(['name' => 'empleado']);
        //agreagar mas roles

        Permission::create(['name'=>'admin.home'])->syncRoles($role1, $role2);

        Permission::create(['name'=>'admin.users.index'])->syncRoles($role1);
        Permission::create(['name'=>'admin.users.edit'])->syncRoles($role1);
        Permission::create(['name'=>'admin.users.update'])->syncRoles($role1);

        Permission::create(['name'=>'VistaEmpleado.Create'])->syncRoles($role1);
        Permission::create(['name'=>'VistaEmpleado.edit'])->syncRoles($role1);
        Permission::create(['name'=>'VistaEmpleado.index'])->syncRoles($role1);

        Permission::create(['name'=>'VistaProducto.Create'])->syncRoles($role1);
        Permission::create(['name'=>'VistaProducto.edit'])->syncRoles($role1);
        Permission::create(['name'=>'VistaProducto.index'])->syncRoles($role1,$role2);
    }
}
