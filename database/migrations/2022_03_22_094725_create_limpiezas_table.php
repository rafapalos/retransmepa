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
            $table->string('matricula',12);
            $table->string('tipoLavado',50);
            $table->string('tipoCoche',50);
            $table->string('precio',10);
            $table->date('fechaLimpieza');
            $table->string('empleadoAsignado',50);
            $table->foreignId('id_empleado')
                  ->contrained('empleados')
                  ->cascadeOnUpdate()
                  ->nullOnDelete();
            $table->foreignId('id_cliente')
            ->contrained('clientes')
            ->cascadeOnUpdate()
            ->nullOnDelete();
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
        Schema::dropIfExists('limpiezas');
    }
};
