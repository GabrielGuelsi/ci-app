<?php

namespace App\Models;

use Database\Factories\AssessmentLeadFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssessmentLead extends Model
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
}
