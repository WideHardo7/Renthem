<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\FaqGetter;
use App\Models\Alloggi;
use App\Models\Resources\Annuncio;
use App\Http\Requests\datiFiltro;
use Illuminate\Support\Facades\Log;

class LocatarioController extends Controller {

    protected $faqu;
    protected $annunci;

    public function __construct() {

        $this->faqu = new FaqGetter();
        $this->annunci = new Alloggi();

        $this->middleware('can:isLocatario');
    }

    public function ViewHomeLv3() {
        $faq = $this->faqu->getAllFaqs();
        return view('homepage3')->with('faqs', $faq);
    }

    public function ViewAlloggiLv3() {
        $alloggio = $this->annunci->getAnnunciobyPage(6);
        return view('catalogoalloggi3')
                        ->with('ads', $alloggio);
    }

    public function schedaAlloggio3($Annuncioid) {
        $alloggio = $this->annunci->getAnnuncioById($Annuncioid);
        return view('scheda_alloggio3')->with('ann', $alloggio);
    }

    public function ViewProfiloLv3() {
        return view('profilo3');
    }

    public function insertOpzionamento() {
        /* take the user id of the locatario and the id of that annuncio opzionato
          $user=Auth::user()->id;
         * $annuncioid=;
         * $user->moreannunci()->attach($annuncioid);             */
    }

    //metodo filtro
    
    public function filtro(Request $request) {


       // $params = $request->except('_token');
        
        $params = collect(request()->except('_token'));
        
        LOG::INFO(print_r($params,true));

        $variabile = $this->annunci->getAnnunciobyFilter($params, 6);

        return view('catalogoalloggi')->with('ads', $variabile);
    }
    
    
   
    
    
    public function filter(Request $request) {
        return CercaAlloggiFiltrati::apply($request);  
        }
    }
    