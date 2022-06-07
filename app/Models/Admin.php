<?php

namespace App\Models;


use App\Models\Resources\AnnuncioUsers;
use App\Models\Resources\Annuncio;
use Illuminate\Support\Facades\Log;


class Admin {

    
    public function getStatistiche($params){
        
       //statistiche totale offerte di annunci presenti nel sito
        $annunci= Annuncio::all();
        
        //statistiche totale per offerte annunci assehante
        $annunciassegnati=Annuncio::whereIn('assegnato',[true])->get();
        //Log::info(print_r($annunciassegnati,true));
        
        
         //statistiche per opzionamenti
         $opzionamenti= AnnuncioUsers::all();
         //log::info(print_r($opzionamenti,true));
         
         //collection in cui inserisco tutti gli opzionamenti per tipologia di appartamento
         $listaopztipologia= collect([]);
         
         //filtri nel caso utente inserisce la tipologia
         if (($params->get('tipologia'))!=='Tutti'){
           
             
             
        $annunci=$annunci->whereIn('tipologia',[($params->get('tipologia'))])->all();
        
        //log::info(print_r($annunci,true));
        $annunci= collect($annunci);
        
        $annunciassegnati=$annunciassegnati->whereIn('tipologia',[($params->get('tipologia'))])->all();
        //log::info(print_r($annunciassegnati,true));
        $annunciassegnati=collect($annunciassegnati);
        
        //estrazione opzionamenti per tipologia
        //prendo l'id degli appartamenti selezionati per una singola tipologia e filtro all'interno della tabella AnnunciUsers
        $annu= collect($annunci);
        foreach(($annu) as $ann){
            
            
            //ogni appartamento può avere più di un opzionamento 
          
            $opztipologia=$opzionamenti->whereIn('annuncio_AnnuncioId',($ann->AnnuncioId))->all();
            log::info(print_r($opztipologia,true));
            
            foreach($opztipologia as $singoloption){
               $listaopztipologia->add($singoloption); 
            }
            
        }
         }
         if(!is_null($params->get('data_inizio') )|| !is_null(($params->get('data_fine')))){
             log::info('Dentro primissimo if');
         
         if(($params->get('data_inizio') )&& (($params->get('data_fine')))){
             
             log::info('Dentro primo if');
             $inizio=$params->get('data_inizio');
             $fine=$params->get('data_fine');
             $annunci=$annunci->where('created_at','>=', $params->get('data_inizio'))
                     ->where('created_at' ,'<=', $params->get('data_fine'))
                     ->all();
                     
                    
                    
             
             $annunciassegnati=$annunciassegnati->where('created_at','>=', $params->get('data_inizio'))
                     ->where('created_at' ,'<=', $params->get('data_fine'))
                     ->all();
             
             $listaopztipologia=$listaopztipologia->where('created_at','>=', $params->get('data_inizio'))
                     ->where('created_at' ,'<=', $params->get('data_fine'))
                     ->all();
             
             $opzionamenti=$opzionamenti->where('created_at','>=', $params->get('data_inizio'))
                     ->where('created_at' ,'<=', $params->get('data_fine'))
                     ->all();
             
             
         }else if($params->get('data_inizio')){
             log::info('Dentro primo else if');
             $annunci=$annunci->where('created_at','>=', $params->get('data_inizio'))->all();
             //log::info(print_r($annunci,true));
             
             $annunciassegnati=$annunciassegnati->where('created_at','>=', $params->get('data_inizio'))->all();
             
             $listaopztipologia=$listaopztipologia->where('created_at','>=', $params->get('data_inizio'))->all();
             
             $opzionamenti=$opzionamenti->where('created_at','>=', $params->get('data_inizio'))->all();
             
            
         }else{
             log::info('Dentro primo else');
             $annunci=$annunci->where('created_at' ,'<=', $params->get('data_fine'))
                     ->all();
             
             $annunciassegnati=$annunciassegnati->where('created_at' ,'<=', $params->get('data_fine'))
                     ->all();
             
              $listaopztipologia=$listaopztipologia->where('created_at' ,'<=', $params->get('data_fine'))
                     ->all();
              
              $opzionamenti=$opzionamenti->where('created_at' ,'<=', $params->get('data_fine'))
                     ->all();
         }
         }
         
        
           //numero tot    
         $numannunci=collect($annunci)->count();
         log::info(print_r($numannunci,true));
         
         $numannunciassegnati=collect($annunciassegnati)->count();
         log::info(print_r($numannunciassegnati,true));
               
         if(($params->get('tipologia'))=='Tutti'){
              $numopzionamenti= collect($opzionamenti)->count();
         }else{
         $numopzionamenti=collect($listaopztipologia)->count();
         }
         $risultati=array('annuncitot'=>$numannunci, 'annunciassegnatitot'=>$numannunciassegnati, 'opzionamentitot'=>$numopzionamenti);
          log::info(print_r($risultati,true));
          
         //$collctionrisul= collect($risultati);
                            
    return $risultati;

 }
 
 
}
