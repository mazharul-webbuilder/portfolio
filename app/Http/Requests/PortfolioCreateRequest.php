<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PortfolioCreateRequest extends FormRequest
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
            'portfolio_category_id' => 'required|exists:portfolio_categories,id',
            'title' => 'required|string|min:8',
            'short_description' => 'required|string|min:15',
            'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg'],
        ];
    }
}
