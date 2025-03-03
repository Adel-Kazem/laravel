@props([
    'spacing' => '8',
    'padding' => '4'
])

{{--<x-splade-event--}}
{{--        private--}}
{{--        channel="notifications.{{ Auth::id() }}"--}}
{{--        listen="NewNotification"--}}
{{--/>--}}

<div class="min-h-screen bg-shopify-active-gray">
{{--    @if(!Auth::check())--}}
        <x-navigation/>
{{--    @endif--}}

    <!-- Page Content -->
    <main class="space-y-{{ $spacing }} py-{{ $padding }}">
        {{ $slot }}
    </main>
</div>

<x-app-global-msc.copy-text-on-click/>