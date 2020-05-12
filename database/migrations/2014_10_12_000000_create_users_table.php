<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('tipo'); //Pessoa Física ou Pessoa Jurídica 
            $table->string('sexo');
            $table->date('nascimento');
            $table->string('telefone');
            $table->string('cpf_cnpj')->unique();
            $table->string('logradouro');
            $table->string('numero');
            $table->string('bairro');
            $table->string('cep');
            $table->string('complemento')->nullable();
            $table->integer('fk_cidade'); #unidade
            $table->foreign('fk_cidade')->references('id')-> on('cidades');
            $table->integer('fk_estado'); #unidade
            $table->foreign('fk_estado')->references('id')-> on('estados');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('status', 10)->default('Inativo');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
