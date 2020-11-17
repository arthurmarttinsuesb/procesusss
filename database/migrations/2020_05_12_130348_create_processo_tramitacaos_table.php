<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessoTramitacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processo_tramitacaos', function (Blueprint $table) {
            $table->id();
            $table->integer('fk_user_remetente')->nullable(); #remetente
            $table->foreign('fk_user_remetente')->references('id')-> on('users');
            $table->integer('fk_setor')->nullable(); #setor
            $table->foreign('fk_setor')->references('id')-> on('setors');
            $table->integer('fk_user')->nullable(); #Usuário
            $table->foreign('fk_user')->references('id')-> on('users');
            $table->integer('fk_processo'); #processo
            $table->foreign('fk_processo')->references('id')-> on('processos');
            $table->string('status')->default('Criado');
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
        Schema::dropIfExists('processo_tramitacaos');
    }
}
