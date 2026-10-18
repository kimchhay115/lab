<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'BookTypeName' => 'required|string|max:255|unique:tbl_book_types,BookTypeName',
            'Description'  => 'nullable|string',
        ];
    }
}
