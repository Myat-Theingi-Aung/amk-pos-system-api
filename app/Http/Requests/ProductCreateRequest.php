<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'category_id' => ['required', Rule::exists(Category::class, 'id')],
            'image' => 'nullable|mimes:jpeg,png,jpg,jfif',
            'price' => 'required|regex:/[0-9]/|min:3|max:10',
            'quantity' => 'required',
        ];
    }

    public function messages() 
    {
        return [
            'category_id.required' => 'Category name field is required'
        ];
    }
}
