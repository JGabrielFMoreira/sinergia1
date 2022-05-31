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
        Schema::create('servicos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uc');
            $table->integer('codigo_id')->unsigned();
            $table->foreign('codigo_id')->references('id')->on('codigos');
            $table->integer('responsavel_id')->unsigned();
            $table->foreign('responsavel_id')->references('id')->on('users');
            $table->string('status');
            $table->integer('lancado_por_id')->unsigned();
            $table->foreign('lancado_por_id')->references('id')->on('users');
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
        Schema::dropIfExists('servicos');
    }
};
