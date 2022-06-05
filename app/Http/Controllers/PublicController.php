<?php

namespace App\Http\Controllers;


use App\Models\FaqGetter;
use App\Models\Alloggi;
use App\Models\Locatore;
use Illuminate\Support\Facades\Log;
use App\Models\Resources\AnnuncioUsers;
use Auth;

class PublicController extends Controller {

    protected $_catalogModel;
    protected $faqu;
    protected $annunci;
    protected $locatore;


    public function __construct() {      
        $this->faqu = new FaqGetter();    
        $this->annunci= new Alloggi();
        $this->locatore= new Locatore();
    }

   
    
    public function viewFaqPage(){
        $faq = $this->faqu->getAllFaqs();
        return view('homepage')->with('faqs', $faq);
    }
    
    public function showAlloggi(){
        $alloggio= $this->annunci->getAnnunciobyPage(6);   
        log::info(print_r($alloggio,true));
        return view('catalogoalloggi')
               ->with('ads', $alloggio);      
    }
        
    public function schedaAlloggio($Annuncioid){
        
        //estrae l'alloggio
        $alloggio= $this->annunci->getAnnuncioById($Annuncioid);
        //Log::info('valore di alloggio'.$alloggio);
        
        //estrae servizi e locali nel caso di appartamento, e li sistema in array
        $stringa= $alloggio->servizi_inclusi;
        $array=explode(',',$stringa);
        $alloggio->servizi_inclusi=$array;
        
        if(($alloggio->tipologia)=='Appartamento'){
            $stringa2= $alloggio->A_locali_presenti;
        $array2=explode(',',$stringa2);
        $alloggio->A_locali_presenti=$array2;
        }
        
        //estrae il proprietario dell'alloggio
        $proprietario= $this->locatore->getLocatorebyAnnuncio($Annuncioid);
        //Log::info('valore di proprietario'.$proprietario);
        
        //verifica se il locatario ha già opzionato questo alloggio
        if( !(Auth::guest())){
        $option=$this->annunci->isOptionate(Auth::user()->id, $Annuncioid);
        
        return view('scheda_alloggio')->with('ann', $alloggio)->with('lore', $proprietario)
                ->with('isOptionate',$option);
        } else{
             return view('scheda_alloggio')->with('ann', $alloggio)->with('lore', $proprietario)->with('isOptionate',0);
       // }
    }
}
}
