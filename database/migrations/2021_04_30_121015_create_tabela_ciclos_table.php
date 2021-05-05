<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelaCiclosTable extends Migration
{
    public function up()
    {
        Schema::create('tabela_ciclos', function (Blueprint $table) {
            $table->id();
            $table->integer('empresa_id');
            $table->integer('tabela_id');
            $table->date('data')->nullable();
            $table->time('inicio')->nullable();
            $table->time('termino')->nullable();
            $table->time('ciclo')->nullable();
            $table->time('tempo_ultimo')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tabela_ciclos');
    }
}
