@php
    $stepsTitle = $title ?? null;
    $stepsKicker = $kicker ?? null;
    $stepsLead = $lead ?? null;
    $stepsItems = $steps ?? [];
    $stepsCount = count($stepsItems);
@endphp
<section class="proc-stack">
    <div class="scroll-stack-outer">
        <div class="scroll-stack-sticky">

            <div class="stack-inner-header">
                @if ($stepsKicker)
                    <span class="proc-stack-kicker">{{ $stepsKicker }}</span>
                @endif
                @if ($stepsTitle)
                    <h2 class="proc-stack-title">{{ $stepsTitle }}</h2>
                @endif
                @if ($stepsLead)
                    <p class="proc-stack-sub">{{ $stepsLead }}</p>
                @endif
            </div>

            <div class="stack-cards-wrap">
                @foreach ($stepsItems as $i => $step)
                    @php
                        $stepNum = $i + 1;
                        $isFinale = $stepNum === $stepsCount;
                    @endphp
                    <div class="step-card{{ $isFinale ? ' is-finale' : '' }}" data-step="{{ $stepNum }}">
                        <div class="step-left">
                            <div class="step-number">{{ str_pad($stepNum, 2, '0', STR_PAD_LEFT) }}</div>
                            <div class="step-badge">{{ __('Step') }} {{ str_pad($stepNum, 2, '0', STR_PAD_LEFT) }}</div>
                            @if (! empty($step['icon']))
                                <div class="step-icon-wrap"><i class="fas {{ $step['icon'] }}"></i></div>
                            @endif
                        </div>
                        <div class="step-right">
                            <h3 class="step-title">{{ $step['title'] }}</h3>
                            <p class="step-desc">{{ $step['body'] }}</p>
                            @if (! empty($step['bullets']))
                                <ul class="step-bullets">
                                    @foreach ($step['bullets'] as $bullet)
                                        <li>{{ $bullet }}</li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="stack-progress" role="tablist" aria-label="{{ $stepsTitle ?? __('Process steps') }}">
                @foreach ($stepsItems as $i => $step)
                    <button type="button" class="stack-dot{{ $i === 0 ? ' active' : '' }}" data-dot="{{ $i }}" aria-label="{{ __('Step') }} {{ $i + 1 }}"></button>
                @endforeach
            </div>
        </div>
    </div>
</section>
