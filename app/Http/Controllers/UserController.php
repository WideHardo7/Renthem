<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\ModificaProfiloRequest;
use Auth;
use Illuminate\Support\Facades\Hash;

class userController extends Controller {

    public function __construct() {
        $this->middleware('can:isUser');
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
    
}
