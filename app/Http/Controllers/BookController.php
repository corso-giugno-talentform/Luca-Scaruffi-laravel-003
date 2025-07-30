<?php

namespace App\Http\Controllers;

use App\Models\Book; // Importa il modello Book
use App\Http\Requests\StoreBookRequest; // Importa il tuo nuovo Form Request

class BookController extends Controller
{
    /**
     * Mostra la lista di tutti i libri.
     */
    public function index()
    {
        // Recupera tutti i libri dal database
        $libri = Book::all();

        // Passa i libri alla vista 'welcome' (la nostra homepage per i libri)
        return view('welcome', compact('libri'));
    }

    /**
     * Mostra il form per creare un nuovo libro.
     */
    public function create()
    {
        // Restituisce la vista che contiene il form di creazione del libro
        return view('books.create');
    }

    /**
     * Salva un nuovo libro nel database.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBookRequest $request) // Ora inietta StoreBookRequest
    {
        // La validazione è già avvenuta automaticamente grazie al Form Request.
        // Se la validazione fallisce, Laravel reindirizza automaticamente l'utente
        // al form con gli errori e i vecchi input.

        // 1. Creazione di un nuovo record Book nel database
        // Il metodo 'create' funziona perché abbiamo definito $fillable nel modello Book
        // $request->validated() restituisce solo i dati che sono stati validati
        Book::create($request->validated());

        // 2. Reindirizza l'utente alla pagina principale dei libri con un messaggio di successo
        return redirect()->route('books.index')->with('success', 'Libro aggiunto con successo!');
    }

    // Qui potremmo aggiungere i metodi per 'show', 'edit', 'update', 'destroy' in futuro
}
