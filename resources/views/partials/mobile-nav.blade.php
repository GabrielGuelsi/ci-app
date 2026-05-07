@php
    $navActive = $active ?? null;
    $mobileNavItems = [
        ['key' => 'study-in-ireland', 'label' => __('Study in Ireland')],
        ['key' => 'already-in-ireland', 'label' => __('Already in Ireland')],
        ['key' => 'career-bridge', 'label' => __('Career Bridge')],
        ['key' => 'for-employers', 'label' => __('For Employers')],
        ['key' => 'why-ci-ireland', 'label' => __('About Us')],
        ['key' => 'start-your-plan', 'label' => __('Start Your Plan')],
    ];
@endphp
<ul class="mobile-nav-links">
    @foreach ($mobileNavItems as $item)
        <li>
            <a href="{{ $lr($item['key']) }}" @class(['active' => $navActive === $item['key']])>
                {{ $item['label'] }} <i class="fas fa-chevron-right"></i>
            </a>
        </li>
    @endforeach
</ul>
