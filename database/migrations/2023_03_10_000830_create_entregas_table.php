<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntregasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entregas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idCliente')->nullable(false);
            $table->string('enderecoPartida', 150)->nullable(false);
            $table->string('enderecoEntrega', 150)->nullable(false);
            $table->string('obs', 200)->nullable();
            $table->string('status', 20)->default('DISPONÍVEL');
            $table->unsignedBigInteger('idMotoqueiro')->nullable(false);
            $table->string('horarioEntrega', 50)->nullable();
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
        Schema::dropIfExists('entregas');
    }
}
