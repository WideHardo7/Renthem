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
            $table->string('zona_quartiere',50)->nullable();
            $table->string('indirizzo',50);            
            $table->string('descrizione',1000);
            $table->float('importo');
            $table->integer('dimensione');            
            $table->set('tipologia', ['Appartamento', 'Posto Letto']);
            $table->date('data_inizio_disponibilita');
            $table->date('data_fine_disponibilita');           
            $table->string('servizi_inclusi',500);
            $table->integer('eta_minima');
            $table->set('genere_richiesto',['uomini','donne','non specificato'])->nullable();
            $table->boolean('assegnato'); 
            $table->date('data_assegnazione')->nullable();           
            $table->string('immagine',200)->nullable();            
            $table->integer('C_numero_posti_letto_totali')->nullable();
            $table->integer('C_numero_posti_letto_in_camera')->nullable();
            $table->boolean('C_presenza_angolo_studio')->nullable();
            $table->integer('A_numero_camere')->nullable();
            $table->integer('A_numero_posti_letto')->nullable();
            $table->boolean('A_presenza_cucina')->nullable();
            $table->boolean('A_presenza_locale_ricreativo')->nullable();
            $table->set('A_servizi_disponibili', [ 'parcheggio', 'ascensore' , 'guardiano'])->nullable();
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
        Schema::dropIfExists('annunci');
    }
}
