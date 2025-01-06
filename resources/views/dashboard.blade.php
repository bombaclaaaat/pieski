@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #5cc22d;
    }
</style>
<div class="container">
    <h1>Witaj, {{ auth()->user()->nazwa_uzytkownika }}!</h1>
    <p>Jesteś zalogowany</p>

    <div class="d-flex">
        <!-- Przycisk do menu (strona główna) -->
        <form action="{{ route('home') }}" method="GET" class="me-2">
            <button type="submit" class="btn btn-danger">Do menu</button>
        </form>

        <!-- Odstęp 1 cm między przyciskami -->
        <div style="width: 1cm;"></div>

        <!-- Przycisk do wylogowania -->
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Wyloguj</button>
        </form>
    </div>
</div>
@endsection
