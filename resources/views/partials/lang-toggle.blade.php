@php
    $isPt = app()->getLocale() === 'pt';
    $name = Route::currentRouteName() ?: 'home';
    $base = str_starts_with($name, 'pt.') ? substr($name, 3) : $name;
    $params = Route::current() ? Route::current()->parameters() : [];
    $enUrl = \Route::has($base) ? route($base, $params) : url('/');
    $ptName = 'pt.' . $base;
    $ptUrl = \Route::has($ptName) ? route($ptName, $params) : url('/pt');
@endphp
<div class="lang-toggle" role="group" aria-label="{{ __('Language') }}">
    <a href="{{ $enUrl }}" class="lang-toggle-btn @if(!$isPt) active @endif" rel="alternate" hreflang="en" aria-current="@if(!$isPt) true @else false @endif">EN</a>
    <a href="{{ $ptUrl }}" class="lang-toggle-btn @if($isPt) active @endif" rel="alternate" hreflang="pt-BR" aria-current="@if($isPt) true @else false @endif">PT</a>
</div>
