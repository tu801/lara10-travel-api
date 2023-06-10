<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class createUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:create-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->ask('Name?');
        $email = $this->ask('Email?');
        $pwd = $this->ask('Password?');

        $role = Role::where('name', 'root')->first();
        $new_user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($pwd),
            'email_verified_at' => now(),
        ]);

        $new_user->assignRole($role->uuid);

        $this->info('Account created for '.$name);

    }
}
