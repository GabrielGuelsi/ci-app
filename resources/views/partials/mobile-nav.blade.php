@php
    $navActive = $active ?? null;
    $mobileNavItems = [
        ['key' => 'higher-education', 'label' => __('Higher Education')],
        ['key' => 'career-bridge', 'label' => __('Level Up')],
        ['key' => 'why-ci-ireland', 'label' => __('About Us')],
        ['key' => 'start-your-plan', 'label' => __('Start Your Plan')],
    ];
@endphp
<ul class="mobile-nav-links">
    @foreach ($mobileNavItems as $item)
        <li>
            <a href="{{ $lr($item['key']) }}" @class(['active' => $navActive === $item['key']]) @if ($item['key'] === 'start-your-plan') data-open-assessment-modal @endif>
                {{ $item['label'] }} <i class="fas fa-chevron-right"></i>
            </a>
        </li>
    @endforeach
</ul>
