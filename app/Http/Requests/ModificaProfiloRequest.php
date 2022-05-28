<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewProductRequest extends FormRequest {

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
            'nome' => ['string', 'max:255'],
            'cognome' => ['string', 'max:255'],
            'email' => ['string', 'email', 'max:255', 'unique:users'],
            'username' => ['string', 'min:6', 'unique:users'],
            'password' => ['string', 'min:8', 'confirmed'],
            'telefono' => ['numeric', 'max:20'],
            'data_nascita' => ['date','before:today'],
        ];
    }

}
