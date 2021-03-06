<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaLineaCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra_producto', function (Blueprint $table) {
            $table->increments('id');
            $table->double('subTotal',8,2);
            $table->integer('cantidad');
            $table->integer('producto_id')->unsigned();
            $table->integer('compra_id')->unsigned();

            $table->foreign('producto_id')->references('id')->on('tipos')->onDelete('cascade');
            $table->foreign('compra_id')->references('id')->on('compras')->onDelete('cascade');
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
        Schema::dropIfExists('linea_compras');
    }
}
