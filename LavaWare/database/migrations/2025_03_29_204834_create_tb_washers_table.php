<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbWashersTable extends Migration
{
    public function up()
    {
        Schema::create('tb_washers', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['ch', 'g', 'plus']);
            $table->decimal('price', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tb_washers');
    }
}

