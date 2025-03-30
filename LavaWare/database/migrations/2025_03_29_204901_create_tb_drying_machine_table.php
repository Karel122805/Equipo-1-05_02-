<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDryingMachineTable extends Migration
{
    public function up()
    {
        Schema::create('tb_drying_machine', function (Blueprint $table) {
            $table->id();  // Crea una columna de id (autoincremental)
            $table->decimal('price', 8, 2);  // Columna para el precio de la secadora (8 dígitos, 2 decimales)
            $table->timestamps();  // Agrega created_at y updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_drying_machine');  // Elimina la tabla si la migración es revertida
    }
}

