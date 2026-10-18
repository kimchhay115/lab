<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'BookTitle'    => 'sometimes|required|string|max:255',
            'BookTypeID'   => 'sometimes|required|integer|exists:tbl_book_types,BookTypeID',
            'PublishDate'  => 'sometimes|required|date',
            'NumOfPages'   => 'sometimes|required|integer|min:1',
            'NumOfCopies'  => 'sometimes|required|integer|min:0',
            'Edition'      => 'sometimes|required|string|max:100',
            'Publisher'    => 'sometimes|required|string|max:255',
            'BookSource'   => 'sometimes|required|string|max:255',
            'Remark'       => 'nullable|string',
            'author_ids'   => 'nullable|array',
            'author_ids.*' => 'integer|exists:tbl_authors,AuthorID',
        ];
    }
}
