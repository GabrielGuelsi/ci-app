@php
    $heroKicker = $kicker ?? null;
    $heroTitle = $title ?? '';
    $heroSubtitle = $subtitle ?? null;
    $heroPrimaryCta = $primaryCta ?? null; // ['label' => '...', 'href' => '...']
    $heroSecondaryCta = $secondaryCta ?? null;
    $heroVisual = $visual ?? null; // optional URL to image
    $heroVisualAlt = $visualAlt ?? '';
    $heroAccent = $accent ?? null; // optional inline style accent
    $heroVariant = $variant ?? 'default';
@endphp
<section class="hero-split hero-split--{{ $heroVariant }}">
    <div class="container">
        <div class="hero-split-grid">
            <div class="hero-split-text">
                @if ($heroKicker)
                    <span class="hero-split-kicker">{{ $heroKicker }}</span>
                @endif
                <h1 class="hero-split-title">{!! $heroTitle !!}</h1>
                @if ($heroSubtitle)
                    <div class="hero-split-subtitle">{!! $heroSubtitle !!}</div>
                @endif
                @if ($heroPrimaryCta || $heroSecondaryCta)
                    <div class="hero-split-actions">
                        @if ($heroPrimaryCta)
                            <a class="btn btn-primary" href="{{ $heroPrimaryCta['href'] }}"
                                @if (!empty($heroPrimaryCta['newTab'])) target="_blank" rel="noopener" @endif>
                                {{ $heroPrimaryCta['label'] }}
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        @endif
                        @if ($heroSecondaryCta)
                            <a class="btn btn-outline" href="{{ $heroSecondaryCta['href'] }}"
                                @if (!empty($heroSecondaryCta['newTab'])) target="_blank" rel="noopener" @endif>
                                {{ $heroSecondaryCta['label'] }}
                            </a>
                        @endif
                    </div>
                @endif
            </div>

            <div class="hero-split-visual" aria-hidden="true">
                @if ($heroVisual)
                    <img src="{{ $heroVisual }}" alt="{{ $heroVisualAlt }}" loading="eager">
                @else
                    {{-- Decorative SVG panel: orbiting dots over a soft gradient --}}
                    <svg viewBox="0 0 480 480" xmlns="http://www.w3.org/2000/svg" class="hero-split-svg">
                        <defs>
                            <radialGradient id="hsg-{{ uniqid() }}" cx="50%" cy="50%" r="55%">
                                <stop offset="0%" stop-color="#F26522" stop-opacity="0.18"/>
                                <stop offset="60%" stop-color="#3D1F3D" stop-opacity="0.04"/>
                                <stop offset="100%" stop-color="#3D1F3D" stop-opacity="0"/>
                            </radialGradient>
                        </defs>
                        <circle cx="240" cy="240" r="200" fill="url(#hsg-{{ uniqid() }})"/>
                        <circle cx="240" cy="240" r="160" fill="none" stroke="#F26522" stroke-opacity="0.18" stroke-dasharray="2 8"/>
                        <circle cx="240" cy="240" r="120" fill="none" stroke="#3D1F3D" stroke-opacity="0.18" stroke-dasharray="4 6"/>
                        <circle cx="240" cy="240" r="80" fill="#fff" stroke="#3D1F3D" stroke-opacity="0.08"/>
                        <circle cx="240" cy="80" r="9" fill="#F26522"/>
                        <circle cx="400" cy="240" r="7" fill="#3D1F3D"/>
                        <circle cx="240" cy="400" r="9" fill="#F26522" opacity="0.7"/>
                        <circle cx="80" cy="240" r="7" fill="#3D1F3D" opacity="0.7"/>
                    </svg>
                @endif
            </div>
        </div>
    </div>
</section>
