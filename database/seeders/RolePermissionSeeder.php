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
        ModelsPermission::create(['name' => 'delete-user']);

        ModelsPermission::create(['name' => 'show-city']);
        ModelsPermission::create(['name' => 'add-city']);
        ModelsPermission::create(['name' => 'edit-city']);
        ModelsPermission::create(['name' => 'delete-city']);

        ModelsPermission::create(['name' => 'add-facility']);
        ModelsPermission::create(['name' => 'edit-facility']);
        ModelsPermission::create(['name' => 'delete-facility']);

        ModelsPermission::create(['name' => 'delete-asset']);
        ModelsPermission::create(['name' => 'delete-inventory']);

        // User
        ModelsPermission::create(['name' => 'show-asset']);
        ModelsPermission::create(['name' => 'add-asset']);
        ModelsPermission::create(['name' => 'edit-asset']);

        ModelsPermission::create(['name' => 'show-inventory']);
        ModelsPermission::create(['name' => 'add-inventory']);
        ModelsPermission::create(['name' => 'edit-inventory']);

        ModelsPermission::create(['name' => 'show-lending']);
        ModelsPermission::create(['name' => 'add-lending']);
        ModelsPermission::create(['name' => 'edit-lending']);
        ModelsPermission::create(['name' => 'delete-lending']);

        // Add Role Admin
        $roleAdmin = Role::create(['name' => 'admin']);

        // Permission Role User
        $roleAdmin->givePermissionTo('add-user');
        $roleAdmin->givePermissionTo('edit-user');
        $roleAdmin->givePermissionTo('delete-user');

        $roleAdmin->givePermissionTo('show-city');
        $roleAdmin->givePermissionTo('add-city');
        $roleAdmin->givePermissionTo('edit-city');
        $roleAdmin->givePermissionTo('delete-city');

        $roleAdmin->givePermissionTo('add-facility');
        $roleAdmin->givePermissionTo('edit-facility');
        $roleAdmin->givePermissionTo('delete-facility');

        $roleAdmin->givePermissionTo('delete-asset');
        $roleAdmin->givePermissionTo('delete-inventory');

        // Add Role User
        $roleUser = Role::create(['name' => 'user']);

        // Permission Role User
        $roleUser->givePermissionTo('add-asset');
        $roleUser->givePermissionTo('edit-asset');
        $roleUser->givePermissionTo('delete-asset');

        $roleUser->givePermissionTo('add-inventory');
        $roleUser->givePermissionTo('edit-inventory');
        $roleUser->givePermissionTo('delete-inventory');

        $roleUser->givePermissionTo('show-lending');
        $roleUser->givePermissionTo('add-lending');
        $roleUser->givePermissionTo('edit-lending');
        $roleUser->givePermissionTo('delete-lending');
    }
}
