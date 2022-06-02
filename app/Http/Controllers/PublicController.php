<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
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
        $this->_catalogModel = new Catalog;
        $this->faqu = new FaqGetter();    
        $this->annunci= new Alloggi();
        $this->locatore= new Locatore();
    }

    public function showCatalog1() {

        //Categorie Top
        $topCats = $this->_catalogModel->getTopCats();
        
        //Prodotti in sconto di tutte le categorie, ordinati per sconto decrescente
        $prods = $this->_catalogModel->getProdsByCat($topCats->map->only(['catId']), 2, 'desc', true);

        return view('catalog')
                        ->with('topCategories', $topCats)
                        ->with('products', $prods);
    }

    public function showCatalog2($topCatId) {

        //Categorie Top
        $topCats = $this->_catalogModel->getTopCats();

        //Categoria Top selezionata
        $selTopCat = $topCats->where('catId', $topCatId)->first();

        // Sottocategorie
        $subCats = $this->_catalogModel->getCatsByParId([$topCatId]);
                        
        //Prodotti in sconto della categoria Top selezionata, ordinati per sconto decrescente 
        $prods = $this->_catalogModel->getProdsByCat([$topCatId], 2, 'desc', true);

        return view('catalog')
                        ->with('topCategories', $topCats)
                        ->with('selectedTopCat', $selTopCat)
                        ->with('subCategories', $subCats)
                        ->with('products', $prods);
    }

    public function showCatalog3($topCatId, $catId) {

        //Categorie Top
        $topCats = $this->_catalogModel->getTopCats();

        //Categoria Top selezionata
        $selTopCat = $topCats->where('catId', $topCatId)->first();

        // Sottocategorie
        $subCats = $this->_catalogModel->getCatsByParId([$topCatId]);

        // Prodotti della categoria selezionata, in sconto o meno
       $prods = $this->_catalogModel->getProdsByCat([$catId]);

        return view('catalog')
                        ->with('topCategories', $topCats)
                        ->with('selectedTopCat', $selTopCat)
                        ->with('subCategories', $subCats)
                        ->with('products', $prods);
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
        $option=$this->annunci->isOptionate(Auth::user()->id, $Annuncioid);
        
        return view('scheda_alloggio')->with('ann', $alloggio)->with('lore', $proprietario)
                ->with('isOptionate',$option);
    }
}
