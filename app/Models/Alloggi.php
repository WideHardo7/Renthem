<?php

namespace App\Models;

use App\Models\Resources\Annuncio;
use App\User;
use Illuminate\Support\Facades\Log;
use App\Models\Resources\AnnuncioUsers;

class Alloggi {

    public function getAnnunciobyLocatore($id_locatore) {
        //->annunci è la relazione one to many in cui passato un locatore, restituisce tutti gli annunci a suo nome
        $annunci = User::find($id_locatore)->annunci;
        Log::info('ANNUNCI ESTRATTI' . $annunci);
        return $annunci;
        /* $annunci = Annuncio::whereHas('IDproprietario', function($query) use($id_locatore) {
          $query->where('IDproprietario',$id_locatore);
          })
          ->with("utente")
          ->get();
          return $annunci; */
        //return Annuncio::whereIn('IDproprietario',$id_locatore)->paginate($paged);
        //return $annunci->paginate($paged);
    }

    public function getAnnunciobyPage($paged = 1) {
        return Annuncio::paginate($paged);
        //return $annunci->paginate($paged);
    }

    public function getAllAnnunci() {
        return Annuncio::all();
    }

    public function getAnnuncioById($Id) {
        return Annuncio::where('AnnuncioId', $Id)->first();
    }

    public function sortService($idAnnuncio) {

        $alloggio = Annuncio::where('AnnuncioId', $idAnnuncio)->first();
        /* $servizi= $alloggio->where(function ($query) use ($catId) {
          $query->whereIn('parId', $catId);)

          } */
    }
     public function showOptionforAnnuncio($idannuncio){
         
       $annuncio=Annuncio::find($idannuncio);
        $locatari= $annuncio->moreutenti;
        log::info(print_r($locatari,true));
     
        return $locatari;
    }
    
    public function isOptionate($idlocatario,$idannuncio){
        //$option=AnnuncioUsers::find($idannuncio)->comments()->where('title', 'foo')->first();;
        log::info('optionamento'.$option);
        if($option=null){
            return false;
        }else{
            return true;
        }
    }
    

    /*   public function getAnnunciobyFilter($param, $paged = 1) {



      if ($param->tipologia = 'Appartamento') {
      $filtratiA = (new Annuncio)->newQuery()->where('tipologia', 'Appartamento');
      if ($param->has('citta')) {
      $filtratiA = $filtratiA->whereIn('citta', $param);
      }
      return $filtratiA->paginate(5);
      } else if ($param->tipologia = 'Posto Letto') {
      $filtratiP = (new Annuncio)->newQuery()->where('tipologia', 'Posto Letto');
      if ($param->has('citta')) {
      $filtratiP = $filtratiP->whereIn('citta', $param);
      }
      return $filtratiP->paginate(5);
      } else
      return;
      } */

    public function getAnnunciobyFilter($citta, $paged = 1) {
        $filtrati = Annuncio::whereIn('tipologia', $citta);
        //   LOG::INFO(print_r($filtrati,true));
        return $filtrati->paginate($paged);
    }

    public function getAnnunciobyF($param, $paged = 1) {

        $filtrati = (new Annuncio)->newQuery();

        //    $filtrati = Annuncio::all();
        $filtri=array();
        



        if ($param->get('tipologia')!=null){ 
        array_push($filtri,['tipologia',$param]);
            
            $filtrati = Annuncio::where($filtri);
        }       
        
        if ($param->get('citta')!=null){
            LOG::INFO('entra nel secondo if');
        array_push($filtri,['citta', $param]);       
        }
        
        

        
        
        $filtrati = Annuncio::where($filtri);

        return $filtrati->paginate(5);
    }
    
    public function insertOptionament($idloca,$idann){
        $u=User::find($idloca);
        $u->moreannunci()->attach($idann);
        
    }

}
