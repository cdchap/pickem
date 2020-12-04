<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'make picks']);
        Permission::create(['name' => 'edit profile']);
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'view']);
        Permission::create(['name' => 'update']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'pick2020']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'basic']);
        $role->givePermissionTo('make picks');

        // or may be done by chaining
        $role = Role::create(['name' => 'user'])
            ->givePermissionTo(['edit profile', 'pick2020']);
        
        $role = Role::create(['name' => 'admin'])
            ->givePermissionTo(['edit', 'view', 'update', 'edit profile']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
    }
}
