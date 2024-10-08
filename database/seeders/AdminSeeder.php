<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            'username' => 'Admin',
            'email' => config('adminCreds.admin_email'),
            'password' => Hash::make(config('adminCreds.admin_password')),
            'role_id' => 1
        ];
        User::create($user);
    }
}
