<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('status');
            $table->integer('total');
            $table->string('semestre');

            $table->unsignedBigInteger('user_id');
            // $table->unsignedBigInteger('ficha_id');
            // $table->unsignedBigInteger('comprobante_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('ficha_id')->references('id')->on('fichas')->onDelete('cascade');
            // $table->foreign('comprobante_id')->references('id')->on('comprobantes')->onDelete('cascade');

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
        Schema::dropIfExists('tickets');
    }
}
