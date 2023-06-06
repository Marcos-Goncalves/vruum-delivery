<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEntregasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entregas', function (Blueprint $table) {
            $table->string('cepEntrega')->nullable()->after('bairro');
            $table->string('ruaEntrega')->after('cepEntrega');
            $table->string('numeroEntrega')->after('ruaEntrega');
            $table->string('bairroEntrega')->after('numeroEntrega');
            $table->string('cep')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entregas', function (Blueprint $table) {
            $table->string('cep')->nullable(false)->change();
            $table->dropColumn(['cepEntrega', 'ruaEntrega', 'numeroEntrega', 'bairroEntrega']);
        });
    }
}


