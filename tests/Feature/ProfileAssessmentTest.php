<?php

namespace Tests\Feature;

use App\Mail\ProfileAssessmentSubmitted;
use App\Models\ProfileAssessment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ProfileAssessmentTest extends TestCase
{
    use RefreshDatabase;

    /** @return array<string, mixed> */
    private function payload(array $overrides = []): array
    {
        return array_merge([
            'location' => 'I am in Ireland',
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
            'support_type' => ['Course guidance'],
            'budget' => '€6,000 to €9,000',
            'contact_speed' => 'This week',
            'full_name' => 'Maria Silva',
            'email' => 'maria@example.com',
            'phone' => '+353 83 123 4567',
            'preferred_language' => 'English',
            'preferred_contact_time' => 'Weekday mornings',
        ], $overrides);
    }

    public function test_it_stores_a_valid_submission_and_sends_email(): void
    {
        Mail::fake();

        $response = $this->postJson(route('start-your-plan.store'), $this->payload());

        $response->assertOk()->assertJson(['ok' => true]);

        $this->assertDatabaseCount('profile_assessments', 1);
        $assessment = ProfileAssessment::query()->first();
        $this->assertSame('maria@example.com', $assessment->email);
        $this->assertSame(['Course guidance'], $assessment->support_type);
        $this->assertSame('en', $assessment->locale);

        Mail::assertSent(ProfileAssessmentSubmitted::class, function ($mail) {
            return $mail->hasTo(config('mail.to.address'))
                && $mail->assessment->email === 'maria@example.com';
        });
    }

    public function test_it_rejects_missing_required_fields(): void
    {
        Mail::fake();

        $response = $this->postJson(route('start-your-plan.store'), [
            'full_name' => 'Maria Silva',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors([
                'location', 'current_situation', 'main_goal', 'english_level',
                'visa_status', 'education_level', 'support_type', 'email', 'phone',
            ]);

        $this->assertDatabaseCount('profile_assessments', 0);
        Mail::assertNothingSent();
    }

    public function test_career_support_is_required_when_career_trigger_is_chosen(): void
    {
        Mail::fake();

        $response = $this->postJson(
            route('start-your-plan.store'),
            $this->payload(['support_type' => ['Career preparation']])
        );

        $response->assertStatus(422)->assertJsonValidationErrors(['career_support']);
    }

    public function test_pt_locale_is_recorded_when_submitting_via_pt_route(): void
    {
        Mail::fake();

        $response = $this->postJson(route('pt.start-your-plan.store'), $this->payload());

        $response->assertOk();
        $this->assertSame('pt', ProfileAssessment::query()->first()->locale);
    }
}
