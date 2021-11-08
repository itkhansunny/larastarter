<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $moduleAppDashboard = Module::updateOrCreate(['name' => 'Admin Dashboard']);
        Permission::updateOrCreate([
            'module_id'  => $moduleAppDashboard->id,
            'name'      => 'Access Dashboard',
            'slug'      => 'app.dashboard'
        ]);

        $moduleAppRole = Module::updateOrCreate(['name' => 'Role Management']);
        Permission::updateOrCreate([
            'module_id'    => $moduleAppRole->id,
            'Name'      => 'Access Role',
            'slug'      => 'app.roles.index'
        ]);
        Permission::updateOrCreate([
            'module_id'    => $moduleAppRole->id,
            'Name'      => 'Create Role',
            'slug'      => 'app.roles.create'
        ]);
        Permission::updateOrCreate([
            'module_id'    => $moduleAppRole->id,
            'Name'      => 'Edit Role',
            'slug'      => 'app.roles.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'    => $moduleAppRole->id,
            'Name'      => 'Delete Role',
            'slug'      => 'app.roles.destroy'
        ]);

        $moduleAppUser = Module::updateOrCreate(['name' => 'User Management']);
        Permission::updateOrCreate([
            'module_id'    => $moduleAppUser->id,
            'Name'      => 'Access User',
            'slug'      => 'app.users.index'
        ]);
        Permission::updateOrCreate([
            'module_id'    => $moduleAppUser->id,
            'Name'      => 'Create User',
            'slug'      => 'app.users.create'
        ]);
        Permission::updateOrCreate([
            'module_id'    => $moduleAppUser->id,
            'Name'      => 'Edit User',
            'slug'      => 'app.users.edit'
        ]);
        Permission::updateOrCreate([
            'module_id'    => $moduleAppUser->id,
            'Name'      => 'Delete User',
            'slug'      => 'app.users.destroy'
        ]);
    }
}
