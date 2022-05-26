<?php

namespace App\Models;

use App\Models\Resources\Annuncio;

class Alloggi{
    
    public function getAnnunciobyPage($paged= 1){
       return Annuncio::paginate($paged);
        //return $annunci->paginate($paged);
    }
    
    public function getAllAnnunci(){
        return Annuncio::all();
    }
    
    public function getAnnuncioById($Id){
        return Annuncio::where('AnnuncioId',$Id)->first();
    }
    
    public function sortService($idAnnuncio){
        $alloggio= Annuncio::where('AnnuncioId',$idAnnuncio)->first();
    /*$servizi= $alloggio->where(function ($query) use ($catId) {
                        $query->whereIn('parId', $catId);)
           
    }*/ 
    }
}
