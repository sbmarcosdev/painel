<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->integer('empresa_id');
            $table->bigInteger('COD_chave');
            $table->datetime('dtHora');
            $table->string('mensagem1');
            $table->string('mensagem2');
            $table->string('mensagem3');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('logs');
    }
}
