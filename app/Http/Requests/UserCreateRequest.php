<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => ['required', 'regex:/^(09-|01-|\+?959-)\d{9}$/', Rule::unique('users', 'phone')->whereNull('deleted_at')],
            'address' => 'required|string|max:255',
            'email' => ['nullable', 'email', 'max:255', Rule::unique('users', 'email')->whereNull('deleted_at')],
            'NRC' => 'nullable',
            'insurance_name' => 'nullable',
            'role' => 'nullable|in:admin,user',
            'color' => 'required',
            'food' => 'required',
            'password' => ['required','string',Password::min(5)->mixedCase()->numbers()->symbols()->uncompromised(),'confirmed' ]
        ];
    }
}
