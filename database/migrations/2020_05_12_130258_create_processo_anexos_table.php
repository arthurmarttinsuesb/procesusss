<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessoAnexosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processo_anexos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('arquivo');
            $table->integer('fk_user'); #Usuário
            $table->foreign('fk_user')->references('id')-> on('users');
            $table->integer('fk_processo'); #processo
            $table->foreign('fk_processo')->references('id')-> on('processos');
            $table->string('status', 10)->default('Ativo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('processo_anexos');
    }
}
