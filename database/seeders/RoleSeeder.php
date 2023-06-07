<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $default_roles = ['root', 'admin', 'editor'];

        foreach ($default_roles as $role_name) {
            $role = Role::where('name', $role_name)->first();

            if ( isset($role->uuid) ) continue;

            Role::create(['name' => $role_name]);
        }

    }
}
