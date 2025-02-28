<?php

namespace Database\Seeders;

use App\Enum\PermissionEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define roles and check if they already exist
        $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => config('auth.defaults.guard')]);
        $managerRole = Role::firstOrCreate(['name' => 'manager', 'guard_name' => config('auth.defaults.guard')]);


        // Create permissions
        $blockUsers = Permission::firstOrCreate(['name' => PermissionEnum::BLOCK_USERS->value, 'guard_name' => config('auth.defaults.guard')]);
        $viewLoginLogs = Permission::firstOrCreate(['name' => PermissionEnum::VIEW_USERS_LOGIN_LOGS->value, 'guard_name' => config('auth.defaults.guard')]);
        $viewAdminDashboardInfo = Permission::firstOrCreate(['name' => PermissionEnum::VIEW_ADMIN_DASHBOARD->value, 'guard_name' => config('auth.defaults.guard')]);

        $viewUsers = Permission::firstOrCreate(['name' => PermissionEnum::VIEW_USERS->value, 'guard_name' => config('auth.defaults.guard')]);
        $createUser = Permission::firstOrCreate(['name' => PermissionEnum::CREATE_USER->value, 'guard_name' => config('auth.defaults.guard')]);
        $editUser = Permission::firstOrCreate(['name' => PermissionEnum::EDIT_USER->value, 'guard_name' => config('auth.defaults.guard')]);
        $deleteUser = Permission::firstOrCreate(['name' => PermissionEnum::DELETE_USER->value, 'guard_name' => config('auth.defaults.guard')]);

        $viewAdmins = Permission::firstOrCreate(['name' => PermissionEnum::VIEW_ADMINS->value, 'guard_name' => config('auth.defaults.guard')]);
        $createAdmin = Permission::firstOrCreate(['name' => PermissionEnum::CREATE_ADMIN->value, 'guard_name' => config('auth.defaults.guard')]);
        $editAdmin = Permission::firstOrCreate(['name' => PermissionEnum::EDIT_ADMIN->value, 'guard_name' => config('auth.defaults.guard')]);
        $deleteAdmin = Permission::firstOrCreate(['name' => PermissionEnum::DELETE_ADMIN->value, 'guard_name' => config('auth.defaults.guard')]);

        $viewManagers = Permission::firstOrCreate(['name' => PermissionEnum::VIEW_MANAGERS->value, 'guard_name' => config('auth.defaults.guard')]);
        $createManager = Permission::firstOrCreate(['name' => PermissionEnum::CREATE_MANAGER->value, 'guard_name' => config('auth.defaults.guard')]);
        $editManager = Permission::firstOrCreate(['name' => PermissionEnum::EDIT_MANAGER->value, 'guard_name' => config('auth.defaults.guard')]);
        $deleteManager = Permission::firstOrCreate(['name' => PermissionEnum::DELETE_MANAGER->value, 'guard_name' => config('auth.defaults.guard')]);


        // Assign permissions to roles
        $adminRole->syncPermissions(Permission::all());


        $managerRole->syncPermissions(Permission::all());


    }
}
