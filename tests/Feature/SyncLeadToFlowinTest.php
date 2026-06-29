<?php

namespace Tests\Feature;

use App\Jobs\SyncLeadToFlowin;
use App\Models\AssessmentLead;
use App\Models\ProfileAssessment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Client\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class SyncLeadToFlowinTest extends TestCase
{
    use RefreshDatabase;

    public function test_job_posts_lead_to_flowin_with_bearer_token(): void
    {
        config([
            'services.flowin.url' => 'https://flowin.test/api/webhook/marketing-lead',
            'services.flowin.token' => 'secret-token',
        ]);

        Http::fake([
            'flowin.test/*' => Http::response(['id' => 42, 'created' => true, 'consultant_id' => 9], 201),
        ]);

        $assessment = ProfileAssessment::factory()->create([
            'full_name' => 'Maria Silva',
        ]);

        SyncLeadToFlowin::dispatchSync($assessment);

        Http::assertSent(function (Request $request) use ($assessment): bool {
            return $request->url() === 'https://flowin.test/api/webhook/marketing-lead'
                && $request->hasHeader('Authorization', 'Bearer secret-token')
                && $request['name'] === 'Maria Silva'
                && $request['source'] === 'site_wizard'
                && $request['external_ref'] === (string) $assessment->id;
        });
    }

    public function test_job_is_a_no_op_when_not_configured(): void
    {
        config([
            'services.flowin.url' => 'https://flowin.test/api/webhook/marketing-lead',
            'services.flowin.token' => '',
        ]);

        Http::fake();

        SyncLeadToFlowin::dispatchSync(AssessmentLead::factory()->create());

        Http::assertNothingSent();
    }

    public function test_assessment_lead_submission_dispatches_the_job(): void
    {
        Mail::fake();
        Queue::fake();

        $response = $this->postJson(route('assessment-lead.store'), [
            'full_name' => 'Maria Silva',
            'email' => 'maria@example.com',
            'phone' => '+55 11 9 1234 5678',
            'country_of_residence' => 'Brazil',
            'lead_source' => 'higher-education',
        ]);

        $response->assertOk()->assertJson(['ok' => true]);

        Queue::assertPushed(SyncLeadToFlowin::class, 1);
    }

    public function test_profile_assessment_submission_dispatches_the_job(): void
    {
        Mail::fake();
        Queue::fake();

        $response = $this->postJson(route('start-your-plan.store'), [
            'location' => 'I am in Ireland',
            'current_situation' => 'I am studying English in Ireland',
            'main_goal' => 'Improve my English',
            'english_level' => 'Intermediate',
            'visa_status' => 'Stamp 2',
            'education_level' => 'Undergraduate degree completed',
            'area_of_interest' => 'Business',
            'career_aligned' => 'yes',
            'start_timing' => 'In the next 1 to 3 months',
            'support_type' => ['Course guidance'],
            'budget' => '€6,000 to €9,000',
            'contact_speed' => 'This week',
            'full_name' => 'Maria Silva',
            'email' => 'maria@example.com',
            'phone' => '+353 83 123 4567',
        ]);

        $response->assertOk()->assertJson(['ok' => true]);

        Queue::assertPushed(SyncLeadToFlowin::class, 1);
    }
}
