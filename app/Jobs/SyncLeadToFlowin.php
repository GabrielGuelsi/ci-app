<?php

namespace App\Jobs;

use App\Contracts\SyncableToFlowin;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SyncLeadToFlowin implements ShouldQueue
{
    use Queueable;

    public int $tries = 5;

    public function __construct(public SyncableToFlowin $lead) {}

    /**
     * Exponential backoff (seconds) between retries while Flowin is unreachable.
     *
     * @return array<int, int>
     */
    public function backoff(): array
    {
        return [10, 30, 60, 300, 900];
    }

    public function handle(): void
    {
        $url = config('services.flowin.url');
        $token = config('services.flowin.token');

        if (blank($url) || blank($token)) {
            Log::warning('Flowin webhook not configured; skipping lead sync.', [
                'lead' => $this->lead::class,
            ]);

            return;
        }

        $payload = $this->lead->toFlowinPayload();

        $response = Http::acceptJson()
            ->withToken($token)
            ->timeout(15)
            ->post($url, $payload)
            ->throw();

        Log::info('Lead synced to Flowin.', [
            'external_ref' => $payload['external_ref'] ?? null,
            'status' => $response->status(),
            'flowin_id' => $response->json('id'),
            'created' => $response->json('created'),
        ]);
    }
}
