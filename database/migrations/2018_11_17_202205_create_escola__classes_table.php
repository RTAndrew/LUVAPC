<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEscolaClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('escola__classe', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->timestamps();
        // });

        Schema::create('escola_classe', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('num_vaga');
            $table->integer('num_vaga_ocupado')->default(0);
            $table->timestamps();

            $table->integer('escola_id')->unsigned()->index();
            $table->foreign('escola_id')->references('id')->on('escolas')->onDelete('cascade');

            $table->integer('classe_id')->unsigned()->index();
            $table->foreign('classe_id')->references('id')->on('classes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('escola_classe');
    }
}
