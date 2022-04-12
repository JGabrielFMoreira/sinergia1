<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('md_entregas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('equipe_id')->unsigned();
            $table->foreign('equipe_id')->references('id')->on('estrutura_equipes');
            $table->integer('qtd_md');
            $table->string('tipo_md');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('md_entregas');
    }
};

