<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;

class CreateMessaggiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messaggi', function (Blueprint $table) {
            $table->bigIncrements('ID')->index();
            
            $table->unsignedBigInteger('IDmittente')->nullable();
            $table->foreign('IDmittente')->references('id')->on('users');
            
            $table->unsignedBigInteger('IDdestinatario')->nullable();
            $table->foreign('IDdestinatario')->references('id')->on('users');
            
            $table->string('contenuto',200);
            
            $table->unsignedBigInteger('IDannuncio')->nullable();
            $table->foreign('IDannuncio')->references('AnnuncioId')->on('annunci');
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
        Schema::dropIfExists('messaggi');
    }
}
