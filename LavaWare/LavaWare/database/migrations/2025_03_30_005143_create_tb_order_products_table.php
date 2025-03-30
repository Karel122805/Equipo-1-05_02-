<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('tb_order_products', function (Blueprint $table) {
        $table->id();
        $table->foreignId('idOrder')->constrained('tb_orders'); // Relación con los pedidos
        $table->foreignId('idProducts')->constrained('tb_products'); // Relación con los productos
        $table->integer('quantity');
        $table->decimal('subtotal', 8, 2);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_order_products');
    }
};
