<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDetalleLiquidacions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_liquidacions', function (Blueprint $table) {
            $table->increments('id');
            $table->double('subTotalD',8,2);
            $table->double('subTotalH',8,2);
            $table->double('unidad');
            $table->integer('liquidacion_id')->unsigned();
            $table->integer('concepto_id')->unsigned();

            $table->foreign('liquidacion_id')->references('id')->on('liquidacions')->onDelete('cascade');
            $table->foreign('concepto_id')->references('id')->on('conceptos')->onDelete('cascade');
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
        Schema::dropIfExists('detalle_liquidacions');
    }
}
