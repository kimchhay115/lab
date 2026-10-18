<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAuthorRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'AuthorName'  => 'sometimes|required|string|max:255',
            'AuthorImage' => 'nullable|string|max:500',
            'AuthorBio'   => 'nullable|string',
        ];
    }
}
