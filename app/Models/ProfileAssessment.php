<?php

namespace App\Models;

use Database\Factories\ProfileAssessmentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileAssessment extends Model
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
}
