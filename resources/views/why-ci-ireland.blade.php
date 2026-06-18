@extends('layouts.app')

@php
    $pageActive = 'why-ci-ireland';

    $team = [
        [
            'name' => 'Marilu Rosado',
            'role' => __('Director & Co-founder'),
            'photo' => 'consultant/malu.webp',
            'bio' => __('Our fearless co-founder and the heart of CI Ireland. Mother of Sophie, she calls everyone "beautiful" (but she is the beautiful one). She inspires us daily with her resilience and high spirits. The team mom and the foundation of our company.'),
        ],
        [
            'name' => 'Amanda Avila',
            'role' => __('Marketing & Sales Manager'),
            'photo' => 'consultant/amandaa.avif',
            'bio' => __('Known as "the creative." Pet mom and content creator. She came to Ireland as a #viajanteCI 7 years ago and has been part of the #dreamteam ever since. A true pillar who brings possibilities, support, and strength to our operation.'),
        ],
        [
            'name' => 'Wagner Marinho',
            'role' => __('Educational Consultant'),
            'photo' => 'consultant/wagner.webp',
            'bio' => __('Helpful and deeply committed. He has a cleaning obsession and is the best conflict mediator you will ever meet. He has been part of our team for 7 years.'),
        ],
        [
            'name' => 'Aliny Assis',
            'role' => __('Educational Consultant'),
            'photo' => 'consultant/aliny.webp',
            'bio' => __("Known as the team's big sister. From Amazonas, she wins everyone with her warmth and humanity. Brave and strong in the best way."),
        ],
        [
            'name' => 'Talita',
            'role' => __('Educational Consultant'),
            'photo' => 'consultant/talita.webp',
            'bio' => __('Pure friendliness and a creator of catchphrases. Talita knows Ireland deeply, has lived every stage of the journey, studied English, went to college, and has been with our team for over a year.'),
        ],
        [
            'name' => 'Karine',
            'role' => __('Enrollment Operations'),
            'photo' => 'consultant/karine.webp',
            'bio' => __('She processes our enrollments and manages a massive workload with mastery. Our "Kaka" is a star: straightforward, confident, and secretly very sweet.'),
        ],
        [
            'name' => 'Albert Zavala',
            'role' => __('Educational Consultant'),
            'photo' => 'consultant/albert.webp',
            'bio' => __('Our Mexican consultant who supports Spanish-speaking clients. He also speaks Portuguese and is the best Google Maps operator you will ever meet. An excellent advisor.'),
        ],
        [
            'name' => 'Thamiris Bastos',
            'role' => __('Customer Experience'),
            'photo' => 'consultant/thamiris.avif',
            'bio' => __('Customer Experience at CI Ireland. She is responsible for guiding our students with care, attention, and dedication. Pet mom, based in the Netherlands, and working remotely. We miss her every day.'),
        ],
        [
            'name' => 'Romario Jales',
            'role' => __('Educational Consultant'),
            'photo' => 'consultant/romario.webp',
            'bio' => __('Known as the restless one in the office. His education background elevates every consultation. From the farm to Ireland, and 3 years with our team.'),
        ],
        [
            'name' => 'Amanda Zangarini',
            'role' => __('Customer Experience'),
            'photo' => 'consultant/amandazanga.webp',
            'bio' => __('Customer Experience at CI Ireland. Sweet, caring, and always ready with kind words. She supports our students throughout their journey.'),
        ],
        [
            'name' => 'Gabriel',
            'role' => __('Educational Consultant'),
            'photo' => 'consultant/gabriel.webp',
            'bio' => __('Our newest consultant and a real prodigy at just 20. Fluent in Portuguese, English, and Spanish, and an IT student living the day-to-day student life in Ireland.'),
        ],
    ];
@endphp

@section('title', __('Why CI Ireland') . ' - CI Exchange Ireland')

@section('head')
    <link rel="preload" as="image" href="{{ asset('images/about/ci-ireland.webp') }}">
    @if (file_exists(public_path('build/manifest.json')))
        @vite('resources/css/why-ci-ireland.css')
    @else
        <link rel="stylesheet" href="/css/why-ci-ireland.css">
    @endif
