<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Catalog;
use App\Models\FaqGetter;
use App\Models\Resources\Annuncio;
use App\Http\Requests\NuovoAnnuncioRequest;
use App\Models\locatore;
use App\User;
use Auth;


class LocatoreController extends Controller
{
    
    
    protected $faqu;
    protected $annunci;
    protected $dati;
    protected $locatore;

    public function __construct() {
        
        $this->faqu = new FaqGetter();    
        $this->annunci= new Annuncio();
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
        return view('product.nuovo_annuncio');                    
    }
    
    
    public function insertAnnuncio(NuovoAnnuncioRequest $request){
                if ($request->hasFile('immagine')) {
            $image = $request->file('immagine');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        $annuncio = new Annuncio;
        $annuncio->fill($request->validated());
        $annuncio->immagine = $imageName;
        $annuncio->IDproprietario = Auth::user()->id;
        $annuncio->data_inizio_disponibilita = '2002-12-11';
        $annuncio->data_fine_disponibilita = '2003-11-11';
        $annuncio->assegnato = false;
        
        
        $array[]=($request->input('servizi_inlcusi'));
        LOG::info('array:', $array);
        
        $stringa= implode(' ',$array);               
   
        $annuncio->servizi_inclusi = $stringa;       
        $annuncio->save();
        
        
        //sposto immaggine nella cartella public/images/NuoviAlloggi
        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/NuoviAlloggi';
            $image->move($destinationPath, $imageName);
        };

        return response()->json(['redirect' => route('homelvl1')]);
    }
       
        public function showAnnunci(){
           $alloggio= $this->annunci->getAnnunciobyPage(6);
           return view('listaAlloggi')
           ->with('ads', $alloggio);
    }
    
}



