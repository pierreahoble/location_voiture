<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CaracteristiqueStoreRequest extends FormRequest
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
            'valeur' => ['required', 'max:255', 'string'],
            'bien_id' => ['required', 'exists:biens,id'],
        ];
    }
}
