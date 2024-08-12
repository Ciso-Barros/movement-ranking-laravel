<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelTarefaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('tarefa', function (Blueprint $table) {
            $table->id();
//            $table->unsignedBigInteger('tarefa_id_user');
//            $table->foreign('tarefa_id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('tarefa_titulo');
            $table->text('tarefa_descricao')->nullable();
            $table->string('tarefa_local')->nullable();
            $table->integer('tarefa_num_participantes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('tarefa');
    }
}
