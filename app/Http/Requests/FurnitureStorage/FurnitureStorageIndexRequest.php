<?php

namespace App\Http\Requests\FurnitureStorage;

use Illuminate\Foundation\Http\FormRequest;

class FurnitureStorageIndexRequest extends FormRequest
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
            'view' => 'string',
            'type' => 'string',
            'furniture_storages_furniture_dimensions_id' => 'int',
        ];
    }
}
