<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MetaSettingUpdateRequest extends FormRequest
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
            'company_name' => 'required|string|min:5',
            'designation' => 'required|string|min:5',
            'email' => 'required|email',
            'phone' => 'required|regex:/^\+\d{1,15}$/',
            'short_description' => 'required|string|min:30',
            'company_logo' => ['nullable',
                                'image',
                                'mimes:jpg,png,jpeg',
                                'dimensions:min_width=460,min_height=288'],
            'site_banner' => ['nullable',
                                'image',
                                'mimes:jpg,png,jpeg',]
        ];
    }
}
