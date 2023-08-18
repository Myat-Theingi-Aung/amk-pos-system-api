<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\Product;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SaleCreateRequest extends FormRequest
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
            'user_id' => ['required', Rule::exists(User::class, 'id')],
            'total' => 'required',
            'start_date' => ['required', 'date_format:Y-m-d' ],
            'sale_items' => 'required|array',
            'sale_items.*.product_id' => ['required', Rule::exists(Product::class, 'id')],
            'sale_items.*.quantity' => 'required',
            'sale_items.*.price' => 'required',
            'sale_items.*.payment_start_period' => 'required',
            'sale_items.*.payment_end_period' => 'required',
        ];
    }

    public function messages(){
        return [
            'user_id.required' => 'User name is required',
            'sale_items.array' => 'Sale items must be an array',
            'sale_items.*.product_id.required' => 'Product name is required',
            'sale_items.*.quantity.required' => 'Quantity field is required',
            'sale_items.*.price.required' => 'Price field is required',
            'sale_items.*.payment_start_period.required' => 'Payment start period is required',
            'sale_items.*.payment_end_period.required' => 'Payment end period is required',
        ];
    }
}
