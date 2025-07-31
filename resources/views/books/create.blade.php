<x-app title="Crea Nuovo Libro">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h1 class="card-title h3 mb-0">Crea Nuovo Libro</h1>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

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

                            <div class="mb-3">
                                <label for="image" class="form-label">Immagine Libro</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror"
                                    id="image" name="image">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Salva Libro</button>
                            <a href="{{ route('books.manage.index') }}" class="btn btn-secondary ms-2">Annulla</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app>
