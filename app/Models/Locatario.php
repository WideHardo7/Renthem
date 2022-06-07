<?php

namespace App\Models;

use App\Models\Resources\AnnuncioUsers;//new
use Illuminate\Support\Facades\Log;
use App\Models\Resources\Annuncio;
use App\User;

class Locatario {
   
    //new

    public function getOptionbyLocatario($id) {
       $locatario= User::find($id);
        $assegnato=$locatario->moreannunci()->wherePivot('assegnato','=',true)->get();
        
        Log::info(print_r($assegnato,true));
        
        
         
        return $assegnato;
    }
}