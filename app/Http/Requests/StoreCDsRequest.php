<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCDsRequest extends FormRequest
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
            'title' => ['required', 'string', 'max:50', ],
            'artist' => ['required', 'string', 'max:20'],
            'genre' => ['required', 'string', 'max:20'],
            'release_year' => ['required', 'integer', 'min:1500', 'max:' . date('Y')] // 1500 since there are classical genre
        ];
    }
}
