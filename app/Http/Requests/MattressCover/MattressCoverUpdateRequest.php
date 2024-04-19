<?php

namespace App\Http\Requests\MattressCover;

use Illuminate\Foundation\Http\FormRequest;

class MattressCoverUpdateRequest extends FormRequest
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
            'function' => 'string|required',
            'mattress_fastenings_id' => 'int|required',
            'mattress_covers_furniture_sizes_id' => 'int|required'
        ];
    }
}
