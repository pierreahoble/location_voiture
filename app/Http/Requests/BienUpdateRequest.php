<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BienUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'designation' => ['required', 'max:255', 'string'],
            'email' => ['nullable', 'email'],
            'telephone' => ['nullable', 'max:255', 'string'],
            'immatriculation' => ['nullable', 'max:255', 'string'],
            'prix_jour' => ['nullable', 'numeric'],
            'annee' => ['nullable', 'max:255', 'string'],
            'couleur' => ['nullable', 'max:255', 'string'],
            'type_consomation' => ['nullable', 'max:255', 'string'],
            'transmission' => ['nullable', 'max:255', 'string'],
            'conso_sur_cent' => ['nullable', 'max:255', 'string'],
            'moteur' => ['nullable', 'max:255', 'string'],
            'Nbre_porte' => ['nullable', 'max:255', 'string'],
            'Nbre_place' => ['nullable', 'max:255', 'string'],
            'Description' => ['nullable', 'max:255', 'string'],
            'type_id' => ['required', 'exists:types,id'],
            'gerant_id' => ['nullable', 'exists:users,id'],
            'modele_id' => ['required', 'exists:modeles,id'],
            'marque_id' => ['required', 'exists:marques,id'],
        ];
    }
}
