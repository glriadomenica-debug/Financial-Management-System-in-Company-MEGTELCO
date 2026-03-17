<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'pakote.view', 'pakote.create',
            'kliente.view', 'kliente.create',
            'kliente-pakote.view', 'kliente-pakote.create',
            'invoice.view', 'invoice.print',
            'transaksaun.view', 'transaksaun.create',
            'metodu-pagamentu.view', 'metodu-pagamentu.create',
            'depositu.view', 'depositu.create',
            'despeza.view', 'despeza.create',
            'likidasaun.view', 'likidasaun.create',
            'status-pagamentu.view',
            'relatoriu.view',
            'user.view', 'user.create',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
        $superadmin = Role::firstOrCreate(['name'=>'superadmin']);
        $admin = Role::firstOrCreate(['name' => 'admin']);
        $finance = Role::firstOrCreate(['name' => 'finance']);
        $director = Role::firstOrCreate(['name' => 'director']);

        $superadmin->givePermissionTo(Permission::all());

        $admin->givePermissionTo([
            'pakote.view', 'pakote.create',
            'kliente.view', 'kliente.create',
            'kliente-pakote.view', 'kliente-pakote.create',
            'invoice.view', 'invoice.print',
           
        ]);

        $finance->givePermissionTo([
            'kliente-pakote.view',
            'despeza.view', 'despeza.create',
            'likidasaun.view', 'likidasaun.create',
            'depositu.view', 'depositu.create',
            'status-pagamentu.view',
            'relatoriu.view',
        ]);

        $director->givePermissionTo([
            'pakote.view', 'kliente.view', 'kliente-pakote.view',
            'likidasaun.view', 'depositu.view', 'despeza.view',
            'status-pagamentu.view', 'relatoriu.view',
            'user.view', 'user.create'
        ]);
    }
}
