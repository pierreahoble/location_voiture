<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MediaUpdateRequest extends FormRequest
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
            'type' => ['required', 'max:20', 'string'],
            'lien' => ['required', 'max:255', 'string'],
            'bien_id' => ['required', 'exists:biens,id'],
        ];
    }
}
