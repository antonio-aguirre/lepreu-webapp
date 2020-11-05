<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'lastName' => 'admin',
            'username' => 'adminJNovoa',
            'email' => '',
            'phone_number' => '',
            'password' => Hash::make('34erdfcV#'),

            'token_id' => '1',
            'rol_id' => '1',
        ]);
    }
}
