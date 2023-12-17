<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PricingUpdateRequest extends FormRequest
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
            'id' => 'required|exists:pricing_categories,id',
            'title' => 'required|string|min:8',
            'short_description' => 'required|string|min:8',
            'long_description' => 'required|string|min:20',
            'total_price' => 'required|numeric',
        ];
    }
}
