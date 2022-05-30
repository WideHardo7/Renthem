<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

// Aggiunti per response JSON
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;


class NuovoAnnuncioRequest extends FormRequest {
   
    public function authorize() {
        // Nella form non mettiamo restrizioni d'uso su base utente
        // Gestiamo l'autorizzazione ad un altro livello
        return true;
    }
    
    
    public function rules() {
        return [
            'tipologia' => 'required',
            'descrizione' => 'required|max:1000',
            'citta' => 'required|max:50',
            'immagine' => 'image|max:1024',
            'zona_quartiere' => 'required|max:50',
            'indirizzo' => 'required|max:50',            
            'importo' => 'required|integer|min:0',
            'servizi_inclusi' => 'required|array',
            //'periodo'=> 'required',
            'eta_minima' => 'required|integer|min:0',
            'genere_richiesto'=> 'required',           
            
            'dimensione' => 'required|integer|min:0',
            
            'A_numero_camere' => 'nullable|integer|min:1',
            'A_numero_posti_letto' => 'nullable|integer|min:1',
            'A_servizi_disponibili' => 'nullable',
            'A_presenza_locale_ricreativo' => 'nullable',
            'A_presenza_cucina' => 'nullable',
                      
            'C_numero_posti_letto_in_camera'=> 'nullable|integer|min:1',
            'C_numero_posti_letto_totali'=> 'nullable|integer|min:1',
            'C_presenza_angolo_studio'=> 'nullable',
                   
        ];
        
        
    }
    
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }


}
