<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Per ora, permettiamo a tutti di fare questa richiesta.
        // In un'applicazione reale, qui verificheresti i permessi dell'utente.
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'pages' => 'nullable|integer|min:1',
            'year' => 'nullable|integer|min:1000|max:' . (date('Y') + 1), // Anno non può essere futuro
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Il campo "Nome Libro" è obbligatorio.',
            'name.string' => 'Il campo "Nome Libro" deve essere una stringa di testo.',
            'name.max' => 'Il campo "Nome Libro" non può superare i :max caratteri.', // :max verrà sostituito da Laravel

            'pages.integer' => 'Il campo "Numero Pagine" deve essere un numero intero.',
            'pages.min' => 'Il campo "Numero Pagine" deve essere un numero superiore a 0.',

            'year.integer' => 'Il campo "Anno Pubblicazione" deve essere un numero intero.',
            'year.min' => 'Il campo "Anno Pubblicazione" deve essere superiore a 999.',
            'year.max' => 'Il campo "Anno Pubblicazione" non può essere nel futuro.',
        ];
    }
}
