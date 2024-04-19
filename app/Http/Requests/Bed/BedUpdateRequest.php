<?php

namespace App\Http\Requests\Bed;

use Illuminate\Foundation\Http\FormRequest;

class BedUpdateRequest extends FormRequest
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
            'have_boxes' => '',
            'beds_bases_id' => 'int|required',
            'beds_materials_id' => 'int|required',
            'bed_furniture_sizes_id' => 'int|required',
        ];
    }
}
