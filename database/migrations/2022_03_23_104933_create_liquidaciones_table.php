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
            $table->foreignId('id_empleado')
                  ->contrained('empleados')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
            $table->foreignId('id_vehiculo')
                  ->contrained('vehiculos')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
            $table->foreignId('id_codigo_postal')
            ->contrained('codigo_postals')
            ->cascadeOnUpdate()
            ->nullOnDelete();
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
