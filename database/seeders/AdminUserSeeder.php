<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        Role::firstOrCreate(['name' => 'super-admin', 'guard_name' => 'web']);
        Role::firstOrCreate(['name' => 'editor', 'guard_name' => 'web']);

        $admin = User::firstOrCreate(
            ['email' => 'admin@dsn.co.id'],
            [
                'name' => 'DSN Admin',
                'password' => bcrypt('password'),
                'email_verified_at' => now(),
            ]
        );

        $admin->assignRole('super-admin');
    }
}
