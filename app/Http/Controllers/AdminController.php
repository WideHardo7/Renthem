<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Resources\Product;
use App\Http\Requests\NewProductRequest;

use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\FaqGetter;
use App\Models\Alloggi;

class AdminController extends Controller {

   protected $faqu;
    protected $annunci;
    protected $dati;
    

    public function __construct() {
        
        $this->faqu = new FaqGetter();    
        $this->annunci= new Alloggi();
        $this->middleware('can:isAdmin');
        
       
    }

    public function index() {
        return view('admin');
    }



     public function ViewEditFaq(){
        $faq = $this->faqu->getAllFaqs();

        return view('listafaq')->with('faqs', $faq);
    }
    
    
    
    
}
