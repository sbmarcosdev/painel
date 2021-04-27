<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTabelaDadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabela_dados', function (Blueprint $table) {
            $table->id();
            $table->integer('tabela_id');
            $table->string('coluna_01')->nullable();
            $table->string('coluna_02')->nullable();
            $table->string('coluna_03')->nullable();
            $table->string('coluna_04')->nullable();
            $table->string('coluna_05')->nullable();
            $table->string('coluna_06')->nullable();
            $table->string('coluna_07')->nullable();
            $table->string('coluna_08')->nullable();
            $table->string('coluna_09')->nullable();
            $table->string('coluna_10')->nullable();   
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
        Schema::dropIfExists('tabela_dados');
    }
}
