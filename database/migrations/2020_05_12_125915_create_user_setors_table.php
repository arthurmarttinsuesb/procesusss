<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSetorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_setors', function (Blueprint $table) {
            $table->id();
            $table->integer('fk_user'); #usuário
            $table->foreign('fk_user')->references('id')-> on('users');
            $table->integer('fk_setor'); #setor
            $table->foreign('fk_setor')->references('id')-> on('setors');
            $table->date('data_entrada');
            $table->date('data_saida')->nullable();
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
        Schema::dropIfExists('user_setors');
    }
}
