<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Models\CategoryType;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PaymentCreateRequest extends FormRequest
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
            'user_id' => ['required', Rule::exists(User::class, 'id')->whereNull('deleted_at')],
            'category_type_id' => ['required', Rule::exists(CategoryType::class,'id')->whereNull('deleted_at')],
            'amount' => ['required'],
            'date' => ['required', 'date_format:Y-m-d']
        ];
    }
}
