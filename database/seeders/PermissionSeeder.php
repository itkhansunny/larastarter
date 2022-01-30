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
        // Dashboard
        $moduleAppDashboard = Module::updateOrCreate(['name' => 'Admin Dashboard']);
        Permission::updateOrCreate([
            'module_id'  => $moduleAppDashboard->id,
            'name'      => 'Access Dashboard',
            'slug'      => 'app.dashboard'
        ]);

        //Roles
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

        //Users
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

        // Backups
        $moduleAppBackups = Module::updateOrCreate(['name' => 'Backups']);
        Permission::updateOrCreate([
            'module_id'    => $moduleAppBackups->id,
            'Name'      => 'Access Backups',
            'slug'      => 'app.backups.index'
        ]);
        Permission::updateOrCreate([
            'module_id'    => $moduleAppBackups->id,
            'Name'      => 'Create Backup',
            'slug'      => 'app.backups.create'
        ]);
        Permission::updateOrCreate([
            'module_id'    => $moduleAppBackups->id,
            'Name'      => 'Download Backup',
            'slug'      => 'app.backups.download'
        ]);
        Permission::updateOrCreate([
            'module_id'    => $moduleAppBackups->id,
            'Name'      => 'Delete Backup',
            'slug'      => 'app.backups.destroy'
        ]);

        // Pages
        $moduleAppPages = Module::updateOrCreate(['name' => 'Page']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppPages->id,
            'Name'      => 'Access Pages',
            'slug'      => 'app.pages.index'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppPages->id,
            'Name'      => 'Create Page',
            'slug'      => 'app.pages.create'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppPages->id,
            'Name'      => 'Edit Page',
            'slug'      => 'app.pages.edit'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppPages->id,
            'Name'      => 'Delete Page',
            'slug'      => 'app.pages.destroy'
        ]);

        // Menus
        $moduleAppMenus = Module::updateOrCreate(['name' => 'Menu']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppMenus->id,
            'Name'      => 'Access Menus',
            'slug'      => 'app.menus.index'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppMenus->id,
            'Name'      => 'Access Menu Builder',
            'slug'      => 'app.menus.builder'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppMenus->id,
            'Name'      => 'Create Menu',
            'slug'      => 'app.menus.create'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppMenus->id,
            'Name'      => 'Edit Menu',
            'slug'      => 'app.menus.edit'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppMenus->id,
            'Name'      => 'Delete Menu',
            'slug'      => 'app.menus.destroy'
        ]);
    }
}
