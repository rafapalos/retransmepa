<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('marca',50);
            $table->string('modelo',50);
            $table->string('matricula',8);
            $table->string('empresa', 20);
            $table->string('estado', 40);
            $table->string('propiedad', 40);
            $table->string('alquiler', 40)->nullable();
            $table->date('fechaAlquilerDesde')->nullable();
            $table->date('fechaAlquilerHasta')->nullable();
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
        Schema::dropIfExists('vehiculos');
    }
};
