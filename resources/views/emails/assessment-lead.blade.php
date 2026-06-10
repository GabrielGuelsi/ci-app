<x-mail::message>
# New profile assessment lead

@php
    $sourceLabel = match ($lead->lead_source) {
        'higher-education' => 'Higher Education',
        'already-in-ireland' => 'Already in Ireland',
        'study-in-ireland' => 'Study in Ireland',
        default => 'CI Ireland',
    };
@endphp

A new lead has been submitted from the **{{ $sourceLabel }}** modal on CI Ireland.

## Contact
- **Name:** {{ $lead->full_name }}
- **Email:** {{ $lead->email }}
- **Phone / WhatsApp:** {{ $lead->phone }}
@if ($lead->country_of_residence)
- **Where they are based:** {{ $lead->country_of_residence }}
@endif
@if ($lead->visa_type)
- **Visa type:** {{ $lead->visa_type }}
@endif
- **Locale:** {{ strtoupper($lead->locale) }}

---

Submitted at: {{ $lead->created_at?->format('Y-m-d H:i T') }}

IP: {{ $lead->submitted_ip ?: '—' }}

Reply directly to this email to respond to {{ $lead->full_name }}.

Thanks,<br>
CI Ireland — automated notification
</x-mail::message>
