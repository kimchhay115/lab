<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_books', function (Blueprint $table) {
            $table->id('BookID');
            $table->string('BookTitle');
            $table->foreignId('BookTypeID')
                  ->constrained('tbl_book_types', 'BookTypeID')
                  ->cascadeOnDelete();
            $table->date('PublishDate');
            $table->integer('NumOfPages');
            $table->integer('NumOfCopies');
            $table->string('Edition');
            $table->string('Publisher');
            $table->string('BookSource');
            $table->text('Remark')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_books');
    }
};
