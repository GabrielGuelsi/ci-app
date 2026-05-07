@php
    $navActive = $active ?? null;
    $navItems = [
        ['key' => 'study-in-ireland', 'label' => __('Study in Ireland')],
        ['key' => 'already-in-ireland', 'label' => __('Already in Ireland')],
        ['key' => 'career-bridge', 'label' => __('Career Bridge')],
        ['key' => 'for-employers', 'label' => __('For Employers')],
        ['key' => 'why-ci-ireland', 'label' => __('About Us')],
    ];
@endphp
<nav class="main-nav">
    <div class="container">
        <div class="nav-content">
            <a href="{{ $lr('home') }}" class="logo">
                <img class="logo-image" src="{{ asset('images/logo-ci.png') }}" alt="CI Exchange">
            </a>

            <ul class="nav-links">
                @foreach ($navItems as $item)
                    <li>
                        <a href="{{ $lr($item['key']) }}" @class(['active' => $navActive === $item['key']])>
                            {{ $item['label'] }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="nav-actions">
                <a href="{{ $lr('start-your-plan') }}" class="nav-cta @if($navActive === 'start-your-plan') active @endif">
                    {{ __('Start Your Plan') }}
                </a>
                @include('partials.lang-toggle')
                <button class="hamburger-btn" id="hamburgerBtn" aria-label="{{ __('Open menu') }}" aria-expanded="false">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>
        </div>
    </div>
</nav>
