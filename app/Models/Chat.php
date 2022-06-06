<?php

namespace App\Models;

use App\Models\Resources\Annuncio;
use App\User;
use Illuminate\Support\Facades\Log;
use App\Models\Resources\AnnuncioUsers;
use App\Models\Resources\Messaggio;

class Chat {
    
   public function  getMessagebyId($idutente,$role){
       
       $listautenti= collect([]);
       if($role=='locatario'){
           //prende i valori della colonna idlocatore e le righe dove idlocatario = idutente
           $messaggio=Messaggio::whereIn('idlocatario', [$idutente])->get(['idlocatore']);
       //Log::info(print_r($messaggio,true));
       }else{
             //prende i valori della colonna idlocatario e le righe dove idlocatore = idutente
           $messaggio=Messaggio::whereIn('idlocatore', [$idutente])->get(['idlocatario']);
       //Log::info(print_r($messaggio,true));
       } 
       //prende solo i valori unici, toglie duplicati
       $idloca=collect($messaggio)->unique();
       //Log::info(print_r($idlocatori,true));
       
       //per ogni id estrae i dati dell'utente relativo e li mette in una collection
       foreach($idloca as $id){
           $infoutente=User::find($id)->first();
           $listautenti->add($infoutente);
       }
    //   Log::info(print_r($listautenti,true));
       
       return $listautenti;
       } 
   }

