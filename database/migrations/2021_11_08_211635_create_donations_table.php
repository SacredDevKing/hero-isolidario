<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donations', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('id_usuario');
                $table->string('nome');
                $table->string('categoria');
                $table->integer('quantidade');
                $table->text('descricao')->nullable();
                $table->string('foto');
                $table->string('status');
                $table->timestamps();
    
                $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donations');
    }
}
