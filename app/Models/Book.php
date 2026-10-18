<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Book extends Model
{
    protected $table = 'tbl_books';
    protected $primaryKey = 'BookID';

    protected $fillable = [
        'BookTitle',
        'BookTypeID',
        'PublishDate',
        'NumOfPages',
        'NumOfCopies',
        'Edition',
        'Publisher',
        'BookSource',
        'Remark',
    ];

    protected function casts(): array
    {
        return [
            'PublishDate' => 'date',
        ];
    }

    public function bookType(): BelongsTo
    {
        return $this->belongsTo(BookType::class, 'BookTypeID', 'BookTypeID');
    }

    public function authors(): BelongsToMany
    {
        return $this->belongsToMany(
            Author::class,
            'tbl_book_authors',
            'BookID',
            'AuthorID',
            'BookID',
            'AuthorID'
        )->withTimestamps();
    }
}
