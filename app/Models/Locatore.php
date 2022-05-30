<?php

namespace App\Models;

use App\Models\Resources\Annuncio;//new

class Locatore {
   
    //new

    public function getAlloggio() {
        return Annuncio::all();
    }
}
