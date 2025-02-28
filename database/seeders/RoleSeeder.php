<?php

namespace Database\Seeders;

use App\Enum\UserRoleEnum;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => UserRoleEnum::ADMIN->value, 'guard_name' => config('auth.defaults.guard')]);
        $userRole = Role::create(['name' => UserRoleEnum::USER->value, 'guard_name' => config('auth.defaults.guard')]);
        $managerRole = Role::create(['name' => UserRoleEnum::MANAGER->value, 'guard_name' => config('auth.defaults.guard')]);


        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123123'),
            'email_verified_at' => now()
        ]);
        $user = User::create([
            'name' => 'User',
            'email' => 'user@transform.com',
            'password' => Hash::make('123123'),
            'email_verified_at' => now()
        ]);
        $manager = User::create([
            'name' => 'manager',
            'email' => 'manager@manager.com',
            'password' => Hash::make('123123'),
            'email_verified_at' => now()
        ]);

        $manager->assignRole($managerRole);
        $user->assignRole($userRole);
        $admin->assignRole($adminRole);
    }
}
