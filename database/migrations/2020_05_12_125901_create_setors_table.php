<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setors', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('sigla'); //Pessoa Física ou Pessoa Jurídica 
            $table->integer('fk_secretaria'); #unidade
            $table->foreign('fk_secretaria')->references('id')-> on('secretarias');
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
        Schema::dropIfExists('setors');
    }
}
