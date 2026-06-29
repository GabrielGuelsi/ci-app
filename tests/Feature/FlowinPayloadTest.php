<?php

namespace Tests\Feature;

use App\Models\AssessmentLead;
use App\Models\ProfileAssessment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FlowinPayloadTest extends TestCase
{
    use RefreshDatabase;

    public function test_assessment_lead_maps_to_flowin_payload(): void
    {
        $lead = AssessmentLead::factory()->create([
            'full_name' => 'Maria Silva',
            'email' => 'maria@example.com',
            'phone' => '+55 11 9 1234 5678',
            'country_of_residence' => 'Brazil',
            'visa_type' => null,
            'lead_source' => 'higher-education',
        ]);

        $payload = $lead->toFlowinPayload();

        $this->assertSame('Maria Silva', $payload['name']);
        $this->assertSame('+5511912345678', $payload['phone']);
        $this->assertSame('maria@example.com', $payload['email']);
        $this->assertSame('site_assessment', $payload['source']);
        $this->assertSame((string) $lead->id, $payload['external_ref']);
        $this->assertSame('No', $payload['in_ireland']);
        $this->assertSame('Brazil', $payload['extra']['pais_residencia']);
        $this->assertSame('higher-education', $payload['extra']['lead_source']);

        $this->assertArrayNotHasKey('english_level', $payload);
        $this->assertArrayNotHasKey('graduation', $payload);
        $this->assertArrayNotHasKey('course_interest', $payload);
    }

    public function test_assessment_lead_in_ireland_is_yes_when_visa_present(): void
    {
        $lead = AssessmentLead::factory()->fromAlreadyInIreland()->create([
            'visa_type' => 'Stamp 2',
        ]);

        $payload = $lead->toFlowinPayload();

        $this->assertSame('Yes', $payload['in_ireland']);
        $this->assertSame('Stamp 2', $payload['visa_type']);
        $this->assertArrayNotHasKey('pais_residencia', $payload['extra'] ?? []);
    }

    public function test_profile_assessment_maps_to_flowin_payload(): void
    {
        $assessment = ProfileAssessment::factory()->create([
            'location' => 'I am in Ireland',
            'preferred_language' => 'Portuguese',
            'english_level' => 'Intermediate',
            'education_level' => 'Undergraduate degree completed',
            'area_of_interest' => 'Business',
            'visa_status' => 'Stamp 2',
            'support_type' => ['Course guidance', 'Career preparation'],
        ]);

        $payload = $assessment->toFlowinPayload();

        $this->assertSame('site_wizard', $payload['source']);
        $this->assertSame((string) $assessment->id, $payload['external_ref']);
        $this->assertSame('Yes', $payload['in_ireland']);
        $this->assertSame('Portuguese', $payload['language']);
        $this->assertSame('Intermediate', $payload['english_level']);
        $this->assertSame('Undergraduate degree completed', $payload['graduation']);
        $this->assertSame('Business', $payload['course_interest']);
        $this->assertSame('Stamp 2', $payload['visa_type']);

        $this->assertSame('I am studying English in Ireland', $payload['extra']['situacao_atual']);
        $this->assertSame('Improve my English', $payload['extra']['objetivo']);
        $this->assertSame(['Course guidance', 'Career preparation'], $payload['extra']['tipo_suporte']);
        $this->assertSame('I am in Ireland', $payload['extra']['localizacao']);
    }

    public function test_masked_phone_is_compacted_to_fit_flowin(): void
    {
        $withPlus = AssessmentLead::factory()->create(['phone' => '+55 (11) 9 1234-5678']);
        $this->assertSame('+5511912345678', $withPlus->toFlowinPayload()['phone']);

        $withoutPlus = ProfileAssessment::factory()->create(['phone' => '353 (83) 123 4567']);
        $payload = $withoutPlus->toFlowinPayload();
        $this->assertSame('353831234567', $payload['phone']);
        $this->assertLessThanOrEqual(20, strlen($payload['phone']));
    }

    public function test_profile_assessment_in_ireland_is_no_when_outside(): void
    {
        $assessment = ProfileAssessment::factory()->create([
            'location' => 'I am outside Ireland',
        ]);

        $this->assertSame('No', $assessment->toFlowinPayload()['in_ireland']);
    }

    public function test_empty_optional_fields_are_omitted(): void
    {
        $assessment = ProfileAssessment::factory()->create([
            'location' => 'I am not sure yet',
            'preferred_language' => null,
        ]);

        $payload = $assessment->toFlowinPayload();

        $this->assertArrayNotHasKey('language', $payload);
        $this->assertArrayNotHasKey('in_ireland', $payload);
    }
}
