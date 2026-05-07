<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileAssessmentRequest extends FormRequest
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
        $careerTriggers = [
            'Career preparation',
            'CV and LinkedIn support',
            'Interview preparation',
            'Employer connection',
            'Full study and career plan',
        ];

        return [
            'location' => ['required', 'string', 'max:120'],
            'current_situation' => ['required', 'string', 'max:200'],
            'main_goal' => ['required', 'string', 'max:200'],
            'long_term_goal' => ['required', 'string', 'max:200'],
            'english_level' => ['required', 'string', 'max:80'],
            'visa_status' => ['required', 'string', 'max:80'],
            'education_level' => ['required', 'string', 'max:120'],
            'experience_years' => ['required', 'string', 'max:80'],
            'area_of_interest' => ['required', 'string', 'max:80'],
            'career_aligned' => ['required', Rule::in(['yes', 'no', 'help'])],
            'start_timing' => ['required', 'string', 'max:120'],
            'support_type' => ['required', 'array', 'min:1'],
            'support_type.*' => ['string', 'max:200'],
            'career_support' => [
                Rule::requiredIf(fn () => count(array_intersect($careerTriggers, (array) $this->input('support_type', []))) > 0),
                'array',
            ],
            'career_support.*' => ['string', 'max:200'],
            'budget' => ['required', 'string', 'max:80'],
            'contact_speed' => ['required', 'string', 'max:120'],
            'full_name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:180'],
            'phone' => ['required', 'string', 'max:40'],
            'preferred_language' => ['nullable', 'string', 'max:40'],
            'preferred_contact_time' => ['nullable', 'string', 'max:200'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'required' => __('This question is required to continue.'),
            'email.email' => __('Please provide a valid email address.'),
            'support_type.required' => __('Please select at least one type of support.'),
            'career_support.required' => __('Please select the kind of career support you need.'),
        ];
    }
}
