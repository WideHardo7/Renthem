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
        //Log::info('ANNUNCI ESTRATTI' . $annunci);
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
        //log::info(print_r($locatari,true));
     
        return $locatari;
    }
    
    public function isOptionate($idlocatario,$idannuncio){
        $locaoption=User::find($idlocatario);
        $op=$locaoption->moreannunci()->where('annuncio_AnnuncioId',$idannuncio)->exists();
        
        
        if(empty($op))
            $op=0;
        log::info('optionamento'.$op);
            return $op;
        
    }
    


    public function getAnnunciobyF($params, $paged = 1) {

        
        //creo array vuoto a cui inserisco gli elementi da passare al where() alla fine
        //array di ['(value sul db)','(operator)','(input value)']
        $filtri = array();

        if ($params->get('tipologia')) {
            array_push($filtri, ['tipologia', $params->get('tipologia')]);
        }       
        
        if ($params->get('citta')) {
            array_push($filtri, ['citta', $params->get('citta')]);
        }
                             
        if ($params->get('dimensione')) {
            array_push($filtri, ['dimensione','>=', $params->get('dimensione')]);
        }

        if ($params->get('A_numero_camere')) {
            array_push($filtri, ['A_numero_camere', $params->get('A_numero_camere')]);
        }  
              
        if($params->get('A_locali_presenti')){
             $arlocali=$params->get('A_locali_presenti');
             $strlocali=implode(',',$arlocali);
             array_push($filtri, ['A_locali_presenti', 'LIKE', '%'.$strlocali.'%']);
             
             Log::info('qui array locali:::::::::::::::: ',$arlocali);
             Log::info(print_r($strlocali,true));
        }        
        if($params->get('servizi_inclusi')){
             $arservizi=$params->get('servizi_inclusi');
             $strservizi=implode(',',$arservizi);
             array_push($filtri, ['servizi_inclusi', 'LIKE', '%'.$strservizi.'%']);            
        }
        if ($params->get('C_numero_posti_letto_in_camera')) {
            array_push($filtri, ['C_numero_posti_letto_in_camera', $params->get('C_numero_posti_letto_in_camera')]);
        } 
         if ($params->get('numero_posti_letto_totali')) {
            array_push($filtri, ['numero_posti_letto_totali', $params->get('numero_posti_letto_totali')]);
        }
        
        if($params->get('min_price')!=null){
            array_push($filtri, ['importo','>=', $params->get('min_price')]);
        }
        if($params->get('max_price')!=null){
            array_push($filtri, ['importo','<=', $params->get('max_price')]);
        }
                   
        $filtroData=array();       
        if($params->get('data_inizio_permanenza')!=null){
            array_push($filtroData, ['data_inizio_disponibilita','<=', $params->get('data_inizio_permanenza')]);       
        }
        if($params->get('data_inizio_permanenza')!=null){
            array_push($filtroData, ['data_fine_disponibilita','>=', $params->get('data_inizio_permanenza')]);       
        }
        
      //  Log::info(print_r($filtroData,true));
        $filtrati = Annuncio::where($filtri)                         
                            ->where($filtroData);
                        //  ->whereDate('data_inizio_disponibilita','<=', $dataInizioPermanenza);
                        //  ->whereDate('data_fine_disponibilita','>=', $dataInizioPermanenza);
                                             
                                                     
      //  Log::info(print_r($filtri,true));        
     //   Log::info($filtrati->toSql());       
     //   Log::info($filtrati->get());
        
        return $filtrati->paginate(6);
  }
    
    public function insertOptionament($idloca,$idann){
        $u=User::find($idloca);
        $u->moreannunci()->attach($idann, ['assegnato' => 0]);
        
    }
    
    public function assegnaAlloggio($idlocatario, $idannuncio){
         $u=User::find($idlocatario);
         //grazie alla relazione moreannunci(), va a prendere,nella tabella annunci_users, 
         //la riga contenente 'user_id' del locatore trovato, 
         //con la colonna 'annuncio_AnnuncioId'=idannuncio passato e aggiorna la colonna 'assegnato' ad 1
        $ass=['assegnato' => 1];
        $annnunc=$u->moreannunci()->updateExistingPivot($idannuncio, $ass );
        
        
        
    }
    
   /* public function assegnaAlloggio($idlocatario, $idannuncio){
         $locaoption=User::find($idlocatario);
        $op=$locaoption->moreannunci()->where('annuncio_AnnuncioId',$idannuncio)->first();
        log:info('op'. $op);
        return $op;
        
    }*/

}

