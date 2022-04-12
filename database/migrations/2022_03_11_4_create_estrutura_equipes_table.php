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
        Schema::create('estrutura_equipes', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('equipe');
            $table->integer('fiscal_id')->unsigned();
            $table->foreign('fiscal_id')->references('id')->on('estrutura_encarregados');
            $table->integer('supervisor_id')->unsigned();
            $table->foreign('supervisor_id')->references('id')->on('estrutura_supervisors');
            $table->string('empresa');
            $table->string('status');

        });
    }


    public function down()
    {
        Schema::dropIfExists('estrutura_equipes');
    }
};
