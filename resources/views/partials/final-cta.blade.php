@php
    $ctaKicker = $kicker ?? null;
    $ctaTitle = $title ?? '';
    $ctaText = $text ?? null;
    $ctaPrimary = $primaryCta ?? null;
    $ctaSecondary = $secondaryCta ?? null;
@endphp
<section class="final-cta">
    <div class="container">
        <div class="final-cta-card">
            @if ($ctaKicker)
                <span class="final-cta-kicker">{{ $ctaKicker }}</span>
            @endif
            <h2 class="final-cta-title">{{ $ctaTitle }}</h2>
            @if ($ctaText)
                <p class="final-cta-text">{{ $ctaText }}</p>
            @endif
            @if ($ctaPrimary || $ctaSecondary)
                <div class="final-cta-actions">
                    @if ($ctaPrimary)
                        <a class="btn btn-primary" href="{{ $ctaPrimary['href'] }}">
                            {{ $ctaPrimary['label'] }}
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    @endif
                    @if ($ctaSecondary)
                        <a class="btn btn-outline-light" href="{{ $ctaSecondary['href'] }}">
                            {{ $ctaSecondary['label'] }}
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>
</section>
