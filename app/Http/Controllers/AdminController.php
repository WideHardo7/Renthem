<?php

namespace App\Http\Controllers;

use App\Models\Admin;

use App\Models\Resources\Faq;
use Illuminate\Http\Request;

use App\Models\FaqGetter;
use Illuminate\Support\Facades\Log;
use App\Models\Alloggi;
use App\Http\Requests\AggiungiFaqRequest;
use App\Http\Requests\ModificaFaqRequest;
use App\Http\Requests\FiltroStatisticheRequest;
class AdminController extends Controller {

   protected $faqu;
    protected $annunci;
    protected $dati;
    protected  $admin;



    public function __construct() {
        
        $this->faqu = new FaqGetter();    
        $this->annunci= new Alloggi();
        $this->admin= new Admin();
        
        $this->middleware('can:isAdmin');
        
       
    }

    public function index() {
        return view('admin');
    }



     public function ViewEditFaq(){
        $faq = $this->faqu->getAllFaqs();

        return view('listafaq')->with('faqs', $faq);
    }
    
        public function ViewStatsbyFilter(FiltroStatisticheRequest $request) {
            
            $param = collect(request()->all());
            
            
            Log::info(print_r($param,true));
            //$param=array("tipologia"=> 'Appartamento', "data_inizio" =>'2022-06-04');
            $stats=$this->admin->getStatistiche($param);
            
        return view('stats')->with('stats',$stats);
    }
    
     public function ViewStats() {
         
         return view('stats');
     }
    
    public function AggiungiFaq(AggiungiFaqRequest $request){
        $faq = new Faq;  
        $faq->fill($request->validated());
        $faq->save();
        return response()->json(['redirect' => route('viewEditFaq')]);
        
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
