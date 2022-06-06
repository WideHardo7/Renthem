<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;



class FiltroStatisticheRequest extends FormRequest {
   
    public function authorize() {
        // Nella form non mettiamo restrizioni d'uso su base utente
        // Gestiamo l'autorizzazione ad un altro livello
        return true;
    }
    
    
    public function rules() {
        return [
           
            'tipologia' => 'required',
                
            'data_inizio' => 'date|before:tomorrow|nullable',
            'data_fine' => 'date|before:tomorrow|nullable',          
                       
                   
        ];
        
        
    }
    
    


}
