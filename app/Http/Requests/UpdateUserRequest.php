<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Hash;

class UpdateUserRequest extends FormRequest
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
            // The Regex allows alphabetic characters, spaces, hyphens, and apostrophes.
            'first_name' => ['required', 'string', 'min:2', 'max:50', 'regex:/^[a-zA-Z\s\-\""]+$/'],
            'last_name' => ['required', 'string', 'min:2', 'max:50', 'regex:/^[a-zA-Z\s\-\""]+$/'],
            'birthdate' => ['date', 'required'], // can be nullable?
            'password' => ['required', 'string', 'min:8']
        ];
    }
}
