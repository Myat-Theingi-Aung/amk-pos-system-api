<?php

namespace App\Http\Requests;

use App\Models\Color;
use App\Models\Category;
use App\Rules\ValidColorIds;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
        $productId = $this->route('product')->id;
        return [
            'name' => ['required', Rule::unique('products', 'name')->whereNull('deleted_at')->ignore($productId)],
            'category_id' => ['required', Rule::exists(Category::class, 'id')->whereNull('deleted_at')],
            'image' => 'nullable|mimes:jpeg,png,jpg,jfif',
            'price' => 'required|regex:/[0-9]/|min:3|max:10',
            'quantity' => 'required',
            'colors' => ['required', new ValidColorIds]
        ];
    }

    public function messages()
    {
        return [
            'category_id.required' => "Category name field is required"
        ];
    }
}
