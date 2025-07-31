@extends('components.app')

@section('title', 'Modifica Libro: ' . $book->name)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h1 class="card-title h3 mb-0">Modifica Libro: {{ $book->name }}</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Nome Libro</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name', $book->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="pages" class="form-label">Numero Pagine</label>
                                <input type="number" class="form-control @error('pages') is-invalid @enderror"
                                    id="pages" name="pages" value="{{ old('pages', $book->pages) }}">
                                @error('pages')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="year" class="form-label">Anno Pubblicazione</label>
                                <input type="number" class="form-control @error('year') is-invalid @enderror"
                                    id="year" name="year" value="{{ old('year', $book->year) }}">
                                @error('year')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Immagine Libro</label>
                                @if ($book->image)
                                    <div class="mb-2">
                                        <p class="mb-1 text-muted">Immagine attuale:</p>
                                        <img src="{{ asset('storage/images/' . $book->image) }}" alt="Copertina attuale"
                                            style="max-width: 150px; height: auto; border-radius: 0.5rem; box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,.075);">
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="checkbox" id="clear_image"
                                                name="clear_image" value="1">
                                            <label class="form-check-label" for="clear_image">
                                                Rimuovi immagine esistente
                                            </label>
                                        </div>
                                    </div>
                                @endif
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Salva Modifiche</button>
                            <a href="{{ route('books.manage.index') }}" class="btn btn-secondary ms-2">Annulla</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
