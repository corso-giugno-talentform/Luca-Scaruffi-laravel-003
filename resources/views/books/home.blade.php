<x-app title="Home Libreria">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="text-center mb-5">
                    <h1 class="display-4 fw-bold text-primary">Benvenuto nella Tua Libreria Digitale</h1>
                    <p class="lead text-muted mx-auto" style="max-width: 700px;">
                        Esplora la tua collezione di libri, aggiungi nuove letture e gestisci i tuoi preferiti.
                    </p>
                </div>

                <div class="card shadow-sm mb-5">
                    <div class="card-header bg-primary text-white">
                        <h2 class="card-title h4 mb-0">Ultimi Libri Aggiunti</h2>
                    </div>
                    <div class="card-body">
                        @forelse ($latestBooks as $libro)
                            <div class="card mb-3 shadow-sm">
                                <div class="card-body d-flex align-items-center">
                                    <img src="{{ $libro->image ? asset('storage/images/' . $libro->image) : asset('images/mia_immagine_default.jpg') }}"
                                        alt="Copertina di {{ $libro->name }}" class="book-image">
                                    <div>
                                        <h5 class="card-title mb-1">{{ $libro->name }}</h5>
                                        <p class="card-text mb-0 text-muted">
                                            Pagine: {{ $libro->pages ?? 'N/D' }} |
                                            Anno: {{ $libro->year ?? 'N/D' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info" role="alert">
                                Nessun libro aggiunto di recente. Inizia aggiungendone uno!
                            </div>
                        @endforelse
                        <div class="text-center mt-4">
                            <a href="{{ route('books.manage.index') }}" class="btn btn-outline-primary">Vedi Tutti i
                                Libri <i class="bi bi-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>

                @auth
                    <div class="text-center py-5 bg-light p-4 rounded shadow-sm">
                        <h2 class="mb-4 fw-bold display-5 text-dark">Gestisci la Tua Collezione</h2>
                        <p class="lead mb-4 mx-auto text-muted" style="max-width: 800px;">
                            Accedi alla sezione di gestione completa per modificare, eliminare o cercare i tuoi libri.
                        </p>
                        <a href="{{ route('books.manage.index') }}" class="btn btn-success btn-lg"><i
                                class="bi bi-gear-fill me-2"></i> Vai alla Gestione Libri</a>
                    </div>
                @endauth
                @guest
                    <div class="text-center py-5 bg-light p-4 rounded shadow-sm">
                        <h2 class="mb-4 fw-bold display-5 text-dark">Accedi per Gestire i Tuoi Libri</h2>
                        <p class="lead mb-4 mx-auto text-muted" style="max-width: 800px;">
                            Registrati o accedi per sbloccare tutte le funzionalità di gestione della tua libreria.
                        </p>
                        <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-3"><i
                                class="bi bi-box-arrow-in-right me-2"></i> Accedi</a>
                        <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg"><i
                                class="bi bi-person-plus me-2"></i> Registrati</a>
                    </div>
                @endguest

            </div>
        </div>
    </div>

</x-app>
