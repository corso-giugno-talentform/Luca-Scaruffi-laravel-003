<?php

namespace App\Http\Controllers; // Indica che questa classe appartiene al namespace 'App\Http\Controllers'.
// Tutti i controller di Laravel si trovano tipicamente qui.

use App\Models\Book; // Importa il modello 'Book'. Questo permette al controller di interagire
// con la tabella 'books' nel database tramite Eloquent ORM.

use App\Http\Requests\StoreBookRequest; // Importa il 'StoreBookRequest'. Questo è il Form Request
// che abbiamo creato per gestire la validazione dei dati
// quando si crea un nuovo libro.

class BookController extends Controller // Definisce il 'BookController'.
{                                       // Estende la classe base 'Controller' di Laravel,
    // fornendo funzionalità comuni ai controller.

    /**
     * Mostra la lista di tutti i libri.
     * Questo metodo corrisponde alla rotta GET '/' con nome 'books.index'.
     */
    public function index() // Metodo 'index': tipicamente usato per visualizzare una lista di risorse.
    {
        // Book::all(): Recupera tutti i record dalla tabella 'books' usando il modello Eloquent 'Book'.
        // I risultati sono una Collection di oggetti Book.
        $libri = Book::all();

        // return view('welcome', compact('libri')): Carica la vista 'welcome.blade.php'.
        // 'compact('libri')' passa la variabile $libri alla vista, rendendola disponibile
        // come $libri all'interno del file Blade.
        return view('welcome', compact('libri'));
    }

    /**
     * Mostra il form per creare un nuovo libro.
     * Questo metodo corrisponde alla rotta GET '/books/create' con nome 'books.create'.
     */
    public function create() // Metodo 'create': tipicamente usato per visualizzare il form di creazione di una nuova risorsa.
    {
        // return view('books.create'): Carica la vista 'resources/views/books/create.blade.php'.
        // Questa vista contiene il form HTML per l'inserimento dei dati del libro.
        return view('books.create');
    }

    /**
     * Salva un nuovo libro nel database.
     * Questo metodo corrisponde alla rotta POST '/books' con nome 'books.store'.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request  Laravel inietta automaticamente un'istanza del Form Request.
     */
    public function store(StoreBookRequest $request) // Metodo 'store': tipicamente usato per salvare una nuova risorsa nel database.
    {
        // La validazione è già avvenuta automaticamente grazie al Form Request.
        // Quando Laravel inietta 'StoreBookRequest $request', esegue automaticamente
        // le regole di validazione definite nel metodo 'rules()' di StoreBookRequest.
        // Se la validazione fallisce, Laravel reindirizza l'utente al form con gli errori
        // e i vecchi input, senza che il codice qui sotto venga eseguito.

        // Book::create($request->validated()): Crea un nuovo record nella tabella 'books'.
        // '$request->validated()' è un metodo del Form Request che restituisce un array
        // contenente solo i dati che hanno superato la validazione. Questo è un modo
        // sicuro per prevenire attacchi di "Mass Assignment" e assicura che solo
        // i dati validi vengano salvati.
        Book::create($request->validated());

        // return redirect()->route('books.index')->with('success', '...'):
        // Reindirizza l'utente alla rotta 'books.index' (la homepage con la lista dei libri).
        // '->with('success', '...')' aggiunge un "messaggio flash" alla sessione.
        // Questo messaggio sarà disponibile nella vista 'welcome.blade.php' per essere visualizzato
        // una sola volta (es. "Libro aggiunto con successo!").
        return redirect()->route('books.index')->with('success', 'Libro aggiunto con successo!');
    }

    // Qui potremmo aggiungere i metodi per 'show', 'edit', 'update', 'destroy' in futuro:
    // Questi sono i metodi standard per completare le operazioni CRUD (Create, Read, Update, Delete).
    // 'show' per visualizzare un singolo libro, 'edit' per mostrare il form di modifica,
    // 'update' per salvare le modifiche, 'destroy' per eliminare un libro.
}
