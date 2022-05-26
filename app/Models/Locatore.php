<?php

namespace App\Models;

use App\Models\Resources\Annuncio;//new

class Locatore {
   
    //new

    public function getTipoAlloggio() {
        return Annuncio::where('Tipologia', '!=', 0)->get();
    }
}
