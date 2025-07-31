<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom fixed-top shadow-sm" id="navbar">
    <div class="container">
        {{-- Logo/Brand della navbar: Puntiamo a books.home --}}
        <a class="navbar-brand text-primary" href="{{ route('books.home') }}">
            <i class="bi bi-book-half fs-1"></i> Libreria
        </a>
        {{-- Pulsante per il toggle della navbar su dispositivi mobili --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        {{-- Contenuto della navbar --}}
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                {{-- Link alla Home Libreria --}}
                <li class="nav-item">
                    <a class="nav-link @if (Request::routeIs('books.home')) active @endif fw-semibold"
                        aria-current="@if (Request::routeIs('books.home')) page @endif"
                        href="{{ route('books.home') }}">Home Libreria</a>
                </li>
                {{-- Link alla gestione libri (protetta da autenticazione) --}}
                <li class="nav-item">
                    <a class="nav-link @if (Request::routeIs('books.manage.index')) active @endif fw-semibold"
                        aria-current="@if (Request::routeIs('books.manage.index')) page @endif"
                        href="{{ route('books.manage.index') }}">Gestione Libri</a>
                </li>

                {{-- Sezione Autenticazione: Mostra link diversi a seconda dello stato dell'utente --}}
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-semibold" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Ciao, {{ Auth::user()->name }}!
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Profilo</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth

                @guest
                    <li class="nav-item">
                        <a class="nav-link @if (Request::routeIs('login')) active @endif fw-semibold"
                            aria-current="@if (Request::routeIs('login')) page @endif"
                            href="{{ route('login') }}">Accedi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link @if (Request::routeIs('register')) active @endif fw-semibold"
                            aria-current="@if (Request::routeIs('register')) page @endif"
                            href="{{ route('register') }}">Registrati</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
