<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make(config('app.dev_admin_password'));
        User::create([
            'name'  => config('app.dev_admin_user'),
            'email' => config('app.dev_admin_email'),
            'email_verified_at' => '2021-05-21 03:05:06',
            'password' => $password,
            ]);
    }
}
