<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class IndexProductRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string|max:100',
            'category_id' => 'integer|exists:categories,id',
            'category_name' => 'string|max:100',
            'prices' => 'regex:/^\d+(\.\d{1,2})?,\d+(\.\d{1,2})?$/',
            'is_published' => 'boolean',
        ];
    }
}
