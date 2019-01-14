<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCandidaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidaturas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('documento_url');
            $table->string('estado');

            $table->integer('candidato_id')->unsigned()->index()->nullable();
            $table->foreign('candidato_id')->references('id')->on('candidatos');

            $table->integer('escola_classe_id')->unsigned()->index()->nullable();
            $table->foreign('escola_classe_id')->references('id')->on('escola_classe');
            
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
        Schema::dropIfExists('candidaturas');
    }
}
