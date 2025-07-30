<?php

namespace App\Models; // Questo non è necessario in routes/web.php, ma può essere presente se usato altrove.
// Tipicamente, qui si importano solo i Controller e i Facades.
use App\Models\Book; // Importa il modello 'Book'. Se non lo usi direttamente per query nelle rotte,
// ma solo tramite il Controller, questa riga non sarebbe strettamente necessaria qui,
// ma non causa problemi. È utile se si volessero fare query dirette nella rotta.

use App\Http\Controllers\BookController; // **Importante:** Importa il 'BookController'.
// Questo permette a Laravel di trovare la classe del controller
// quando viene specificata nelle rotte. Senza questo import,
// Laravel non saprebbe dove trovare 'BookController'.

use Illuminate\Support\Facades\Route; // Importa la Facade 'Route', che fornisce i metodi statici
// per definire le rotte (es. Route::get(), Route::post()).

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Questa sezione è dove registri le rotte web per la tua applicazione.
| Le rotte sono caricate dal 'RouteServiceProvider' e saranno assegnate
| al gruppo di middleware "web". Questo gruppo include funzionalità come
| la gestione delle sessioni, la protezione CSRF e la crittografia dei cookie,
| essenziali per le applicazioni web tradizionali.
|
*/

// Rotta per la homepage:
// Quando un utente visita l'URL base della tua applicazione ('/'),
// Laravel chiama il metodo 'index' del 'BookController'.
// '->name('books.index')' assegna un nome univoco a questa rotta.
// Usare i nomi delle rotte (es. route('books.index')) è una best practice
// perché se l'URL cambia, non devi aggiornare tutti i link nelle tue viste,
// ma solo la definizione della rotta qui.
Route::get('/', [BookController::class, 'index'])->name('books.index');

// Rotta per mostrare il form di creazione di un nuovo libro:
// Quando un utente visita '/books/create' con una richiesta GET,
// Laravel chiama il metodo 'create' del 'BookController'.
// Questo metodo è responsabile di restituire la vista con il form.
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

// Rotta per salvare un nuovo libro nel database:
// Quando un utente invia un form (tipicamente con metodo POST) all'URL '/books',
// Laravel chiama il metodo 'store' del 'BookController'.
// Questo metodo è responsabile di validare i dati del form e salvarli nel database.
// È cruciale che il metodo del form (POST) corrisponda al metodo della rotta.
Route::post('/books', [BookController::class, 'store'])->name('books.store');

// Puoi mantenere le rotte del tuo portfolio se vuoi, ad esempio:
// Queste sono rotte commentate, tipicamente usate per mostrare come potresti
// integrare altre sezioni della tua applicazione o rotte preesistenti.
// use App\Http\Controllers\PageController;
// Route::get('/contatti', [PageController::class, 'contact'])->name('contact');
// Route::post('/contatti', [PageController::class, 'submitContactForm'])->name('contact.submit');
// ... e così via per le altre pagine del portfolio se le hai integrate.
