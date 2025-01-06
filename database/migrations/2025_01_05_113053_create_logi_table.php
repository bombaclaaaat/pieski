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
        Schema::create('logi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('uzytkownik_id')->constrained('uzytkownicy'); // Klucz obcy do tabeli uzytkownicy
            $table->text('akcja');
            $table->date('data_akcji');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logi');
    }
};
