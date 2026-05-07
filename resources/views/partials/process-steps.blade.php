@php
    $stepsTitle = $title ?? null;
    $stepsKicker = $kicker ?? null;
    $stepsLead = $lead ?? null;
    $stepsItems = $steps ?? [];
@endphp
<section class="process-steps">
    <div class="container">
        @if ($stepsKicker || $stepsTitle || $stepsLead)
            <div class="process-steps-header">
                @if ($stepsKicker)
                    <span class="process-steps-kicker">{{ $stepsKicker }}</span>
                @endif
                @if ($stepsTitle)
                    <h2 class="process-steps-title">{{ $stepsTitle }}</h2>
                @endif
                @if ($stepsLead)
                    <p class="process-steps-lead">{{ $stepsLead }}</p>
                @endif
            </div>
        @endif

        <ol class="process-steps-list">
            @foreach ($stepsItems as $index => $step)
                <li class="process-step">
                    <div class="process-step-num">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                    <div class="process-step-body">
                        <h3 class="process-step-title">{{ $step['title'] }}</h3>
                        <p class="process-step-text">{{ $step['body'] }}</p>
                    </div>
                </li>
            @endforeach
        </ol>
    </div>
</section>
