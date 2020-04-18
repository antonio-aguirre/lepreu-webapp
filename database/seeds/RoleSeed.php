<?php

use Illuminate\Database\Seeder;
use  App\Role;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'typeRole' => '1',
            'description' => 'Admin'
        ]);

        Role::create([
            'typeRole' => '2',
            'description' => 'Anciano'
        ]);
    }
}
