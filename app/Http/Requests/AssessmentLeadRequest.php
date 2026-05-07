<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AssessmentLeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, array<int, string|ValidationRule>>
     */
    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:180'],
            'phone' => ['required', 'string', 'max:40'],
            'country_of_residence' => ['nullable', 'required_without:visa_type', 'string', 'max:100'],
            'visa_type' => ['nullable', 'required_without:country_of_residence', 'string', 'max:60'],
            'lead_source' => ['nullable', 'string', 'in:study-in-ireland,already-in-ireland'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'required' => __('Please complete this field to continue.'),
            'email.email' => __('Please provide a valid email address.'),
        ];
    }
}
