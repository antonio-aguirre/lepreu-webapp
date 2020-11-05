<?php

use Illuminate\Database\Seeder;
use App\Token;

class TokenSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Token::create([
            'token' => 'HRFfBiLl@hp-,6s',
            'status' => 'USED',
        ]);
    }
}
