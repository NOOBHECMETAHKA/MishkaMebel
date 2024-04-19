<?php

namespace App\Http\Requests\Discounts;

use Illuminate\Foundation\Http\FormRequest;

class DiscountsUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'percent' => 'required|int',
            'expiration_discount' => 'required',
            'discounts_product_id' => 'required|int',
        ];
    }
}
