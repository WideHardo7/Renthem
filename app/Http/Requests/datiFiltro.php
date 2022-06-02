<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

// Aggiunti per response JSON
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;


class datiFiltro extends FormRequest {
           
    public function rules() {
        return [
            'citta' => 'nullable|max:50',
                                              
            'minimum_price' => 'nullable|integer',
            'maximum_price' => 'nullable|integer',
            
          //  'dimensione' => 'required|integer|min:0',
          //   'tipologia' => 'nullable',
         //   'data_inizio_permanenza' => 'required',            
         //   'servizi_inclusi' => 'required|array',  //usato sia per posto letto che appartamento
                    
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
