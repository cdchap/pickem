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
        Permission::create(['name' => 'edit profile']);
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'view']);
        Permission::create(['name' => 'update']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'can pick 2020']);
        Permission::create(['name' => 'create league']);
        Permission::create(['name' => 'invite users']);

        // create roles and assign created permissions

       

        // or may be done by chaining
        $role1 = Role::create(['name' => 'user']);
        $role1->givePermissionTo('edit profile');
        
        $role2 = Role::create(['name' => 'admin']);
        $role2->givePermissionTo(['create league', 'invite users', 'update', 'edit profile']);

        $role3 = Role::create(['name' => 'super-admin']);
        $role3->givePermissionTo(Permission::all());
    }
}
