<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevolutivaDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devolutiva_documentos', function (Blueprint $table) {
            $table->id();
            $table->longText('observacao');
            $table->integer('fk_tramite_documento'); #tramite documento
            $table->foreign('fk_tramite_documento')->references('id')-> on('documento_tramites');
            $table->integer('fk_setor')->nullable(); #setor
            $table->foreign('fk_setor')->references('id')-> on('setors');
            $table->integer('fk_user'); #Usuário
            $table->foreign('fk_user')->references('id')-> on('users');
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
        Schema::dropIfExists('devolutiva_documentos');
    }
}
