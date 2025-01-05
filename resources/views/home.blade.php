@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #5cc22d;
    }
    </style>
    <div class="container">
        <h1>Witaj w systemie Wystaw Psów!</h1>
        <p>Wybierz jedną z poniższych opcji, aby zarządzać różnymi funkcjami aplikacji.</p>

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
    </div>
@endsection
