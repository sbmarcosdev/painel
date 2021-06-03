<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrdemTableColunas extends Migration
{
    public function up()
    {
        Schema::table('tabela_colunas', function (Blueprint $table) {
            $table->integer('ordem')->nullable();
        });
    }

    public function down()
    {
        Schema::table('tabela_colunas', function (Blueprint $table) {
            $table->dropColumn('ordem');
        });
    }
}
