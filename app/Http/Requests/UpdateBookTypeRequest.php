<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateBookTypeRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'BookTypeName' => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('tbl_book_types', 'BookTypeName')->ignore($this->route('book_type'), 'BookTypeID'),
            ],
            'Description' => 'nullable|string',
        ];
    }
}
