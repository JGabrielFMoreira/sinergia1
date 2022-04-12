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
        Schema::create('estrutura_encarregados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('supervisor_id')->unsigned();
            $table->foreign('supervisor_id')->references('id')->on('estrutura_supervisors');
            $table->string('status');
            
        });
    }

    public function down()
    {
        Schema::dropIfExists('estrutura_encarregados');
    }
};
