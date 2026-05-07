@php
    $faqTitle = $title ?? __('Common questions');
    $faqLead = $lead ?? null;
    $faqItems = $items ?? [];
    $faqId = 'faq-'.\Illuminate\Support\Str::random(6);
@endphp
<section class="faq-section" id="{{ $faqId }}">
    <div class="container">
        <div class="faq-header">
            <h2 class="faq-title">{{ $faqTitle }}</h2>
            @if ($faqLead)
                <p class="faq-lead">{{ $faqLead }}</p>
            @endif
        </div>

        <div class="faq-list" data-faq>
            @foreach ($faqItems as $i => $faq)
                <details class="faq-item" @if ($i === 0) open @endif>
                    <summary class="faq-question">
                        <span>{{ $faq['q'] }}</span>
                        <i class="fas fa-plus faq-icon"></i>
                    </summary>
                    <div class="faq-answer">
                        <p>{{ $faq['a'] }}</p>
                    </div>
                </details>
            @endforeach
        </div>
    </div>
</section>
