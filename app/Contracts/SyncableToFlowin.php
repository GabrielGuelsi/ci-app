<?php

namespace App\Contracts;

interface SyncableToFlowin
{
    /**
     * Build the payload sent to the Flowin marketing-lead webhook.
     *
     * Only `name` and `phone` are required by Flowin; empty keys are omitted.
     *
     * @return array<string, mixed>
     */
    public function toFlowinPayload(): array;
}
