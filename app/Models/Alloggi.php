<?php

namespace App\Models;

use App\Models\Resources\Annuncio;
use App\User;
use Illuminate\Support\Facades\Log;

class Alloggi{
    
    public function getAnnunciobyLocatore($id_locatore){
        //->annunci è la relazione one to many in cui passato un locatore, restituisce tutti gli annunci a suo nome
        $annunci= User::find($id_locatore)->annunci;
        Log::info('ANNUNCI ESTRATTI'.$annunci);
        return $annunci;
        /*$annunci = Annuncio::whereHas('IDproprietario', function($query) use($id_locatore) {
                                $query->where('IDproprietario',$id_locatore); 
                                })
                                 ->with("utente") 
                                 ->get();
                                return $annunci;*/
       //return Annuncio::whereIn('IDproprietario',$id_locatore)->paginate($paged);
        //return $annunci->paginate($paged);
    }
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
    public function getAnnunciobyFilter($citta,$paged=1){
        $filtrati=Annuncio::whereIn('citta', $citta);
         return $filtrati->paginate($paged);
         }
    
    public function sortService($idAnnuncio){
        
        $alloggio= Annuncio::where('AnnuncioId',$idAnnuncio)->first();
    /*$servizi= $alloggio->where(function ($query) use ($catId) {
                        $query->whereIn('parId', $catId);)
           
    }*/ 
    }
}
