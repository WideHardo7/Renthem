<?php

namespace App\Models;

use App\Models\Resources\Annuncio;

class Alloggi{
    
    public function getAnnunciobyPage($paged= 1){
       return Annuncio::paginate($paged);
        //return $annunci->paginate($paged);
    }
    
}