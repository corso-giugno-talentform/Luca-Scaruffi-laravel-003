<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crea Nuovo Libro</title>
    {{-- Includi Bootstrap CSS per lo styling --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h1 class="card-title h3 mb-0">Crea Nuovo Libro</h1>
                    </div>
                    <div class="card-body">
                        {{-- Form per l'inserimento del libro --}}
                        <form action="{{ route('books.store') }}" method="POST">
                            @csrf {{-- AGGIUNTO: Token CSRF per la sicurezza del form --}}

                            <div class="mb-3">
                                <label for="name" class="form-label">Nome Libro</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="pages" class="form-label">Numero Pagine</label>
                                <input type="number" class="form-control @error('pages') is-invalid @enderror"
                                    id="pages" name="pages" value="{{ old('pages') }}">
                                @error('pages')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="year" class="form-label">Anno Pubblicazione</label>
                                <input type="number" class="form-control @error('year') is-invalid @enderror"
                                    id="year" name="year" value="{{ old('year') }}">
                                @error('year')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Salva Libro</button>
                            <a href="{{ route('books.index') }}" class="btn btn-secondary ms-2">Annulla</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Includi Bootstrap JS (opzionale per questo form, ma buona pratica) --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
