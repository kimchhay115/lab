<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_book_authors', function (Blueprint $table) {
            $table->id('BookAuthorID');
            $table->foreignId('BookID')
                  ->constrained('tbl_books', 'BookID')
                  ->cascadeOnDelete();
            $table->foreignId('AuthorID')
                  ->constrained('tbl_authors', 'AuthorID')
                  ->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['BookID', 'AuthorID']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_book_authors');
    }
};
