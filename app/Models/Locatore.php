<?php

namespace App\Models;

use App\Models\Resources\Annuncio;//new
use Illuminate\Support\Facades\Log;

class Locatore {
   
    //new

    public function getLocatorebyAnnuncio($idannuncio) {
        $locatore= Annuncio::find($idannuncio)->utente;
        
         Log::info('locatore ESTRATTo'.$locatore);
        return $locatore;
    }
}
