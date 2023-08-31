<?php

namespace App\Rules;

use Closure;
use App\Models\Color;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidColorIds implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $colorIds = Color::whereNull('deleted_at')->pluck('id')->toArray();
        $requestIds = json_decode($value);

        if(array_diff($requestIds, $colorIds)) {
            $fail('One or more selected color is invalid.');
        }
    }
}
