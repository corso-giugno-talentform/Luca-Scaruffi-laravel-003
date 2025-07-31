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
        Schema::table('books', function (Blueprint $table) {
            // Aggiunge una nuova colonna 'image' di tipo stringa, che può essere nulla, dopo la colonna 'year'.
            // Questa colonna memorizzerà il percorso del file dell'immagine.
            $table->string('image')->after('year')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            // Nel caso di rollback, rimuove la colonna 'image'.
            $table->dropColumn('image');
        });
    }
};
