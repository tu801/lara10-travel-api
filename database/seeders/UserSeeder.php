<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create default user
        $user = User::where('email', 'admin@gmail.com')->first();

        if ( !isset($user->uuid) ) {
            $role = Role::where('name', 'root')->first();
            $new_user = User::create([
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('secret'),
                'email_verified_at' => now(),
            ]);

            $new_user->assignRole($role->uuid);
        }

        // create 5 more editor users
        $editor_role = Role::where('name', 'editor')->first();
        for ( $i=0; $i < 5; $i++ ) {
            $new_editor_user = User::create([
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'remember_token' => Str::random(10),
            ]);

            $new_editor_user->assignRole($editor_role->uuid);
        }
    }
}
