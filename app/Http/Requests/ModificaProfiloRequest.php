<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Symfony\Component\HttpFoundation\Response;

class ModificaProfiloRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        // Nella form non mettiamo restrizioni d'uso su base utente
        // Gestiamo l'autorizzazione ad un altro livello
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'nome' => 'string|max:20|nullable',
            'cognome' => 'string|max:20|nullable',
            'email' => 'string|email|max:40|unique:users|nullable',           
            'password' => 'string|min:8|confirmed|nullable',
            'telefono' => 'numeric|digits_between:8,11|nullable',
            'data_nascita' => 'date|before:today|nullable',
        ];
    }
    

}
