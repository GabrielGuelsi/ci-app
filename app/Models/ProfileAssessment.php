<?php

namespace App\Models;

use App\Contracts\SyncableToFlowin;
use Database\Factories\ProfileAssessmentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileAssessment extends Model implements SyncableToFlowin
{
    /** @use HasFactory<ProfileAssessmentFactory> */
    use HasFactory;

    protected $fillable = [
        'location',
        'current_situation',
        'main_goal',
        'long_term_goal',
        'english_level',
        'visa_status',
        'education_level',
        'experience_years',
        'area_of_interest',
        'career_aligned',
        'start_timing',
        'support_type',
        'career_support',
        'budget',
        'contact_speed',
        'full_name',
        'email',
        'phone',
        'preferred_language',
        'preferred_contact_time',
        'locale',
        'submitted_ip',
        'user_agent',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'support_type' => 'array',
            'career_support' => 'array',
        ];
    }

    /**
     * @return array<string, mixed>
     */
    public function toFlowinPayload(): array
    {
        return array_filter([
            'name' => $this->full_name,
            'phone' => $this->compactPhone(),
            'email' => $this->email,
            'language' => $this->preferred_language,
            'in_ireland' => $this->resolveInIreland(),
            'english_level' => $this->english_level,
            'graduation' => $this->education_level,
            'course_interest' => $this->area_of_interest,
            'visa_type' => $this->visa_status,
            'source' => 'site_wizard',
            'external_ref' => (string) $this->getKey(),
            'extra' => array_filter([
                'situacao_atual' => $this->current_situation,
                'objetivo' => $this->main_goal,
                'objetivo_longo_prazo' => $this->long_term_goal,
                'experiencia' => $this->experience_years,
                'alinhar_carreira' => $this->career_aligned,
                'inicio' => $this->start_timing,
                'tipo_suporte' => $this->support_type,
                'suporte_carreira' => $this->career_support,
                'orcamento' => $this->budget,
                'velocidade_contato' => $this->contact_speed,
                'horario_preferido' => $this->preferred_contact_time,
                'localizacao' => $this->location,
            ], fn ($value) => $value !== null && $value !== '' && $value !== []),
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
     * Map the wizard "Where are you now?" answer to Flowin's in_ireland flag.
     * Anything other than a clear in/out answer is omitted.
     */
    private function resolveInIreland(): ?string
    {
        return match ($this->location) {
            'I am in Ireland' => 'Yes',
            'I am outside Ireland', 'I am planning to move to Ireland' => 'No',
            default => null,
        };
    }
}
