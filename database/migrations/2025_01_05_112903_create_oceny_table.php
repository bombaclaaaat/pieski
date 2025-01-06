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
        Schema::create('oceny', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_zgloszenie')->constrained('psy'); // Klucz obcy do tabeli psy
            $table->integer('ocena');
            $table->text('komentarze')->nullable();
            $table->date('data_oceny');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oceny');
    }
};
