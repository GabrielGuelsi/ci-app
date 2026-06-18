{{-- Reusable Profile Assessment Wizard Modal --}}
{{-- Opened by any element with [data-open-assessment-modal]. Included once globally. --}}
<div class="aw-overlay" id="assessmentWizardModal" aria-hidden="true"
     data-submit-url="{{ $lr('start-your-plan.store') }}"
     data-generic-error="{{ __('Something went wrong. Please try again or contact us directly.') }}"
     data-error-choose="{{ __('Please choose an option to continue.') }}"
     data-error-required="{{ __('Please fill all required fields.') }}"
     data-error-email="{{ __('Please provide a valid email address.') }}"
     data-sending-label="{{ __('Sending...') }}">
    <div class="aw-box" role="dialog" aria-modal="true" aria-labelledby="awModalTitle">
        <button class="aw-close" type="button" data-close-assessment-modal aria-label="{{ __('Close') }}">
            <i class="fas fa-times"></i>
        </button>
        <div class="aw-header">
            <div class="aw-kicker">{{ __('Free Profile Assessment') }}</div>
            <h2 class="aw-title" id="awModalTitle">{{ __('Start your profile assessment') }}</h2>
            <p class="aw-sub">{{ __('It takes around 3 minutes. Your answers help our Dublin team prepare for your conversation.') }}</p>
        </div>

        <form id="assessmentWizardForm" class="syp-form aw-form" novalidate>
            @csrf

            <div class="syp-progress-bar" aria-hidden="true">
                <div class="syp-progress-fill" id="sypProgressFill"></div>
            </div>
            <div class="syp-progress-label">
                <span><span id="sypStepCurrent">1</span> / <span id="sypStepTotal">12</span></span>
            </div>

            {{-- Q1 --}}
            <fieldset class="syp-step" data-step="1">
                <legend class="syp-step-legend">{{ __('Where are you now?') }}</legend>
                @foreach (['I am in Ireland', 'I am outside Ireland', 'I am planning to move to Ireland', 'I am not sure yet'] as $opt)
                    <label class="syp-radio">
                        <input type="radio" name="location" value="{{ $opt }}" required>
                        <span>{{ __($opt) }}</span>
                    </label>
                @endforeach
            </fieldset>

            {{-- Q2 --}}
            <fieldset class="syp-step" data-step="2" hidden>
                <legend class="syp-step-legend">{{ __('What best describes your current situation?') }}</legend>
                @foreach ([
                    'I am studying English in Ireland', 'I am finishing my English course soon',
                    'I want to start studying in Ireland', 'I want to move into Higher Education',
                    'I am currently in college or university', 'I have recently graduated',
                    'I am a professional looking for career opportunities', 'I am an employer looking for international talent',
                ] as $opt)
                    <label class="syp-radio">
                        <input type="radio" name="current_situation" value="{{ $opt }}" required>
                        <span>{{ __($opt) }}</span>
                    </label>
                @endforeach
            </fieldset>

            {{-- Q3 --}}
            <fieldset class="syp-step" data-step="3" hidden>
                <legend class="syp-step-legend">{{ __('What is your main goal?') }}</legend>
                @foreach ([
                    'Improve my English', 'Study at college or university in Ireland',
                    'Move from English school to Higher Education', 'Apply for an Undergraduate Degree',
                    'Apply for a Postgraduate Programme', 'Apply for a Masters',
                    'Prepare for the Irish job market', 'Connect with employers',
                    'Understand my options', 'Not sure yet',
                ] as $opt)
                    <label class="syp-radio">
                        <input type="radio" name="main_goal" value="{{ $opt }}" required>
                        <span>{{ __($opt) }}</span>
                    </label>
                @endforeach
            </fieldset>

            {{-- Q4 (English level) --}}
            <fieldset class="syp-step" data-step="4" hidden>
                <legend class="syp-step-legend">{{ __('What is your current English level?') }}</legend>
                @foreach ([
                    'Beginner', 'Elementary', 'Pre-Intermediate', 'Intermediate',
                    'Upper-Intermediate', 'Advanced', 'I have an English certificate', 'I am not sure',
                ] as $opt)
                    <label class="syp-radio">
                        <input type="radio" name="english_level" value="{{ $opt }}" required>
                        <span>{{ __($opt) }}</span>
                    </label>
                @endforeach
            </fieldset>

            {{-- Q5 (Visa) --}}
            <fieldset class="syp-step" data-step="5" hidden>
                <legend class="syp-step-legend">{{ __('What is your current visa situation?') }}</legend>
                @foreach ([
                    'Stamp 2', 'Stamp 1G', 'Stamp 1', 'Tourist/visitor permission',
                    'I am outside Ireland', 'I do not have a visa yet', 'I am not sure', 'Prefer not to say',
                ] as $opt)
                    <label class="syp-radio">
                        <input type="radio" name="visa_status" value="{{ $opt }}" required>
                        <span>{{ __($opt) }}</span>
                    </label>
                @endforeach
            </fieldset>

            {{-- Q6 (Education) --}}
            <fieldset class="syp-step" data-step="6" hidden>
                <legend class="syp-step-legend">{{ __('What is your highest level of education?') }}</legend>
                @foreach ([
                    'High school completed', 'Undergraduate degree completed',
                    'Postgraduate completed', 'Masters completed',
                    'Currently studying in college/university', 'Professional qualification', 'Other',
                ] as $opt)
                    <label class="syp-radio">
                        <input type="radio" name="education_level" value="{{ $opt }}" required>
                        <span>{{ __($opt) }}</span>
                    </label>
                @endforeach
            </fieldset>

            {{-- Q7 (Area of interest + career alignment) --}}
            <fieldset class="syp-step" data-step="7" hidden>
                <legend class="syp-step-legend">{{ __('Which area are you interested in?') }}</legend>
                <div class="syp-grid-options">
                    @foreach ([
                        'Business', 'Management', 'Marketing', 'Digital Marketing',
                        'IT / Computing', 'Data Analytics', 'Finance', 'Accounting',
                        'Hospitality', 'Healthcare Management', 'Human Resources',
                        'Project Management', 'Supply Chain', 'Cybersecurity',
                        'I am open to suggestions', 'Other',
                    ] as $opt)
                        <label class="syp-radio">
                            <input type="radio" name="area_of_interest" value="{{ $opt }}" required>
                            <span>{{ __($opt) }}</span>
                        </label>
                    @endforeach
                </div>
                <legend class="syp-step-sublegend">{{ __('Do you want your course choice to be connected to your career goals?') }}</legend>
                @foreach ([
                    'Yes' => 'yes', 'No' => 'no', 'I need help understanding this' => 'help',
                ] as $label => $val)
                    <label class="syp-radio">
                        <input type="radio" name="career_aligned" value="{{ $val }}" required>
                        <span>{{ __($label) }}</span>
                    </label>
                @endforeach
            </fieldset>

            {{-- Q8 (Start timing) --}}
            <fieldset class="syp-step" data-step="8" hidden>
                <legend class="syp-step-legend">{{ __('When would you like to start your next step?') }}</legend>
                @foreach ([
                    'As soon as possible', 'In the next 1 to 3 months',
                    'In the next 3 to 6 months', 'In the next 6 to 12 months',
                    'Next year', 'I am only exploring options',
                ] as $opt)
                    <label class="syp-radio">
                        <input type="radio" name="start_timing" value="{{ $opt }}" required>
                        <span>{{ __($opt) }}</span>
                    </label>
                @endforeach
            </fieldset>

            {{-- Q9 (Support type + career support) --}}
            <fieldset class="syp-step" data-step="9" hidden>
                <legend class="syp-step-legend">{{ __('What kind of support are you looking for?') }} <small>{{ __('(select all that apply)') }}</small></legend>
                <div class="syp-grid-options">
                    @foreach ([
                        'Course guidance', 'English preparation', 'Higher Education application',
                        'Visa and timing guidance related to study planning', 'Document guidance',
                        'Career preparation', 'CV and LinkedIn support', 'Interview preparation',
                        'Employer connection', 'Full study and career plan', 'I am not sure',
                    ] as $opt)
                        <label class="syp-checkbox">
                            <input type="checkbox" name="support_type[]" value="{{ $opt }}" data-career-trigger="{{ in_array($opt, ['Career preparation','CV and LinkedIn support','Interview preparation','Employer connection','Full study and career plan']) ? '1' : '0' }}">
                            <span>{{ __($opt) }}</span>
                        </label>
                    @endforeach
                </div>

                <div class="syp-sub-question" id="sypCareerSupport" hidden>
                    <legend class="syp-step-sublegend">{{ __('What kind of career support would be useful for you?') }} <small>{{ __('(select all that apply)') }}</small></legend>
                    <div class="syp-grid-options">
                        @foreach ([
                            'CV preparation', 'LinkedIn optimisation', 'Interview preparation',
                            'Career direction', 'Irish job market guidance', 'Employer connection',
                            'Work permit awareness', 'Graduate opportunities', 'I am not sure yet',
                        ] as $opt)
                            <label class="syp-checkbox">
                                <input type="checkbox" name="career_support[]" value="{{ $opt }}">
                                <span>{{ __($opt) }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
            </fieldset>

            {{-- Q10 (Budget) --}}
            <fieldset class="syp-step" data-step="10" hidden>
                <legend class="syp-step-legend">{{ __('What is your approximate budget for your next study step?') }}</legend>
                @foreach ([
                    'Less than €3,000', '€3,000 to €6,000', '€6,000 to €9,000',
                    '€9,000 to €12,000', 'More than €12,000', 'I need guidance on costs', 'Prefer not to say',
                ] as $opt)
                    <label class="syp-radio">
                        <input type="radio" name="budget" value="{{ $opt }}" required>
                        <span>{{ __($opt) }}</span>
                    </label>
                @endforeach
            </fieldset>

            {{-- Q11 (Contact speed) --}}
            <fieldset class="syp-step" data-step="11" hidden>
                <legend class="syp-step-legend">{{ __('How soon would you like to speak with CI Ireland?') }}</legend>
                @foreach ([
                    'Today', 'This week', 'Within the next two weeks',
                    'I am not ready to speak yet, I just want information',
                ] as $opt)
                    <label class="syp-radio">
                        <input type="radio" name="contact_speed" value="{{ $opt }}" required>
                        <span>{{ __($opt) }}</span>
                    </label>
                @endforeach
            </fieldset>

            {{-- Q12 (Contact details) --}}
            <fieldset class="syp-step" data-step="12" hidden>
                <legend class="syp-step-legend">{{ __('Contact details') }}</legend>
                <div class="syp-form-row">
                    <div class="syp-form-group">
                        <label for="aw-name">{{ __('Full name') }} <span class="req">*</span></label>
                        <input type="text" id="aw-name" name="full_name" required autocomplete="name">
                    </div>
                    <div class="syp-form-group">
                        <label for="aw-email">{{ __('Email') }} <span class="req">*</span></label>
                        <input type="email" id="aw-email" name="email" required autocomplete="email">
                    </div>
                </div>
                <div class="syp-form-row">
                    <div class="syp-form-group">
                        <label for="aw-phone">{{ __('Phone / WhatsApp') }} <span class="req">*</span></label>
                        <input type="tel" id="aw-phone" name="phone" required autocomplete="tel" placeholder="+353 ...">
                    </div>
                    <div class="syp-form-group">
                        <label for="aw-language">{{ __('Preferred language') }}</label>
                        <select id="aw-language" name="preferred_language">
                            <option value="English">{{ __('English') }}</option>
                            <option value="Portuguese">{{ __('Portuguese') }}</option>
                            <option value="Spanish">{{ __('Spanish') }}</option>
                            <option value="Other">{{ __('Other') }}</option>
                        </select>
                    </div>
                </div>
                <div class="syp-form-row">
                    <div class="syp-form-group syp-form-group--full">
                        <label for="aw-time">{{ __('Preferred contact time') }}</label>
                        <input type="text" id="aw-time" name="preferred_contact_time" placeholder="{{ __('e.g. weekday mornings, after 6pm Dublin time') }}">
                    </div>
                </div>
            </fieldset>

            <div class="syp-actions">
                <button type="button" class="btn btn-outline" id="sypBack" hidden>
                    <i class="fas fa-arrow-left"></i> {{ __('Back') }}
                </button>
                <button type="button" class="btn btn-primary" id="sypNext">
                    {{ __('Next') }} <i class="fas fa-arrow-right"></i>
                </button>
                <button type="submit" class="btn btn-primary" id="sypSubmit" hidden>
                    {{ __('Submit my plan') }} <i class="fas fa-check"></i>
                </button>
            </div>

            <div class="syp-error" id="sypError" hidden role="alert"></div>

            <div class="syp-success" id="sypSuccess" hidden role="status">
                <i class="fas fa-check-circle"></i>
                <h3>{{ __('Thank you. Our team will be in touch soon.') }}</h3>
                <p>{{ __('We have received your profile assessment and a CI Ireland advisor in Dublin will review it shortly.') }}</p>
            </div>
        </form>
    </div>
</div>
