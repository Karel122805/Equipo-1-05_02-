<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('tb_orders', function (Blueprint $table) {
            $table->id(); // ID del pedido
            $table->string('customer_name'); // Nombre del cliente
            $table->string('service_type'); // Tipo de servicio (autolavado o con entrega)
            $table->float('quantity_kg')->nullable(); // Cantidad de kg (si aplica)
            $table->float('total'); // Total calculado
            $table->timestamps(); // Fechas de creación y actualización
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_orders');
    }
}
