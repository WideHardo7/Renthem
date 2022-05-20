<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;

class CreateAnnunciTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annunci', function (Blueprint $table) {
            $table->bigIncrements('AnnuncioId');
            
            $table->unsignedBigInteger('IDproprietario');            
            $table->foreign('IDproprietario')->references('UserId')->on('utenti');
            
            $table->string('citta',50);
            $table->string('zona-quartiere',50)->nullable();
            $table->string('indirizzo',50);            
            $table->string('descrizione',1000);
            $table->float('importo');
            $table->integer('dimensione');            
            $table->set('tipologia', ['Appartamento', 'Camera']);
            $table->date('data-inizio-disponibilita');
            $table->date('data-fine-disponibilita');           
            $table->string('servizi-inclusi',500);
            $table->integer('eta-minima');
            $table->string('genere-richiesto',10);
            $table->boolean('assegnato')->nullable(); 
            $table->date('data-assegnazione')->nullable();           
            $table->string('immagine',200)->nullable();            
            $table->integer('C-numero-posti-letto')->nullable();
            $table->boolean('C-presenza-angolo-studio')->nullable();
            $table->integer('A-numero-camere')->nullable();
            $table->integer('A-numero-posti-letto')->nullable();
            $table->boolean('A-presenza-cucina')->nullable();
            $table->boolean('A-presenza-locale-ricreativo')->nullable();
            $table->set('A-servizi-disponibili', [ 'parcheggio', 'ascensore' , 'guardiano'])->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('annunci');
    }
}
