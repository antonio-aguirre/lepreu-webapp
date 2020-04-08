<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('value'); //identificador de lo que se guardará
            $table->text('data'); // información que se guardará
            $table->text('description'); //descripción de lo que se guardará
            $table->text('status')->nullable(); //puede usarse para activar o desactivar botones
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_data');
    }
}
