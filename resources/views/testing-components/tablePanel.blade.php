{{--how to use it: --}}
{{--<x-panel padding="py-6">--}}
{{--    <!-- Content here -->--}}
{{--</x-panel>--}}

@props([
    'padding' => 'py-0',
    'allowOverflow' => false,
    'background' => 'bg-white',
    'border' => 'border border-gray-200'
])

<div class="{{ $padding }}">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="{{ $background }} {{ $border }} {{ $allowOverflow ? 'overflow-hidden' : '' }} rounded-xl shadow-sm">
            <div {{ $attributes->class(['p-4 sm:p-6 rounded-xl']) }}>
                {{ $slot }}
            </div>
        </div>
    </div>
</div>