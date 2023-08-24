<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryTypeUpdateRequest extends FormRequest
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
        $categoryTypeId = $this->route('category_type')->id;
        return [
            'name' => ['required', 'string', 'max:255', Rule::unique('category_types', 'name')->ignore($categoryTypeId)]
        ];
    }
}
