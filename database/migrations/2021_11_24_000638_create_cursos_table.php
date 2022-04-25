<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();

            $table->string('nombre');
            $table->string('semestre');
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->time('hora_inicio');
            $table->time('hora_fin');
            $table->string('dias');
            $table->string('antecedentes');
            $table->string('equipo');
            $table->string('tipo');
            $table->integer('precio_unam');
            $table->integer('precio_ext');
            $table->integer('precio_gral');
            $table->string('temario');
            $table->string('imagen');
            $table->string('cat');
            $table->string('nivel');
            $table->integer('cupo');
            $table->string('turno');
            $table->string('classroom')->nullable();

            $table->unsignedBigInteger('titular');
            $table->integer('inscritos')->default(0);
            $table->boolean('publicado')->default(0);

            $table->timestamps();

            $table->foreign('titular')->references('id')->on('users')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
