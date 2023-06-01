<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFilaOrdemToMotoqueirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('motoqueiros', function (Blueprint $table) {
            $table->integer('fila_ordem')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('motoqueiros', function (Blueprint $table) {
            $table->dropColumn('fila_ordem');
        });
    }
}
