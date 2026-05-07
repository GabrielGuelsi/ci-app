<?php

namespace Database\Factories;

use App\Models\AssessmentLead;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<AssessmentLead>
 */
class AssessmentLeadFactory extends Factory
{
    protected $model = AssessmentLead::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'phone' => '+55 11 9 1234 5678',
            'country_of_residence' => $this->faker->randomElement(['Brazil', 'Portugal', 'India', 'Spain', 'Mexico']),
            'visa_type' => null,
            'lead_source' => 'study-in-ireland',
            'locale' => 'en',
        ];
    }

    public function fromAlreadyInIreland(): self
    {
        return $this->state(fn (array $attributes): array => [
            'country_of_residence' => null,
            'visa_type' => $this->faker->randomElement(['Stamp 1G', 'Stamp 2', 'Stamp 4', 'Stamp 1', 'Other']),
            'lead_source' => 'already-in-ireland',
        ]);
    }
}
