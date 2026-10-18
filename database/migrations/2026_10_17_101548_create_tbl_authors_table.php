<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tbl_authors', function (Blueprint $table) {
            $table->id('AuthorID');
            $table->string('AuthorName');
            $table->string('AuthorImage')->nullable();
            $table->text('AuthorBio')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_authors');
    }
};
