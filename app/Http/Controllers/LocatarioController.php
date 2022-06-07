<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\FaqGetter;
use App\Models\Alloggi;
use App\Http\Requests\SendMessageRequest;
use App\Http\Requests\SetOptionamentRequest;
use App\Models\Resources\Messaggio;
use App\Models\Resources\AnnuncioUsers;
use Illuminate\Support\Facades\Log;
use App\User;
use App\Models\Locatario;
use Auth;
use App\Http\Requests\datiFiltroRequest;


class LocatarioController extends Controller {

    protected $faqu;
    protected $annunci;
    protected $loca;

    public function __construct() {

        $this->faqu = new FaqGetter();
        $this->annunci = new Alloggi();
        $this->loca= new Locatario;

        $this->middleware('can:isLocatario');
        
    }
    
     
      
        
        
        
        public function sendMessage(SendMessageRequest $request, $id){
            
            $dati= collect(request()->all())->filter(function($request){
                                   return is_string($request)&&!empty($request);
            });
            //Log::info(print_r($dati));
            //$contenuto= $dati->contenuto;
            
            
                $messaggio= new Messaggio();
                $messaggio->fill($request->validated());
                $messaggio->idlocatario=Auth::user()->id; 
                $messaggio->sender= false;
                $messaggio->save();
           
            return redirect()->action('PublicController@schedaAlloggio', $id);
            
        }
        
        public function setOption(SetOptionamentRequest $request, $id){
            
            $locatanome=Auth::user()->nome;
            $locatacognome=Auth::user()->cognome;
            
            $annuncio=$this->annunci->getAnnuncioById($id);
            
            $Messaggioption="L'utente ".$locatanome." ".$locatacognome." ha opzionato il seguente ".$annuncio->tipologia.", in ".$annuncio->indirizzo." " .$annuncio->citta."";
            
             $messaggio= new Messaggio();
                $messaggio->fill($request->validated());
                $messaggio->idlocatario=Auth::user()->id;
                $messaggio->contenuto= $Messaggioption;
                $messaggio->sender= false;
                $messaggio->save();
                
               
                
                $user_id=Auth::user()->id;
                $this->annunci->insertOptionament($user_id,$id);
                return redirect()->action('PublicController@schedaAlloggio', $id);
        }
        


     
    
    
   
    
    
    public function filtro(datiFiltroRequest $request) {
        $params = collect($request->except('_token'));

        //LOG::INFO(print_r($params,true));

        $variabile = $this->annunci->getAnnunciobyF($params, 6);        
        return view('catalogoalloggi')->with('ads', $variabile);
    }
    
    
 }
    
