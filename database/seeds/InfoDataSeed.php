<?php

use Illuminate\Database\Seeder;
use App\InfoData;

class InfoDataSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InfoData::create([
            'value' => 'LINK-ZOOM',
            'data' => '9513005367',
            'description' => 'Link para acceder a una conferencia en zoom',
            'status' => 'Principal',
        ]);
    }
}
