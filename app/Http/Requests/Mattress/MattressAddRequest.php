<?php

namespace App\Http\Requests\Mattress;

use Illuminate\Foundation\Http\FormRequest;

class MattressAddRequest extends FormRequest
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
            'type' => 'string|required',
            'age_category' => 'string|required',
            'hardness' => 'string|required',
            'mattresses_materials_id' => 'int|required',
            'mattresses_furniture_sizes_id' => 'int|required'
        ];
    }
}
