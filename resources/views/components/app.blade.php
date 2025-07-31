@extends('components.app')

@section('title', 'Gestione Libri')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h1 class="card-title h3 mb-0">Elenco Libri</h1>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="mb-4">
                            <a href="{{ route('books.create') }}" class="btn btn-primary"><i
                                    class="bi bi-plus-circle me-2"></i>Crea Nuovo Libro</a>
                        </div>

                        @forelse ($libri as $libro)
                            <div class="card mb-3 shadow-sm">
                                <div class="card-body d-flex align-items-center">
                                    <img src="{{ $libro->image ? asset('storage/images/' . $libro->image) : asset('images/mia_immagine_default2.jpg') }}"
                                        alt="Copertina di {{ $libro->name }}" class="book-image">

                                    <div class="flex-grow-1">
                                        <h5 class="card-title mb-1">{{ $libro->name }}</h5>
                                        <p class="card-text mb-0 text-muted">
                                            Pagine: {{ $libro->pages ?? 'N/D' }} |
                                            Anno: {{ $libro->year ?? 'N/D' }}
                                        </p>
                                    </div>

                                    <div class="ms-auto d-flex gap-2">
                                        <a href="{{ route('books.edit', $libro->id) }}" class="btn btn-warning btn-sm"
                                            title="Modifica"><i class="bi bi-pencil"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#deleteBookModal" data-book-id="{{ $libro->id }}"
                                            data-book-name="{{ $libro->name }}" title="Elimina"><i
                                                class="bi bi-trash"></i></button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="alert alert-info" role="alert">
                                Nessun libro trovato nel database. Clicca su "Crea Nuovo Libro" per aggiungerne uno!
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal di Conferma Eliminazione --}}
    <div class="modal fade" id="deleteBookModal" tabindex="-1" aria-labelledby="deleteBookModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteBookModalLabel">Conferma Eliminazione</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Sei sicuro di voler eliminare il libro "<span id="modalBookName" class="fw-bold"></span>"? Questa azione
                    non può essere annullata.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <form id="deleteBookForm" method="POST" action="">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts_extra')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteBookModal = document.getElementById('deleteBookModal');
            deleteBookModal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const bookId = button.getAttribute('data-book-id');
                const bookName = button.getAttribute('data-book-name');

                const modalBookName = deleteBookModal.querySelector('#modalBookName');
                modalBookName.textContent = bookName;

                const deleteForm = deleteBookModal.querySelector('#deleteBookForm');
                deleteForm.action = `/books/${bookId}`;
            });
        });
    </script>
@endsection
