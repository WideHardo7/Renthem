<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\FaqGetter;
use App\Models\Alloggi;

class PublicController extends Controller {

    protected $_catalogModel;
    protected $faqu;
    protected $annunci;


    public function __construct() {
        $this->_catalogModel = new Catalog;
        $this->faqu = new FaqGetter();    
        $this->annunci= new Alloggi();
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
        $alloggio= $this->annunci->getAnnunciobyPage(5);
        
        return view('catalogoalloggi')
               ->with('ads', $alloggio);
        
        
    }

    public function schedaAlloggio($Annuncioid){
        $alloggio= $this->annunci->getAnnuncioById($Annuncioid);
        return view('scheda_alloggio')->with('ann', $alloggio);
    }
}
