<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

// Aggiunti per response JSON
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;


class ModificaAnnuncioRequest extends FormRequest {
   
    public function authorize() {
        // Nella form non mettiamo restrizioni d'uso su base utente
        // Gestiamo l'autorizzazione ad un altro livello
        return true;
    }
    
    
    public function rules() {
        return [
            'citta' => 'required|max:50',
            'zona_quartiere' => 'required|max:50',
            'indirizzo' => 'required|max:50',            
            'descrizione' => 'required|max:1000',
            'importo' => 'required|integer|min:0',
            'dimensione' => 'required|integer|min:0',    
            'data_inizio_disponibilita' => 'required',
            'data_fine_disponibilita' => 'required',          
            'servizi_inclusi' => 'required|array',  //usato sia per posto letto che appartamento
            'eta_minima' => 'required|integer|min:0',
            'genere_richiesto'=> 'required',           
            'immagine' => 'image|max:1024',                    
            'A_numero_camere' => 'nullable|integer|min:1',           
            'A_locali_presenti' => 'nullable',                                
            'C_numero_posti_letto_in_camera'=> 'nullable|integer|min:1',
            'numero_posti_letto_totali'=> 'nullable|integer|min:1',            
                   
        ];
        
        
    }
    
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response($validator->errors(), Response::HTTP_UNPROCESSABLE_ENTITY));
    }


}
