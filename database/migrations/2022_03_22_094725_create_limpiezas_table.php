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
        Schema::create('limpiezas', function (Blueprint $table) {
            $table->id();
            $table->string('nombreCliente', 40);
            $table->string('matricula',20);
            $table->string('marca',40);
            $table->string('modelo',40);
            $table->string('tipoLavado',50);
            $table->string('tipoCoche',50);
            $table->string('precio',10);
            $table->date('fechaLimpieza');
            $table->string('empleadoAsignado',50);
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
        Schema::dropIfExists('limpiezas');
    }
};
