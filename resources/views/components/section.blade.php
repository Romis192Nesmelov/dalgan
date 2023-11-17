@props([
    'head' => false
])
<div {{ $attributes->class('section') }}>
    <div class="container pb-0 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
        @if ($head)
            <h2>{{ $attributes->get('head') }}</h2>
        @endif
        {{ $slot }}
    </div>
</div>
