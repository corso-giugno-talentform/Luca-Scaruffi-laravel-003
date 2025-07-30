<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Elenco Libri</title>
    {{-- Includi Bootstrap CSS per lo styling --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h1 class="mb-4">I Miei Libri</h1>

        {{-- Messaggio di successo (se presente nella sessione) --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Link per creare un nuovo libro --}}
        <div class="mb-4">
            <a href="{{ route('books.create') }}" class="btn btn-primary">Crea Nuovo Libro</a>
        </div>

        {{-- Elenco dei libri --}}
        @forelse ($libri as $libro)
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $libro->name }}</h5>
                    <p class="card-text">
                        Pagine: {{ $libro->pages ?? 'N/D' }} | {{-- Corretto da $libro->page a $libro->pages --}}
                        Anno: {{ $libro->year ?? 'N/D' }}
                    </p>
                    {{-- Qui potremmo aggiungere link per modificare o eliminare in futuro --}}
                </div>
            </div>
        @empty
            <div class="alert alert-info" role="alert">
                Nessun libro trovato nel database. Clicca su "Crea Nuovo Libro" per aggiungerne uno!
            </div>
        @endforelse
    </div>

    {{-- Includi Bootstrap JS per il funzionamento degli alert --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
