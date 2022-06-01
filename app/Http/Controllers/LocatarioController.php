<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catalog;
use App\Models\FaqGetter;
use App\Models\Alloggi;

class LocatarioController extends Controller
{
    
    
    protected $faqu;
    protected $annunci;


    public function __construct() {
        
        $this->faqu = new FaqGetter();    
        $this->annunci= new Alloggi();
        $this->middleware('can:isLocatario');
    }
    
    
    
    
       
    
        
    
        
        public function insertOpzionamento(){
            /*take the user id of the locatario and the id of that annuncio opzionato
              $user=Auth::user()->id;
             * $annuncioid=;
             * $user->moreannunci()->attach($annuncioid);             */
        }
        
        public function sendMessage(SendMessageRequest $request){
            
        }
        
}



