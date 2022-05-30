<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\FaqGetter;
use App\Models\Alloggi;
use App\Models\Locatore;
use App\User;
use Auth;
use Illuminate\Support\Facades\Log;


class LocatoreController extends Controller
{
    
    
    protected $faqu;
    protected $annunci;
    protected $dati;
    protected $locatore;

    public function __construct() {
        
        $this->faqu = new FaqGetter();    
        $this->annunci= new Alloggi();
        $this->middleware('can:isLocatore');
        
        $this->locatore= new Locatore(); 
    }
    
    
     public function ViewHomeLv2(){
        $faq = $this->faqu->getAllFaqs();

        return view('homepage2')->with('faqs', $faq);
    }
    
        public function ViewAlloggiLv2(){
        $alloggio= $this->annunci->getAnnunciobyPage(6);
        
        return view('catalogoalloggi2')
               ->with('ads', $alloggio);            
    }
    
        public function schedaAlloggio2($Annuncioid){
        
        $alloggio= $this->annunci->getAnnuncioById($Annuncioid);
        return view('scheda_alloggio2')->with('ann', $alloggio);
    }
    
    
         public function ViewProfiloLv2(){
    
        return view('profilo2');                        
    }
    
    //new
    public function showNuovoAnnuncioForm(){
        
        $tipoAlloggio= $this->locatore->getTipoAlloggio();
        return view('product.nuovo_annuncio')
               ->with('tipologia',$tipoAlloggio);      
    }
    
    
    public function insertAnnuncio(){
                
    }
    
        public function showAnnunci(){
           $utente= Auth::user()->id;
           Log::info('utente id passato'.$utente);
           $alloggio= $this->annunci->getAnnunciobyLocatore($utente,3);
           return view('listaAlloggi')
           ->with('ads', $alloggio);
    }
    public function showOptionforAnnuncio($idannuncio){
        $annuncio=Annuncio::find($idannuncio);
        $locatari= $annuncio->moreutenti;
        return $locatari;
    }
    
}



