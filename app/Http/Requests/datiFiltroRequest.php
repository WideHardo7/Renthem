<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

// Aggiunti per response JSON
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;


class datiFiltroRequest extends FormRequest {
    
    public function authorize() {
        // Nella form non mettiamo restrizioni d'uso su base utente
        // Gestiamo l'autorizzazione ad un altro livello
        return true;
    }
           
    public function rules() {
        return [
            'citta' => 'nullable|alpha|max:50',
            'data_inizio_permanenza' => 'nullable',                                              
            'min_price' => 'nullable|integer|min:0',
            'max_price' => 'nullable|integer|max:2000',
            
            'dimensione' => 'nullable|integer|min:0',          
                                                    
            'A_numero_camere' => 'nullable|integer|min:1',                                
                                 
            'C_numero_posti_letto_in_camera'=> 'nullable|integer|min:1',
            'numero_posti_letto_totali'=> 'nullable|integer|min:1',
            
                   
        ];               
    }
        

}
