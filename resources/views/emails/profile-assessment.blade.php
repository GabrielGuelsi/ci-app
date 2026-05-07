<x-mail::message>
# New profile assessment

A new profile assessment has been submitted from the **Start Your Plan** page on CI Ireland.

## Contact
- **Name:** {{ $assessment->full_name }}
- **Email:** {{ $assessment->email }}
- **Phone / WhatsApp:** {{ $assessment->phone }}
- **Preferred language:** {{ $assessment->preferred_language ?: '—' }}
- **Preferred contact time:** {{ $assessment->preferred_contact_time ?: '—' }}
- **Locale:** {{ strtoupper($assessment->locale) }}

## Profile
| Question | Answer |
| --- | --- |
| Where are you now? | {{ $assessment->location }} |
| Current situation | {{ $assessment->current_situation }} |
| Main goal | {{ $assessment->main_goal }} |
| Long-term goal | {{ $assessment->long_term_goal }} |
| English level | {{ $assessment->english_level }} |
| Visa status | {{ $assessment->visa_status }} |
| Highest education | {{ $assessment->education_level }} |
| Professional experience | {{ $assessment->experience_years }} |
| Area of interest | {{ $assessment->area_of_interest }} |
| Course aligned with career? | {{ $assessment->career_aligned }} |
| Start timing | {{ $assessment->start_timing }} |
| Budget | {{ $assessment->budget }} |
| Contact speed | {{ $assessment->contact_speed }} |

## Support requested
{{ implode(', ', (array) $assessment->support_type) }}

@if (! empty($assessment->career_support))
## Career support requested
{{ implode(', ', (array) $assessment->career_support) }}
@endif

---

Submitted at: {{ $assessment->created_at?->format('Y-m-d H:i T') }}

IP: {{ $assessment->submitted_ip ?: '—' }}

Reply directly to this email to respond to {{ $assessment->full_name }}.

Thanks,<br>
CI Ireland — automated notification
</x-mail::message>
