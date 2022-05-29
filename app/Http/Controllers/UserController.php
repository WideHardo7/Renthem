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
    
    public function Verifica(ModificaProfiloRequest $request){
        
               if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
        } else {
            $imageName = NULL;
        }

        $product = new Product;
        $product->fill($request->validated());
        $product->image = $imageName;
        $product->save();

        if (!is_null($imageName)) {
            $destinationPath = public_path() . '/images/products';
            $image->move($destinationPath, $imageName);
        };

        return response()->json(['redirect' => route('admin')]);
    }


    public function EditUtente(ModificaProfiloRequest $request){
        
        
        $result = collect(request()->all())->filter(function($request){
            return is_string($request)&&!empty($request)||is_array($request)&&count($request);
        });
        $user=Auth::user();
        $user->update($result->all());
        $user->update($result->Hash::make($result.password));
        return response()->json(['redirect' => route('profilo')]);
       
    }    
    
}
