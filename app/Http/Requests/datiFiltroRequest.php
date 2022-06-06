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
            'citta' => 'string|max:50',
            'data_inizio_permanenza' => 'required',                                              
            'min_price' => 'integer|min:0',
            'max_price' => 'integer|max:2000',
            
            'dimensione' => 'integer|min:0',          
                                                    
            'A_numero_camere' => 'integer|min:1',                                
                                 
            'C_numero_posti_letto_in_camera'=> 'integer|min:1',
            'numero_posti_letto_totali'=> 'integer|min:1',
            
                   
        ];               
    }
    
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }


}
