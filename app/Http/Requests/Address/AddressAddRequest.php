<?php

namespace App\Http\Requests\Address;

use Illuminate\Foundation\Http\FormRequest;

class AddressAddRequest extends FormRequest
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
            'City' => 'string|required',
            'Street' => 'string|required',
            'House' => 'string|required',
            'Entrance' => 'string|required',
            'Apartment' => 'string|required',
            'addresses_user_id' => 'int|required',
        ];
    }
}
