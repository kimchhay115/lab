<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'BookTitle'    => 'required|string|max:255',
            'BookTypeID'   => 'required|integer|exists:tbl_book_types,BookTypeID',
            'PublishDate'  => 'required|date',
            'NumOfPages'   => 'required|integer|min:1',
            'NumOfCopies'  => 'required|integer|min:0',
            'Edition'      => 'required|string|max:100',
            'Publisher'    => 'required|string|max:255',
            'BookSource'   => 'required|string|max:255',
            'Remark'       => 'nullable|string',
            'author_ids'   => 'nullable|array',
            'author_ids.*' => 'integer|exists:tbl_authors,AuthorID',
        ];
    }
}
