<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('zamowienia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('klient_id')->constrained('uzytkownicy'); // Klucz obcy do tabeli uzytkownicy
            $table->date('data_zamowienia');
            $table->decimal('cena_calkowita', 10, 2);
            $table->enum('status', ['oczekujące', 'zrealizowane']);
            $table->enum('status_platnosci', ['oczekująca', 'zapłacona']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('zamowienia');
    }
};
