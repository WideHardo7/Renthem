<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Resources\Product;
use App\Models\Resources\Faq;
use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\FaqGetter;
use Illuminate\Support\Facades\Log;
use App\Models\Alloggi;
use App\Http\Requests\ModificaFaqRequest;
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
    
        public function ViewStats() {
        return view('stats');
    }
    
    public function AggiungiFaq(){
        
    }
    
    public function EliminaFaq($id){
        $faqdel= $this->faqu->getThisFaq($id);
        $faqdel->delete();
        return response()->json(['redirect' => route('viewEditFaq')]);
    }

    public function EditFaq(ModificaFaqRequest $request){
         $faq = new Faq;  
         $faq->fill($request->validated());
         $faq->domanda=$request->domandamaybe;
         $faq->risposta=$request->rispostamaybe;
         $faqupdate= $this->faqu->getThisFaq($request->FaqId);        
         $faqupdate->update($faq->only(['domanda','risposta']));
         return response()->json(['redirect' => route('viewEditFaq')]);
    }
    
    
}
