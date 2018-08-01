<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaCuentaCorriente extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta_corrientes', function (Blueprint $table) {
            $table->increments('id');
            $table->double('monto',8,2);
            $table->date('fecha');
            $table->enum('estado',['activo','deudor'])->default('activo');
            $table->integer('venta_id')->unsigned();
            $table->foreign('venta_id')->references('id')->on('ventas')->onDelete('cascade');
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
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
        Schema::dropIfExists('cuenta_corrientes');
    }
}
