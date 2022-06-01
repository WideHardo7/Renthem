<?php

namespace App\Http\Controllers;


use App\Models\FaqGetter;
use App\Models\Alloggi;
use App\Models\Locatore;
use Illuminate\Support\Facades\Log;

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
        return view('catalogoalloggi')
               ->with('ads', $alloggio);      
    }

    public function schedaAlloggio($Annuncioid){
        
        $alloggio= $this->annunci->getAnnuncioById($Annuncioid);
        Log::info('valore di alloggio'.$alloggio);
        
        $stringa= $alloggio->servizi_inclusi;
        $array=explode(',',$stringa);
        $alloggio->servizi_inclusi=$array;
        
        if(($alloggio->tipologia)=='Appartamento'){
            $stringa2= $alloggio->A_locali_presenti;
        $array2=explode(',',$stringa2);
        $alloggio->A_locali_presenti=$array2;
        }
        
        $proprietario= $this->locatore->getLocatorebyAnnuncio($Annuncioid);
        Log::info('valore di proprietario'.$proprietario);
        return view('scheda_alloggio')->with('ann', $alloggio)->with('lore', $proprietario);
    }
}
