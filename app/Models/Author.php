<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Author extends Model
{
    protected $table = 'tbl_authors';
    protected $primaryKey = 'AuthorID';

    protected $fillable = [
        'AuthorName',
        'AuthorImage',
        'AuthorBio',
    ];

    public function books(): BelongsToMany
    {
        return $this->belongsToMany(
            Book::class,
            'tbl_book_authors',
            'AuthorID',
            'BookID',
            'AuthorID',
            'BookID'
        )->withTimestamps();
    }
}
