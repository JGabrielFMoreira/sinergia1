<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('equipe_medidors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('md_entrega_id')->unsigned();
            $table->foreign('md_entrega_id')->references('id')->on('md_entregas');
            $table->string('numero_serie');
            $table->integer('equipe_id')->unsigned();
            $table->foreign('equipe_id')->references('id')->on('estrutura_equipes');
            $table->string('tipo');
            $table->string('status');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('equipe_medidors');
    }
};
