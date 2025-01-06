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
        Schema::create('szczegoly_zamowienia', function (Blueprint $table) {
            $table->id();
            $table->foreignId('zamowienie_id')->constrained('zamowienia'); // Klucz obcy do tabeli zamowienia
            $table->foreignId('bilet_id')->constrained('bilety'); // Klucz obcy do tabeli bilety
            $table->integer('ilosc');
            $table->decimal('cena', 8, 2);
            $table->decimal('cena_calkowita', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('szczegoly_zamowienia');
    }
};
