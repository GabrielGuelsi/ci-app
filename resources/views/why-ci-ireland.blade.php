@extends('layouts.app')

@php
    $pageActive = 'why-ci-ireland';

    $team = [
        ['name' => 'Marilu Rosado', 'role' => __('Director & Co-founder'), 'photo' => 'consultant/malu.webp'],
        ['name' => 'Amanda Avila', 'role' => __('Business Development Head'), 'photo' => 'consultant/amandaa.avif'],
        ['name' => 'Wagner Marinho', 'role' => __('Educational Consultant'), 'photo' => 'consultant/wagner.webp'],
        ['name' => 'Aliny Assis', 'role' => __('Educational Consultant'), 'photo' => 'consultant/aliny.webp'],
        ['name' => 'Talita', 'role' => __('Educational Consultant'), 'photo' => 'consultant/talita.webp'],
        ['name' => 'Karine', 'role' => __('Enrollment Operations'), 'photo' => 'consultant/karine.webp'],
        ['name' => 'Albert Zavala', 'role' => __('Educational Consultant'), 'photo' => 'consultant/albert.webp'],
        ['name' => 'Thamiris Bastos', 'role' => __('Customer Experience'), 'photo' => 'consultant/thamiris.avif'],
        ['name' => 'Romario Jales', 'role' => __('Sales Manager'), 'photo' => 'consultant/romario.webp'],
        ['name' => 'Amanda Zangarini', 'role' => __('Customer Experience'), 'photo' => 'consultant/amandazanga.webp'],
        ['name' => 'Gabriel', 'role' => __('Digital Transformation Lead'), 'photo' => 'consultant/gabriel.webp'],
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
                <p class="section-subtitle">{{ __('Use the arrows or tap a face to meet our dream team.') }}</p>
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
