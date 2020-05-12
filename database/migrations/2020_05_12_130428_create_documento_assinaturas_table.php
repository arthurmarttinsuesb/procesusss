<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentoAssinaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento_assinaturas', function (Blueprint $table) {
            $table->id();
            $table->string('dispositivo');
            $table->string('ip');
            $table->integer('fk_processo_documento'); #processo documento
            $table->foreign('fk_processo_documento')->references('id')-> on('processo_documentos');
            $table->integer('fk_user'); #Usuário
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
        Schema::dropIfExists('documento_assinaturas');
    }
}
