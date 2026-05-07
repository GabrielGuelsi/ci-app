<?php

namespace Database\Factories;

use App\Models\ProfileAssessment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ProfileAssessment>
 */
class ProfileAssessmentFactory extends Factory
{
    protected $model = ProfileAssessment::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'location' => $this->faker->randomElement(['I am in Ireland', 'I am outside Ireland']),
            'current_situation' => 'I am studying English in Ireland',
            'main_goal' => 'Improve my English',
            'long_term_goal' => 'Build a career in Ireland',
            'english_level' => 'Intermediate',
            'visa_status' => 'Stamp 2',
            'education_level' => 'Undergraduate degree completed',
            'experience_years' => '1 to 3 years',
            'area_of_interest' => 'Business',
            'career_aligned' => 'yes',
            'start_timing' => 'In the next 1 to 3 months',
            'support_type' => ['Course guidance', 'Career preparation'],
            'career_support' => ['CV preparation', 'Interview preparation'],
            'budget' => '€6,000 to €9,000',
            'contact_speed' => 'This week',
            'full_name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'phone' => '+353 83 123 4567',
            'preferred_language' => 'English',
            'preferred_contact_time' => 'Weekday mornings',
            'locale' => 'en',
        ];
    }
}
