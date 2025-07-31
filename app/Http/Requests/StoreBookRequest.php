<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:100',
            'pages' => 'nullable|integer|min:1',
            'year' => 'nullable|integer|min:1000|max:' . (date('Y') + 1),
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg,webp|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Il campo "Nome Libro" è obbligatorio.',
            'name.string' => 'Il campo "Nome Libro" deve essere una stringa di testo.',
            'name.max' => 'Il campo "Nome Libro" non può superare i :max caratteri.',

            'pages.integer' => 'Il campo "Numero Pagine" deve essere un numero intero.',
            'pages.min' => 'Il campo "Numero Pagine" deve essere un numero superiore a 0.',

            'year.integer' => 'Il campo "Anno Pubblicazione" deve essere un numero intero.',
            'year.min' => 'Il campo "Anno Pubblicazione" deve essere superiore a 999.',
            'year.max' => 'Il campo "Anno Pubblicazione" non può essere nel futuro.',

            'image.image' => 'Il file caricato deve essere un\'immagine valida.',
            'image.mimes' => 'Il formato dell\'immagine non è supportato. Sono ammessi: JPG, JPEG, PNG, GIF, SVG, WEBP.',
            'image.max' => 'L\'immagine non può superare i :max KB di dimensione.',
        ];
    }
}
