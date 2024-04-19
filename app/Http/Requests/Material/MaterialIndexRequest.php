<?php

namespace App\Http\Requests\Material;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MaterialIndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'sort' => [
                Rule::in(['desc'])
            ],
            'param' => [
                Rule::in(['name', 'appointment'])
            ],
            'appointment' => [
                Rule::in(['material', 'stuffing'])
            ],
        ];
    }
}
