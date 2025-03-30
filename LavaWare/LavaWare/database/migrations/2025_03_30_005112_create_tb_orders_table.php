<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('tb_orders', function (Blueprint $table) {
        $table->id();
        $table->string('customer_name');
        $table->enum('service_type', ['self_service', 'drop_off']);
        $table->integer('quantity_kg')->nullable();
        $table->date('date');
        $table->decimal('total', 8, 2);
        $table->enum('status', ['active', 'inactive'])->default('active'); // Estatus para activar o desactivar el pedido
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('tb_orders');
}

};
