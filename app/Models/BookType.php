<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BookType extends Model
{
    protected $table = 'tbl_book_types';
    protected $primaryKey = 'BookTypeID';

    protected $fillable = [
        'BookTypeName',
        'Description',
    ];

    public function books(): HasMany
    {
        return $this->hasMany(Book::class, 'BookTypeID', 'BookTypeID');
    }
}
