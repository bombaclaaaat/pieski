<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UzytkownicyController,
    PsyController,
    WystawyController,
    KategorieController,
    OcenyController,
    BiletyController,
    ZamowienieController,
    SzczegolyZamowieniaController,
    PracownicyController,
    LogiController,
    MetodyPlatnosciController,
    SponsorzyController,
    HomeController,
    AuthController,
};

// Autoryzacja
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Strona główna (dashboard)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

// Strona główna
Route::get('/', [HomeController::class, 'index'])->name('home');

// Grupa tras wymagających autoryzacji
Route::middleware('auth')->group(function () {
    // Użytkownicy
    Route::resource('uzytkownicy', UzytkownicyController::class);

    // Psy
    Route::resource('psy', PsyController::class);

    // Wystawy
    Route::resource('wystawy', WystawyController::class);

    // Kategorie
    Route::resource('kategorie', KategorieController::class);

    // Oceny
    Route::resource('oceny', OcenyController::class);

    // Bilety
    Route::resource('bilety', BiletyController::class);

    // Zamówienia
    Route::resource('zamowienia', ZamowienieController::class);
    // Trasa do opłacania zamówienia
    Route::put('/zamowienia/{id}/oplac', [ZamowienieController::class, 'oplac'])->name('zamowienia.oplac');

    // Szczegóły Zamówienia
    Route::resource('szczegoly-zamowienia', SzczegolyZamowieniaController::class);

    // Pracownicy
    Route::resource('pracownicy', PracownicyController::class);

    // Logi
    Route::resource('logi', LogiController::class);

    // Metody płatności
    Route::resource('metody-platnosci', MetodyPlatnosciController::class);

    // Sponsorzy
    Route::resource('sponsorzy', SponsorzyController::class);
});

