<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Catalog;
use App\Models\FaqGetter;
use App\Models\Alloggi;
use App\Models\Locatore;
use App\User;
use Auth;
use App\Http\Requests\ModificaAnnuncioRequest;
use App\Models\Resources\Annuncio;
use App\Http\Requests\NuovoAnnuncioRequest;




class LocatoreController extends Controller
{
    
    
    protected $faqu;
    protected $annunci;
    protected $dati;
    protected $locatore;
    protected $alloggi;

    public function __construct() {
        
        $this->faqu = new FaqGetter();    
        $this->annunci= new Annuncio();
        $this->alloggi=new Alloggi();
        $this->middleware('can:isLocatore');
        
        $this->locatore= new Locatore(); 
    }
    
    
    
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
        $annuncio->user_id = Auth::user()->id;        
        $annuncio->assegnato = false;
        
        $array=$request->servizi_inclusi;       
        $stringa= implode(',',$array);  
        $annuncio->servizi_inclusi = $stringa;
        
        if(($annuncio->tipologia)=='Appartamento'){
        $array2=$request->A_locali_presenti;
        $stringa2= implode(',',$array2);  
        $annuncio->A_locali_presenti = $stringa2;
        };
                   
        $annuncio->save();
        
        
        //sposto immaggine nella cartella public/images/NuoviAlloggi
        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/properties';
            $image->move($destinationPath, $imageName);
        };

        return response()->json(['redirect' => route('homelvl1')]);
    }
       
        public function showAnnunci(){
           $utente= Auth::user()->id;           
           Log::info('utente id passato'.$utente);          
           $alloggio= $this->alloggi->getAnnunciobyLocatore($utente);
           return view('listaAlloggi')
           ->with('ads', $alloggio);
    }
    public function showOptionforAnnuncio($idannuncio){
       // $annuncio=Annuncio::find($idannuncio);
        //$locatari= $annuncio->moreutenti;
        //return $locatari;
    }
    
    public function ShowFormMod($id){
        $alloggio= $this->alloggi->getAnnuncioById($id);
        $serviziarray=explode(",",$alloggio->servizi_inclusi);
        $localiarray=explode(",",$alloggio->A_locali_presenti);
        return view('ModificaAnnuncio')->with('ann', $alloggio)->with('servarray',$serviziarray)->with('localarray',$localiarray);
    }
    
    public function PostFormMod(ModificaAnnuncioRequest $request){
        
        $annuncioUpd=$this->alloggi->getAnnuncioById($request->AnnuncioId);
        if ($request->hasFile('immagine')) {
            $image = $request->file('immagine');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = null;
        }  
        $annuncioUpd->fill($request->validated());    
        if(!is_null($imageName)){
            $annuncioUpd->immagine = $imageName;
        } 
        $array=$request->servizi_inclusi;       
        $stringa= implode(',',$array);  
        $annuncioUpd->servizi_inclusi = $stringa;   
        if(($annuncioUpd->tipologia)=='Appartamento'){
            $array2=$request->A_locali_presenti;
            $stringa2= implode(',',$array2);  
            $annuncioUpd->A_locali_presenti = $stringa2;
        };       
        $annuncioUpd->save();
        //sposto immaggine nella cartella public/images/NuoviAlloggi
        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/properties';
            $image->move($destinationPath, $imageName);
        };
        return response()->json(['redirect' => route('viewAnnunci')]);
    }
    
    public function Delete($id){
        $Anndel= $this->alloggi->getAnnuncioById($id);
        $Anndel->delete();
        return response()->json(['redirect' => route('viewAnnunci')]);
    }
    
    public function Returnintrest($id){
        
        $locatari= $this->alloggi->showOptionforAnnuncio($id);
        
        //log::info(print_r($locatari));
        //return view('test')->with('loca',$locatari);
        /*return Response::json(array(
                    'success' => true,
                    'data'   => $locatari
                )); */
        return $locatari;
    }
}



