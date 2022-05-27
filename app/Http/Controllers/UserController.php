<?php

namespace App\Http\Controllers;

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
    
    public function EditUtente(){
        
        
    }    
    
}
