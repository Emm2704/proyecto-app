<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDatesToProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('projects', function (Blueprint $table) {
            // Permitir valores nulos en las nuevas columnas
            $table->date('fecha_inicio')->nullable()->after('porcentaje_avance');
            $table->date('fecha_final')->nullable()->after('fecha_inicio');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('projects', function (Blueprint $table) {
            // Revertir los cambios, eliminando las nuevas columnas
            $table->dropColumn('fecha_inicio');
            $table->dropColumn('fecha_final');
        });
    }
}
