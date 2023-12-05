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
        $role1 = Role::firstOrCreate(['name' => 'Administrador']);
        $role2 = Role::firstOrCreate(['name' => 'Vendedor']);
        $role3 = Role::firstOrCreate(['name' => 'Almacenero']);
        $role4 = Role::firstOrCreate(['name' => 'Gerente']);
        //agreagar mas roles

        Permission::create(['name'=>'admin.home', 'description'=>'Ver el dasshboard'])->syncRoles($role1, $role2,$role3,$role4);


        //USUARIO
        Permission::create(['name'=>'admin.users.index','description'=>'Ver Listado de Usuario'])->syncRoles($role1);
        Permission::create(['name'=>'admin.users.update','description'=>'Editar usuario'])->syncRoles($role1);
        Permission::create(['name'=>'admin.users.edit','description'=>'Asignar Rol'])->syncRoles($role1);

        Permission::create(['name'=>'admin.users1',
                            'description'=>'Ver Listado de Usuario'])->syncRoles($role1);
        Permission::create(['name'=>'admin.users2',
                            'description'=>'Asignar Rol'])->syncRoles($role1);

        Permission::create(['name'=>'admin.users3',
                           'description'=>'Editar usuario'])->syncRoles($role1);

        //ROLES
        Permission::create(['name'=>'admin.roles.index','description'=>'Ver Lista de Roles'])->syncRoles($role1);

        //EMPLEADO
        Permission::create(['name'=>'VistaEmpleado.index', 'description'=>'Ver la Lista de empleado'])->syncRoles($role1);
        Permission::create(['name'=>'VistaEmpleado.Create', 'description'=>'Crear Nuevo Empleado'])->syncRoles($role1);
        Permission::create(['name'=>'VistaEmpleado.edit', 'description'=>'Editar Empleado'])->syncRoles($role1);
        Permission::create(['name'=>'VistaEmpleado.detroy', 'description'=>'Eliminar Empleado'])->syncRoles($role1);

        //PRODUCTO
        Permission::create(['name'=>'VistaProducto.index', 'description'=>'Ver Lista de Producto'])->syncRoles($role1,$role2,$role3);
        Permission::create(['name'=>'VistaProducto.create', 'description'=>'Crear Nuevo Producto'])->syncRoles($role1,$role4);
        Permission::create(['name'=>'VistaProducto.edit', 'description'=>'Editar Producto'])->syncRoles($role1,$role4);
        Permission::create(['name'=>'VistaProducto.detroy', 'description'=>'Eliminar Producto'])->syncRoles($role1,$role4);

        //PROVEEDORES
        Permission::create(['name'=>'VistaProvedor.index', 'description'=>'Ver Lista de Proveedores'])->syncRoles($role1,$role3);
        Permission::create(['name'=>'VistaProvedor.create', 'description'=>'Registrar Proveedor'])->syncRoles($role1);
        Permission::create(['name'=>'VistaProvedor.edit', 'description'=>'Editar Proveedores'])->syncRoles($role1);
        Permission::create(['name'=>'VistaProvedor.detroy', 'description'=>'Eliminar Proveedores'])->syncRoles($role1);

        //VSITAVENTA
        Permission::create(['name'=>'Gestionarventa', 'description'=>'Ver ventas'])->syncRoles($role1,$role2,$role4);

        Permission::create(['name'=>'Gestionarventa.create', 'description'=>'Registrar Proveedor'])->syncRoles($role1);

        Permission::create(['name'=>'Gestionarventa.edit', 'description'=>'Editar Proveedores'])->syncRoles($role1);
        Permission::create(['name'=>'Gestionarventa.detroy', 'description'=>'Eliminar ventas'])->syncRoles($role1,$role4);
        Permission::create(['name'=>'Gestionarventa.index', 'description'=>'Eliminar Proveedores'])->syncRoles($role1);

         //VISTACOMPRA
         Permission::create(['name'=>'Gestionarcompra', 'description'=>'Ver compras'])->syncRoles($role1,$role4);


         //empleados
         Permission::create(['name'=>'Vistaempleado', 'description'=>'Ver empleados'])->syncRoles($role1,$role4);

    }
}
