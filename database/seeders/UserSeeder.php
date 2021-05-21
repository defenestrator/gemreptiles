<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make(config('app.kumquat'));
        User::create([
            'name'  => 'Jeremy Anderson',
            'email' => 'jeremyblc@gmail.com',
            'email_verified_at' => '2021-05-21 03:05:06',
            'password' => $password,
            ]);
    }
}
