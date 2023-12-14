<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralSettingUpdateRequest extends FormRequest
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
            'name_to_show' => 'required|string|min:4',
            'slogan_1' => 'required|string|min:4',
            'slogan_2' => 'required|string|min:4',
            'slogan_3' => 'required|string|min:4',
            'short_description' => 'required|string|min:15',
            'image' => ['nullable',
                'image',
                'mimes:jpg,png,jpeg',]
        ];
    }
}
