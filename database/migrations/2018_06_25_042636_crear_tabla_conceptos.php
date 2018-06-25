<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaConceptos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conceptos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->string('tipo');
            $table->double('montoFijo',8,2);
            $table->double('montoVariable',8,2);
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
        Schema::dropIfExists('conceptos');
    }
}
