<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    protected $table = 'tbl_book_authors';
    protected $primaryKey = 'BookAuthorID';

    protected $fillable = [
        'BookID',
        'AuthorID',
    ];
}
    