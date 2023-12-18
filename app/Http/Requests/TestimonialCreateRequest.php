<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestimonialCreateRequest extends FormRequest
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
            'name' => 'required|string|min:3',
            'designation' => 'required|string|min:6',
            'organization_name' => 'required|string|min:3',
            'department_name' => 'required|string|min:3',
            'bio' => 'required|string|min:8',
            'short_description' => 'required|string|min:12',
            'rating' => 'required|numeric|min:0|max:5',
            'image' => ['nullable', 'image', 'mimes:jpg,png,jpeg'],
        ];
    }
}
