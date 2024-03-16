<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCDsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:50', 'string'],
            'artist' => ['required', 'max:20', 'string'],
            'genre' => ['required', 'max:20', 'string'],
            // 1500 since there are classical genre
            'release_year' => ['required', 'integer', 'min:1500', 'max:' . date('Y')] // Today's Year
        ];
    }
}
