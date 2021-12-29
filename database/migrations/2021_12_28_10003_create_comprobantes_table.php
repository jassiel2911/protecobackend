<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprobantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprobantes', function (Blueprint $table) {
            $table->id();

            $table->date('fecha');
            $table->string('metodo_pago');
            $table->string('banco');
            $table->string('no_ficha');
            $table->integer('ultimos_digitos');
            $table->integer('cie');
            $table->integer('monto');
            $table->string('captura');

            $table->unsignedBigInteger('ficha_id');
            $table->foreign('ficha_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('comprobantes');
    }
}