@endsection

@include('partials.page-shell')

@section('content')
    {{-- Cinematic hero: background image + side text, matching the other pages. --}}
    <section class="about-hero">
        <div class="about-hero-bg" style="background-image: url('{{ asset('images/about/ci-ireland.webp') }}');" aria-hidden="true"></div>
        <div class="about-hero-overlay" aria-hidden="true"></div>
        <div class="container">
            <div class="about-hero-content">
                <span class="about-hero-kicker animate-in" style="animation-delay:.05s"><i class="fas fa-star"></i> {{ __('About CI Ireland') }}</span>
                <h1 class="about-hero-title animate-in" style="animation-delay:.15s">{!! __('Specialists in <span>higher education</span> in Ireland') !!}</h1>
                <p class="about-hero-subtitle animate-in" style="animation-delay:.3s">{{ __('Since 2016, CI Ireland has connected international students with universities and educational institutions across Ireland, through higher education programmes at every level. Our consultancy identifies your life and career goals and presents an exclusive plan that makes sense — considering your budget, background and opportunities.') }}</p>
                <div class="about-hero-actions animate-in" style="animation-delay:.45s">
                    <button type="button" class="btn-primary about-hero-cta" data-open-assessment-modal>{{ __('Start Your Plan') }} <i class="fas fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="about-hero-scroll" aria-hidden="true"><span></span></div>
    </section>

    <section class="about-gallery">
        <div class="container">
            <div class="about-gallery-header">
                <h2 class="about-gallery-title">{{ __('Real stories, real people') }}</h2>
                <p class="about-gallery-copy">{{ __('A company built by people who have lived the exchange and immigration process firsthand — and who chose to work with a product that builds bridges and changes realities: education. Meet our family away from home: our team.') }}</p>
                <span class="about-gallery-tag">#familiaCIIrlanda</span>
            </div>
            <div class="about-gallery-marquee" aria-label="CI Ireland moments">
                <div class="about-gallery-track">
                    <div class="gallery-item large"  style="--image: url('{{ asset('images/about/about-1.webp') }}');" role="img" aria-label="CI Ireland students"></div>
                    <div class="gallery-item medium" style="--image: url('{{ asset('images/about/about-2.webp') }}');" role="img" aria-label="CI Ireland campus"></div>
                    <div class="gallery-item tall"   style="--image: url('{{ asset('images/about/about-3.webp') }}');" role="img" aria-label="CI Ireland experience"></div>
                    <div class="gallery-item icon" aria-hidden="true"><i class="fas fa-globe"></i></div>
                    <div class="gallery-item small"  style="--image: url('{{ asset('images/about/about-4.webp') }}');" role="img" aria-label="CI Ireland team"></div>
                    <div class="gallery-item medium" style="--image: url('{{ asset('images/about/about-5.webp') }}');" role="img" aria-label="CI Ireland Dublin"></div>

                    <div class="gallery-item large"  style="--image: url('{{ asset('images/about/about-1.webp') }}');" aria-hidden="true"></div>
                    <div class="gallery-item medium" style="--image: url('{{ asset('images/about/about-2.webp') }}');" aria-hidden="true"></div>
                    <div class="gallery-item tall"   style="--image: url('{{ asset('images/about/about-3.webp') }}');" aria-hidden="true"></div>
                    <div class="gallery-item icon" aria-hidden="true"><i class="fas fa-globe"></i></div>
                    <div class="gallery-item small"  style="--image: url('{{ asset('images/about/about-4.webp') }}');" aria-hidden="true"></div>
                    <div class="gallery-item medium" style="--image: url('{{ asset('images/about/about-5.webp') }}');" aria-hidden="true"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="section pillars-section" id="values">
        <div class="container">
            <div class="pillars-header">
                <div>
                    <div class="pillars-kicker">{{ __('CI pillars') }}</div>
                    <h2 class="pillars-title">{{ __('The values that sustain our business') }}</h2>
                </div>
            </div>
            <div class="pillars-grid">
                <div class="pillar-card">
                    <div class="pillar-icon"><i class="fas fa-lightbulb"></i></div>
                    <h4>{{ __('Knowledge') }}</h4>
                    <p>{{ __('We keep our team in constant training to deliver quality with commitment and dedication.') }}</p>
                </div>
                <div class="pillar-card">
                    <div class="pillar-icon"><i class="fas fa-eye"></i></div>
                    <h4>{{ __('Transparency') }}</h4>
                    <p>{{ __('Clear, reliable information with no surprises. We aim for a complete and honest experience.') }}</p>
                </div>
                <div class="pillar-card">
                    <div class="pillar-icon"><i class="fas fa-shield-heart"></i></div>
                    <h4>{{ __('Credibility') }}</h4>
                    <p>{{ __('We follow the client journey from start to finish with knowledge, transparency, and ethics.') }}</p>
                </div>
                <div class="pillar-card">
                    <div class="pillar-icon"><i class="fas fa-chart-line"></i></div>
                    <h4>{{ __('Efficiency') }}</h4>
                    <p>{{ __('We help students make the right decisions based on reliable data and smooth internal processes.') }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Key indicators band (replaces the old BR → IE heritage strip). --}}
    <section class="about-stats" aria-label="CI Ireland by the numbers">
        <div class="container">
            <div class="about-stats-head">
                <span class="about-stats-kicker">{{ __('CI by the numbers') }}</span>
            </div>
            <div class="about-stats-grid">
                <div class="about-stat">
                    <span class="about-stat-num">+35</span>
                    <span class="about-stat-label">{{ __('years of history') }}</span>
                </div>
                <div class="about-stat">
                    <span class="about-stat-num">+100</span>
                    <span class="about-stat-label">{{ __('stores in Brazil') }}</span>
                </div>
                <div class="about-stat">
                    <span class="about-stat-num">{{ __('+11,000') }}</span>
                    <span class="about-stat-label">{{ __('students in Ireland') }}</span>
                </div>
                <div class="about-stat">
                    <span class="about-stat-num">2016</span>
                    <span class="about-stat-label">{{ __('in Dublin') }}</span>
                </div>
            </div>
        </div>
    </section>

    <section class="section team-section" id="team">
        <div class="container">
            <div class="team-header">
                <h2 class="section-title">{{ __('Meet the team') }}</h2>
                <p class="section-subtitle">{{ __('Marilu at the center, the whole CI Ireland family around her. Use the arrows or tap a face to meet each one.') }}</p>
            </div>

            <div class="team-orbit" id="teamOrbit" data-active="0">
                <div class="orbit-stage">
                    <div class="orbit-center-photo"></div>
                    <div class="orbit-ring">
                        @foreach ($team as $member)
                            <button type="button" class="orbit-thumb"
                                    style="--photo: url('{{ asset($member['photo']) }}');"
                                    data-name="{{ $member['name'] }}"
                                    data-role="{{ $member['role'] }}"
                                    data-bio="{{ $member['bio'] }}"
                                    aria-label="{{ $member['name'] }} — {{ $member['role'] }}">
                                <span class="orbit-thumb-photo"></span>
                            </button>
                        @endforeach
                    </div>
                </div>
                <div class="orbit-info" aria-live="polite">
                    <span class="orbit-accent-dot" aria-hidden="true"></span>
                    <div class="orbit-center-name"></div>
                    <div class="orbit-center-role"></div>
                    <p class="orbit-center-bio"></p>
                </div>
                <div class="orbit-controls">
                    <button type="button" class="orbit-nav orbit-prev" aria-label="{{ __('Previous') }}"><i class="fas fa-arrow-left"></i></button>
                    <div class="orbit-counter"><span class="orbit-index">01</span> <span class="orbit-sep">/</span> <span class="orbit-total">{{ count($team) }}</span></div>
                    <button type="button" class="orbit-nav orbit-next" aria-label="{{ __('Next') }}"><i class="fas fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script src="{{ asset('js/why-ci-ireland.js') }}" defer></script>
@endpush
