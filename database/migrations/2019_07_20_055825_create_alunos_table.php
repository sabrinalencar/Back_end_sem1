<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlunosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alunos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('email');
            $table->string('tel');
            $table->string('matricula');
            $table->integer(‘professor_id’)->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('alunos', function (Blueprint $table) {
            $table->foreign(‘professor_id’)->references(‘id’)->on(‘professor’)->onDelete(‘cascade’);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('alunos');
    }
}
