@extends('layouts.app')

@section('content')
<style>
    /* Domyślny styl strony */
    body.default-mode {
        background-color: #51c21c;
        color: #000;
        font-size: 16px;
    }

    a {
        color: #007bff;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    .btn {
        margin-top: 10px;
    }
    body.high-contrast-mode {
        background-color: #050505;
        color: #2bff00;
        font-size: 18px;
        font-weight: bold; /* Dodanie pogrubienia dla całego tekstu w trybie wysokiego kontrastu */
    }

    body.high-contrast-mode a {
        color: #2bff00;
        text-decoration: underline;
        font-weight: bold; /* Pogrubienie dla linków */
    }

    body.high-contrast-mode .btn {
        background-color: #ffcc00;
        color: #000;
        font-weight: bold; /* Pogrubienie dla przycisków */
    }

    /* Styl dla górnego paska */
    .top-bar {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        padding: 10px 20px;
        background-color: #ffffff;
        border-bottom: 1px solid #636161;
    }

    .top-bar .welcome {
        font-size: 18px;
        font-weight: bold;
    }
</style>

<!-- Pasek na górze z powitaniem -->
<div class="top-bar">
    <div>
        <span class="welcome">{{ Auth::user()->name ?? 'Gość' }}!</span>
        @if(Auth::check())
            <button class="btn btn-danger btn-sm ml-3" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Wyloguj
            </button>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @else
            <a href="{{ route('login') }}">Zaloguj</a> | <a href="{{ route('register') }}">Zarejestruj</a>
        @endif

        <!-- Przycisk do zmiany stylu -->
        <button class="btn btn-warning btn-sm ml-3" id="style-toggle" aria-label="Zmień styl" title="Kliknij, aby zmienić styl">
            Wersja dla niepełnosprawnych
        </button>
    </div>
</div>

<!-- Główna zawartość -->
<div class="container main-content">
    <h1>Witaj w systemie Wystaw Psów!</h1>
    <p>Wybierz jedną z poniższych opcji, aby zarządzać różnymi funkcjami aplikacji.</p>

    @if(Auth::check()) <!-- Tylko wyświetlanie tabel, jeśli użytkownik jest zalogowany -->
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h3>Użytkownicy</h3>
                    </div>
                    <div class="card-body">
                        <p>Przeglądaj i zarządzaj użytkownikami w systemie.</p>
                        <div class="border p-2">
                            <a href="{{ route('uzytkownicy.index') }}" class="btn btn-primary w-100">Zarządzaj użytkownikami</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-warning text-white">
                        <h3>Psy</h3>
                    </div>
                    <div class="card-body">
                        <p>Dodaj nowe psy, przeglądaj istniejące lub edytuj dane psów.</p>
                        <div class="border p-2">
                            <a href="{{ route('psy.index') }}" class="btn btn-primary w-100">Zarządzaj psami</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <h3>Wystawy</h3>
                    </div>
                    <div class="card-body">
                        <p>Twórz, przeglądaj i zarządzaj wystawami psów.</p>
                        <div class="border p-2">
                            <a href="{{ route('wystawy.index') }}" class="btn btn-primary w-100">Zarządzaj wystawami</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <h3>Oceny</h3>
                    </div>
                    <div class="card-body">
                        <p>Przeglądaj oceny psów z wystaw i dodawaj komentarze.</p>
                        <div class="border p-2">
                            <a href="{{ route('oceny.index') }}" class="btn btn-primary w-100">Zarządzaj ocenami</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h3>Bilety</h3>
                    </div>
                    <div class="card-body">
                        <p>Sprzedawaj bilety na wystawy oraz przeglądaj zamówienia.</p>
                        <div class="border p-2">
                            <a href="{{ route('bilety.index') }}" class="btn btn-primary w-100">Zarządzaj biletami</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
    <p><strong>Proszę się zalogować, aby zobaczyć dostępne opcje zarządzania systemem!!.</strong></p>
    @endif
</div>

<script>
    // Inicjalizacja: ustaw domyślny tryb, jeśli nie zapisano go wcześniej
    if (!localStorage.getItem('mode')) {
        localStorage.setItem('mode', 'default');
    }

    // Aplikowanie zapisanej klasy do body
    let currentMode = localStorage.getItem('mode');
    document.body.classList.add(currentMode + '-mode');

    // Ustawianie tekstu przycisku
    const toggleButton = document.getElementById('style-toggle');
    toggleButton.textContent = currentMode === 'high-contrast' ? 'Wersja normalna' : 'Wersja dla niepełnosprawnych';

    // Obsługa zmiany trybu
    toggleButton.addEventListener('click', () => {
        // Usuń obecny tryb
        document.body.classList.remove(currentMode + '-mode');

        // Przełącz tryb
        currentMode = currentMode === 'default' ? 'high-contrast' : 'default';
        document.body.classList.add(currentMode + '-mode');
        localStorage.setItem('mode', currentMode);

        // Aktualizacja tekstu przycisku
        toggleButton.textContent = currentMode === 'high-contrast' ? 'Wersja normalna' : 'Wersja dla niepełnosprawnych';
    });
</script>
@endsection
