<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterModeloDocumento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('modelo_documentos', function(Blueprint $table) {
            $table->string('slug')->nullable();
            $table->integer('fk_user')->nullable(); #Usuário
            $table->foreign('fk_user')->references('id')->on('users');
            $table->string('compartilhar_setor', 100)->nullable();
            $table->string('compartilhar_geral', 100)->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('modelo_documentos', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
