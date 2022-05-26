<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Resources\Product;
use App\Http\Requests\NewProductRequest;
use Illuminate\Http\Request;
use App\Models\FaqGetter;
use App\Models\Alloggi;

class AdminController extends Controller {

    
    protected $faqu;
    protected $annunci;


    public function __construct() {
        
        $this->faqu = new FaqGetter();    
        $this->annunci= new Alloggi();
    }
    
    
     public function ViewHomeLv4(){
        $faq = $this->faqu->getAllFaqs();

        return view('homepage4')->with('faqs', $faq);
    }
    
        public function ViewAlloggiLv4(){
        $alloggio= $this->annunci->getAnnunciobyPage(6);
        
        return view('catalogoalloggi4')
               ->with('ads', $alloggio);  
    }
    
        public function schedaAlloggio4($Annuncioid){
        
        $alloggio= $this->annunci->getAnnuncioById($Annuncioid);
        return view('scheda_alloggio4')->with('ann', $alloggio);
    }
    
        public function ViewProfiloLv4(){
    
        return view('profilo4');
        }    
    
    
    //FUNZIONI DEL PROF (da qua sotto in poi)
    
    protected $_adminModel;

    //public function __construct() {
    //     $this->middleware('can:isAdmin');
    //     $this->_adminModel = new Admin;
    //}

    public function index() {
        return view('admin');
    }

    public function addProduct() {
        $prodCats = $this->_adminModel->getProdsCats()->pluck('name', 'catId');
        return view('product.insert')
                        ->with('cats', $prodCats);
    }

    public function storeProduct(NewProductRequest $request) {

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        $product = new Product;
        $product->fill($request->validated());
        $product->image = $imageName;
        $product->save();

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/products';
            $image->move($destinationPath, $imageName);
        };

        return redirect()->action('AdminController@index');
    }


    
    
    
    
}
