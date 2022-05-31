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
            $table->id();
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
