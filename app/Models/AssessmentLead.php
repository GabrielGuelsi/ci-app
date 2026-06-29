<?php

namespace App\Models;

use App\Contracts\SyncableToFlowin;
use Database\Factories\AssessmentLeadFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class AssessmentLead extends Model implements SyncableToFlowin
{
    /** @use HasFactory<AssessmentLeadFactory> */
    use HasFactory;

    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'country_of_residence',
        'visa_type',
        'lead_source',
        'locale',
        'submitted_ip',
        'user_agent',
    ];

    /**
     * @return array<string, mixed>
     */
    public function toFlowinPayload(): array
    {
        return array_filter([
            'name' => $this->full_name,
            'phone' => $this->compactPhone(),
            'email' => $this->email,
            'visa_type' => $this->visa_type,
            'in_ireland' => $this->resolveInIreland(),
            'source' => 'site_assessment',
            'external_ref' => (string) $this->getKey(),
            'extra' => array_filter([
                'pais_residencia' => $this->country_of_residence,
                'lead_source' => $this->lead_source,
            ], fn ($value) => $value !== null && $value !== ''),
        ], fn ($value) => $value !== null && $value !== '' && $value !== []);
    }

    /**
     * Strip mask characters so the phone fits Flowin's column and stays
     * E.164-ish. Dedup compares digits only, so format is irrelevant there.
     */
    private function compactPhone(): string
    {
        $raw = trim((string) $this->phone);

        return (str_starts_with($raw, '+') ? '+' : '').preg_replace('/\D+/', '', $raw);
    }

    /**
     * A visa type is Ireland-specific, so its presence implies the lead is in
     * Ireland. Otherwise infer from the country of residence; omit if unknown.
     */
    private function resolveInIreland(): ?string
    {
        if (filled($this->visa_type)) {
            return 'Yes';
        }

        if (blank($this->country_of_residence)) {
            return null;
        }

        return Str::contains(Str::lower($this->country_of_residence), ['ireland', 'irlanda'])
            ? 'Yes'
            : 'No';
    }
}
