{{-- Profile Assessment Lead Modal --}}
@php
    $modalKicker = $modalKicker ?? __('Free Profile Assessment');
    $modalTitle = $modalTitle ?? __('Start Your Study Plan');
    $modalSubtitle = $modalSubtitle ?? __("Tell us a bit about you and we'll get in touch with personalized guidance.");
    $secondQuestion = $secondQuestion ?? 'country';
    $leadSource = $leadSource ?? 'study-in-ireland';
    $modalCtaLabel = $modalCtaLabel ?? __('Request Free Assessment');
@endphp
<div class="modal-overlay" id="profileAssessmentModal" data-submit-url="{{ $lr('assessment-lead.store') }}" aria-hidden="true">
    <div class="modal-box" role="dialog" aria-modal="true" aria-labelledby="profileAssessmentModalTitle">
        <button class="modal-close" type="button" data-close-assessment-modal aria-label="{{ __('Close') }}">
            <i class="fas fa-times"></i>
        </button>
        <div class="modal-header">
            <div class="modal-kicker">{{ $modalKicker }}</div>
            <h2 class="modal-title" id="profileAssessmentModalTitle">{{ $modalTitle }}</h2>
            <p class="modal-sub">{{ $modalSubtitle }}</p>
        </div>
        <form class="modal-form" id="profileAssessmentLeadForm" novalidate
              data-error-required="{{ __('Please complete all required fields.') }}"
              data-error-email="{{ __('Please provide a valid email address.') }}"
              data-error-generic="{{ __('Something went wrong. Please try again.') }}"
              data-sending-label="{{ __('Sending...') }}">
            @csrf
            <input type="hidden" name="lead_source" value="{{ $leadSource }}">
            <div class="form-row">
                <div class="form-group">
                    <label for="pa-name">{{ __('Full Name') }} <span class="req">*</span></label>
                    <input id="pa-name" name="full_name" type="text" placeholder="{{ __('Your full name') }}" required autocomplete="name">
                </div>
                <div class="form-group">
                    <label for="pa-email">{{ __('Email') }} <span class="req">*</span></label>
                    <input id="pa-email" name="email" type="email" placeholder="your@email.com" required autocomplete="email">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <label for="pa-phone">{{ __('Phone / WhatsApp') }} <span class="req">*</span></label>
                    <input id="pa-phone" name="phone" type="tel" placeholder="+55 11 9 1234 5678" required autocomplete="tel">
                </div>
                @if ($secondQuestion === 'visa')
                    <div class="form-group">
                        <label for="pa-visa">{{ __('What is your visa type?') }} <span class="req">*</span></label>
                        <select id="pa-visa" name="visa_type" required>
                            <option value="">{{ __('Select your current visa') }}</option>
                            <option value="Stamp 2">{{ __('Stamp 2 — Student') }}</option>
                            <option value="Stamp 1G">{{ __('Stamp 1G — Graduate') }}</option>
                            <option value="Stamp 1">{{ __('Stamp 1 — Work permit') }}</option>
                            <option value="Stamp 4">{{ __('Stamp 4 — Long-term') }}</option>
                            <option value="EU/EEA">{{ __('EU/EEA citizen') }}</option>
                            <option value="Other">{{ __("Other / I'm not sure") }}</option>
                        </select>
                    </div>
                @else
                    <div class="form-group">
                        <label for="pa-country">{{ __('Where are you based now?') }} <span class="req">*</span></label>
                        <input id="pa-country" name="country_of_residence" type="text" placeholder="{{ __('e.g. Brazil, Portugal, India') }}" required autocomplete="country-name">
                    </div>
                @endif
            </div>
            <button type="submit" class="modal-submit">
                {{ $modalCtaLabel }} <i class="fas fa-arrow-right"></i>
            </button>
            <div class="modal-form-status" id="pa-form-status" aria-live="polite"></div>
        </form>
    </div>
</div>
