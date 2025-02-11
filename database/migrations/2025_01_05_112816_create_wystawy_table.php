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
        Schema::create('wystawy', function (Blueprint $table) {
            $table->id();
            $table->string('nazwa');
            $table->date('data_rozpoczecia');
            $table->date('data_zakonczenia');
            $table->string('miejsce');
            $table->text('opis');
            $table->timestamps(); // Data utworzenia
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wystawy');
    }
};
