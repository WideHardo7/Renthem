<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\FaqGetter;
use App\Models\Alloggi;
 
use App\Models\Admin;//new
use App\Models\Resources\Annuncio;//new
use App\Http\Requests\nuovoAnnuncioRequest;//new

class LocatoreController extends Controller {

    protected $_catalogModel;
    protected $faqu;
    protected $annunci;
    
    protected $_locatoreModel;//new

    public function __construct() {
        $this->_catalogModel = new Catalog;
        $this->faqu = new FaqGetter();    
        $this->annunci= new Alloggi();
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
        return view('scheda_alloggio')->with('ann', $alloggio);
    }
    
    
    
    //new
    public function showNuovoAnnuncioForm($Annuncioid){
        
        $alloggio= $this->annunci->getAnnuncioById($Annuncioid);
        return view('scheda_alloggio')->with('ann', $alloggio);
    }
    
     public function insertAnnuncio($Annuncioid){
        
        $alloggio= $this->annunci->getAnnuncioById($Annuncioid);
        return view('scheda_alloggio')->with('ann', $alloggio);
    }
    
    
    
}
