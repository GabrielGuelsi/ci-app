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
                        @if (!empty($ctaPrimary['modal']))
                            <button type="button" class="btn btn-primary" data-open-assessment-modal>
                                {{ $ctaPrimary['label'] }}
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        @else
                            <a class="btn btn-primary" href="{{ $ctaPrimary['href'] }}"
                                @if (!empty($ctaPrimary['newTab'])) target="_blank" rel="noopener" @endif>
                                {{ $ctaPrimary['label'] }}
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        @endif
                    @endif
                    @if ($ctaSecondary)
                        <a class="btn btn-outline-light" href="{{ $ctaSecondary['href'] }}"
                            @if (!empty($ctaSecondary['newTab'])) target="_blank" rel="noopener" @endif>
                            {{ $ctaSecondary['label'] }}
                        </a>
                    @endif
                </div>
            @endif
        </div>
    </div>
</section>
