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
        Schema::create('psy', function (Blueprint $table) {
            $table->id();
            $table->string('imie');
            $table->string('rasa');
            $table->integer('wiek');
            $table->string('kolor');
            $table->enum('plec', ['samiec', 'samica']);
            $table->foreignId('wlaściciel_id')->constrained('uzytkownicy'); // Klucz obcy
            $table->text('opis')->nullable();
            $table->timestamps(); // Data utworzenia
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psy');
    }
};
