<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;

class CreateUtentiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utenti', function (Blueprint $table) {
            $table->bigIncrements('UserId')->index();
            $table->string('nome', config('strings.utente.nome'))->nullable();
            $table->string('cognome', config('strings.utente.cognome'))->nullable();
            $table->timestamp('data_nascita')->nullable();
            $table->string('genere', config('strings.utente.genere'))->nullable();
            $table->string('email')->unique();
            $table->string('telefono', config('strings.global.telefono'))->unique()->nullable();
            $table->string('username', config('strings.utente.username'))->unique();
            $table->string('password');
            $table->set('role', ['locatore', 'locatario', 'admin']);
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
        Schema::dropIfExists('utenti');
    }
}
