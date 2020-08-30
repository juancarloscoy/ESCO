<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('ID_ORDEN');
            $table->date('FECHA_CREACION');
            $table->date('FECHA_ASIGNACION');
            $table->date('FECHA_EJECUCION');
            $table->unsignedBigInteger('ID_TIPO');
            $table->foreign('ID_TIPO')->references('ID_TIPO')->on('type_orders');

            $table->unsignedBigInteger('ID_OPERADOR');
            $table->foreign('ID_OPERADOR')->references('ID_OPERADOR')->on('operators');

            $table->string('RESULTADO');
            $table->decimal('VALOR', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
