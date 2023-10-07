<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission as ModelsPermission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        // app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Admin
        ModelsPermission::create(['name' => 'add-user']);
        ModelsPermission::create(['name' => 'edit-user']);
        ModelsPermission::create(['name' => 'destroy-user']);

        ModelsPermission::create(['name' => 'add-city']);
        ModelsPermission::create(['name' => 'edit-city']);
        ModelsPermission::create(['name' => 'destroy-city']);

        ModelsPermission::create(['name' => 'add-facility']);
        ModelsPermission::create(['name' => 'edit-facility']);
        ModelsPermission::create(['name' => 'destroy-facility']);

        ModelsPermission::create(['name' => 'add-asset']);
        ModelsPermission::create(['name' => 'edit-asset']);
        ModelsPermission::create(['name' => 'destroy-asset']);

        ModelsPermission::create(['name' => 'add-inventory']);
        ModelsPermission::create(['name' => 'edit-inventory']);
        ModelsPermission::create(['name' => 'destroy-inventory']);

        ModelsPermission::create(['name' => 'show-borrow']);
        ModelsPermission::create(['name' => 'add-borrow']);
        ModelsPermission::create(['name' => 'edit-borrow']);
        ModelsPermission::create(['name' => 'destroy-borrow']);

        ModelsPermission::create(['name' => 'add-employee']);
        ModelsPermission::create(['name' => 'edit-employee']);
        ModelsPermission::create(['name' => 'destroy-employee']);

        // User
        ModelsPermission::create(['name' => 'add-asset']);
        ModelsPermission::create(['name' => 'edit-asset']);

        ModelsPermission::create(['name' => 'add-inventory']);
        ModelsPermission::create(['name' => 'edit-inventory']);

        ModelsPermission::create(['name' => 'show-borrow']);
        ModelsPermission::create(['name' => 'add-borrow']);
        ModelsPermission::create(['name' => 'edit-borrow']);

        // Add Role Admin
        $roleAdmin = Role::create(['name' => 'Admin']);

        // Permission Role User
        $roleAdmin->givePermissionTo('add-user');
        $roleAdmin->givePermissionTo('edit-user');
        $roleAdmin->givePermissionTo('destroy-user');

        $roleAdmin->givePermissionTo('add-employee');
        $roleAdmin->givePermissionTo('edit-employee');
        $roleAdmin->givePermissionTo('destroy-employee');

        $roleAdmin->givePermissionTo('add-city');
        $roleAdmin->givePermissionTo('edit-city');
        $roleAdmin->givePermissionTo('destroy-city');

        $roleAdmin->givePermissionTo('add-facility');
        $roleAdmin->givePermissionTo('edit-facility');
        $roleAdmin->givePermissionTo('destroy-facility');

        $roleAdmin->givePermissionTo('add-asset');
        $roleAdmin->givePermissionTo('edit-asset');
        $roleAdmin->givePermissionTo('destroy-asset');

        $roleAdmin->givePermissionTo('add-inventory');
        $roleAdmin->givePermissionTo('edit-inventory');
        $roleAdmin->givePermissionTo('destroy-inventory');

        $roleAdmin->givePermissionTo('show-borrow');
        $roleAdmin->givePermissionTo('add-borrow');
        $roleAdmin->givePermissionTo('edit-borrow');
        $roleAdmin->givePermissionTo('destroy-borrow');

        // Add Role User
        $roleUser = Role::create(['name' => 'User']);

        // Permission Role User
        $roleUser->givePermissionTo('add-asset');
        $roleUser->givePermissionTo('edit-asset');

        $roleUser->givePermissionTo('add-inventory');
        $roleUser->givePermissionTo('edit-inventory');

        $roleUser->givePermissionTo('show-borrow');
        $roleUser->givePermissionTo('add-borrow');
        $roleUser->givePermissionTo('edit-borrow');
    }
}
