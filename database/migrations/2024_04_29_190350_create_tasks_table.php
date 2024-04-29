<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Ejecuta la migración.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_proyecto');
            $table->string('titulo');
            $table->text('descripcion')->nullable();
            $table->string('tipo')->nullable();
            $table->string('estado')->nullable();
            $table->unsignedBigInteger('id_encargado');
            $table->timestamps();

            $table->foreign('id_proyecto')->references('id')->on('projects');
            $table->foreign('id_encargado')->references('id')->on('users');
        });
    }

    /**
     * Revierte la migración.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
