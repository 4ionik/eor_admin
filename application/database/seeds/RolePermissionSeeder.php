<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

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
        app()[PermissionRegistrar::class]->forgetCachedPermissions();
        // create permissions
        $permissions = [
            'update-settings',
            'view-user',
            'create-user',
            'update-user',
            'destroy-user',
            'view-role',
            'view-permission',
            'create-role',
            'create-permission',
            'update-role',
            'update-permission',
            'destroy-role',
            'destroy-permission',
            'view-activity-log',
            'view-project',
            'create-project',
            'update-project',
            'destroy-project',
            'view-post',
            'create-post',
            'update-post',
            'destroy-post',
            'viewer-explorer',
            'update-profile'
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
        // Create Super user & role
        $admin= Role::create(['name' => 'super-admin']);
        $admin->syncPermissions($permissions);

        $usr = User::create([
            'name'=> 'Super Admin',
            'email' => 'super_admin@eor.com',
            'password' => 'Supereor2021$',
            'status' => true,
            'email_verified_at' => now(),
        ]);

        $usr->assignRole($admin);

        $usr->syncPermissions($permissions);

        // Create user & role
        $role = Role::create(['name' => 'user']);
        $role->givePermissionTo('view-post');
        $role->givePermissionTo('view-project');
        $role->givePermissionTo('viewer-explorer');

        $user = User::create([
            'name'=> 'User',
            'email' => 'user@eor.com',
            'password' => 'Usereor2021$',
            'status' => true,
            'email_verified_at' => now(),
        ]);
        $user->assignRole($role);
    }
}
