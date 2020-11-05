<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(RoleSeed::class);
        $this->call(TokenSeed::class);
        $this->call(UserSeed::class);
        $this->call(InfoDataSeed::class);
    }
}
