<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->unsignedBigInteger('lider_id');
            $table->decimal('presupuesto', 10, 2);
            $table->decimal('presupuesto_usado', 10, 2);
            $table->string('estado');
            $table->decimal('porcentaje_avance', 5, 2);
            $table->timestamps();

            // Definir la clave foránea para el líder del proyecto
            $table->foreign('lider_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
