<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimentos', function (Blueprint $table) {
            
            $table->increments('id');
            $table->integer('atendente_id')->unsigned();
            $table->foreign('atendente_id')->references('id')->on('users');
            $table->integer('equipe_id')->unsigned();
            $table->foreign('equipe_id')->references('id')->on('estrutura_equipes');
            $table->string('tipo_atendimento');
            $table->string('uc_atendida');
            $table->string('os_atribuida');
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
        Schema::dropIfExists('atendimentos');
    
    }
};
