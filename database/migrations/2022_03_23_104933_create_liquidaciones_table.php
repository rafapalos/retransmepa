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
        Schema::create('liquidacions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('id_empleado');
            $table->foreign('id_empleado')->references('id')->on('empleados');
            $table->unsignedBigInteger('id_vehiculo');
            $table->foreign('id_vehiculo')->references('id')->on('vehiculos');
            $table->integer('numRepartidor');
            $table->string('nombre',40);
            $table->string('matricula',8);
            $table->integer('entregas');
            $table->integer('recogidas');
            $table->integer('incidencias');
            $table->string('diaTrabajado',40);
            $table->decimal('dinero',4,2);
            $table->date('fecha');
            $table->string('codPostal',40);
            $table->string('registrado_por',30);
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
        Schema::dropIfExists('liquidacions');
    }
};
