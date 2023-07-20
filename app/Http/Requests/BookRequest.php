<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */

    public function rules(): array
    {
        return [
            'title' => ['string', 'required'],
            'authors' => ['string', 'nullable'],
            'book_cover' => ['string', 'nullable'],
            'book_id' => ['string', 'unique:books,book_id', 'required']
        ];
    }
}
