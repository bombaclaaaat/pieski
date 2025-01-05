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
        Schema::create('uzytkownicy', function (Blueprint $table) {
            $table->id();
            $table->string('imie');
            $table->string('nazwisko');
            $table->string('email')->unique();
            $table->string('haslo');
            $table->enum('rola', ['administrator', 'klient', 'pracownik']);
            $table->timestamps(); // Automatycznie doda kolumny data_utworzenia i data_aktualizacji
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('uzytkownicy');
    }
};
