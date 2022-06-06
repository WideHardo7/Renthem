<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\ModificaProfiloRequest;
use Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Chat;
use App\Models\Resources\Messaggio;
use Illuminate\Support\Facades\Log;


class userController extends Controller {
    
    protected $messaggi;

    public function __construct() {
        $this->middleware('can:isUser');
        $this->messaggi= new Chat();
    }

    public function index() {
        return view('profilo');
    }

    public function ViewEditProfilo(){
        return view('product/modifica_profilo');
        
    }    


    public function EditUtente(ModificaProfiloRequest $request){
       
       $result = collect(request()->all())->filter(function($request){
            return is_string($request)&&!empty($request)||is_array($request)&&count($request);
        });
        
        $user=Auth::user();        
        $user->update($result->all());
        
        return redirect()->action('UserController@index');
            
    }    
    
        public function viewChat() {
            $listautenti;
            
            
            $listautenti=$this->messaggi->getMessagebyId((Auth::user()->id),(Auth::user()->role)); 
           Log::info(json_encode($listautenti));
        return view('chat')->with('list', $listautenti);
    }
    
    public function viewUtenti(){
        
    }
}
