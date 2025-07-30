<?php

namespace App\Http\Requests; // Indica che questa classe appartiene al namespace 'App\Http\Requests'.
// Qui si trovano le classi Form Request, dedicate alla validazione e autorizzazione.

use Illuminate\Foundation\Http\FormRequest; // Importa la classe base 'FormRequest' di Laravel.
// Tutti i tuoi Form Request devono estendere questa classe
// per ottenere le funzionalità di validazione e autorizzazione.

class StoreBookRequest extends FormRequest // Definisce la classe 'StoreBookRequest'.
{                                           // Questa classe incapsula le regole di validazione
    // e la logica di autorizzazione per la richiesta di "salvataggio di un libro".

    /**
     * Determine if the user is authorized to make this request.
     * Determina se l'utente corrente è autorizzato a effettuare questa richiesta.
     *
     * @return bool
     */
    public function authorize(): bool // Metodo 'authorize':
    {                                   // Questo metodo è chiamato da Laravel prima di eseguire le regole di validazione.
        // Se restituisce 'false', Laravel genererà automaticamente un'eccezione HTTP 403 (Forbidden),
        // impedendo l'esecuzione del controller.
        // Per ora, restituiamo 'true' per permettere a qualsiasi utente di inviare il form.
        // In un'applicazione reale, qui verificheresti i permessi dell'utente (es. 'Auth::check()', 'Auth::user()->can('create-book')').
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     * Ottiene le regole di validazione che si applicano a questa richiesta.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array // Metodo 'rules':
    {                               // Questo metodo restituisce un array associativo dove le chiavi sono i nomi dei campi
        // della richiesta (es. 'name', 'pages') e i valori sono le regole di validazione
        // da applicare a quel campo.
        return [
            // 'name': campo obbligatorio, deve essere una stringa e non superare i 100 caratteri.
            'name' => 'required|string|max:100',
            // 'pages': campo opzionale (nullable), se presente deve essere un numero intero e maggiore o uguale a 1.
            'pages' => 'nullable|integer|min:1',
            // 'year': campo opzionale (nullable), se presente deve essere un numero intero,
            // maggiore o uguale a 1000 e non può essere un anno futuro (max: anno corrente + 1).
            'year' => 'nullable|integer|min:1000|max:' . (date('Y') + 1),
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     * Ottiene i messaggi di errore personalizzati per le regole di validazione definite.
     *
     * @return array<string, string>
     */
    public function messages(): array // Metodo 'messages':
    {                                   // Questo metodo ti permette di personalizzare i messaggi di errore
        // che Laravel mostra quando una regola di validazione fallisce.
        // La chiave è nel formato 'nome_campo.nome_regola' (es. 'name.required'),
        // e il valore è il messaggio personalizzato.
        return [
            'name.required' => 'Il campo "Nome Libro" è obbligatorio.',
            'name.string' => 'Il campo "Nome Libro" deve essere una stringa di testo.',
            'name.max' => 'Il campo "Nome Libro" non può superare i :max caratteri.', // :max è un placeholder che Laravel sostituirà con il valore reale (es. 100)

            'pages.integer' => 'Il campo "Numero Pagine" deve essere un numero intero.',
            'pages.min' => 'Il campo "Numero Pagine" deve essere un numero superiore a 0.',

            'year.integer' => 'Il campo "Anno Pubblicazione" deve essere un numero intero.',
            'year.min' => 'Il campo "Anno Pubblicazione" deve essere superiore a 999.',
            'year.max' => 'Il campo "Anno Pubblicazione" non può essere nel futuro.',
        ];
    }
}
