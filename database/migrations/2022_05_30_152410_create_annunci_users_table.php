<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Config;

class CreateAnnunciUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annunci_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');  
            $table->unsignedBigInteger('annuncio_AnnuncioId');
            $table->boolean('assegnato');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('annuncio_AnnuncioId')->references('AnnuncioId')->on('annunci')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annunci_users');
    }
}
