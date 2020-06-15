<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentoTramitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento_tramites', function (Blueprint $table) {
            $table->id();
            $table->boolean('assinatura');
            $table->boolean('leitura')->default('false');
            $table->integer('fk_processo_documento'); #processo documento
            $table->foreign('fk_processo_documento')->references('id')-> on('processo_documentos');
            $table->integer('fk_setor')->nullable(); #setor
            $table->foreign('fk_setor')->references('id')-> on('setors');
            $table->integer('fk_user')->nullable(); #Usuário
            $table->foreign('fk_user')->references('id')-> on('users');
            $table->string('status', 10)->default('Ativo');
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
        Schema::dropIfExists('documento_tramites');
    }
}
