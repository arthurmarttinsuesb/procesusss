<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeuModelosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meu_modelos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('slug');
            $table->longText('conteudo');
            $table->integer('fk_user'); #Usuário
            $table->foreign('fk_user')->references('id')-> on('users');
            $table->string('status', 100)->default('Ativo');
            $table->string('compartilhar_setor', 100)->nullable();
            $table->string('compartilhar_geral', 100)->nullable();
            $table->timestamps();
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
        Schema::table('meu_modelos', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
