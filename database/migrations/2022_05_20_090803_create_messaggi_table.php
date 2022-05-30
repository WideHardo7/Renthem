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
            $table->bigIncrements('id')->index();
            
            $table->unsignedBigInteger('idlocatario');
            $table->foreign('idlocatario')->references('id')->on('users');
            
            $table->unsignedBigInteger('idlocatore');
            $table->foreign('idlocatore')->references('id')->on('users');
            
            $table->string('contenuto',200);
            //specifica chi invia il messaggio 0 inviato da locatario, 1 iniviato da locatore
            $table->boolean('sender');
            
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
