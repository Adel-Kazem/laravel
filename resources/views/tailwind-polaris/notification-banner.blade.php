@props([
    'title' => null,
    'message',
    'type' => 'info',
    'buttonText' => '',
    'buttonLink' => '',
    'size' => 'default',
    'showClose' => false,
    'secondaryButtonText' => '',
    'secondaryButtonLink' => '',
    'inlineText' => '',
    'inlineLink' => '',
    'maxWidth' => '4',
    'extraPadding' => false,
    'lessPadding' => false,
])

@php
    $bgColor = match($type) {
        default => 'bg-blue-300',
        'info' => 'bg-blue-300',
        'success' => 'bg-green-500',
        'warning' => 'bg-yellow-400',
        'critical' => 'bg-red-600',
    };
    $iconColor = match($type) {
        default => 'fill-black',
        'info' => 'fill-black',
        'success' => 'text-black',
        'warning' => 'fill-black',
        'critical' => 'fill-white',
    };
    $titleColor = match($type) {
        default => 'text-black',
        'info' => 'text-black',
        'success' => 'text-black',
        'warning' => 'text-black',
        'critical' => 'text-white',
    };
    $hasPhysicalButtons = ($buttonText && $buttonLink) || ($secondaryButtonText && $secondaryButtonLink);
    $widthClass = 'max-w-' . $maxWidth . 'xl';
@endphp

<div class="mx-auto px-4 sm:px-6 lg:px-8 {{ $widthClass }}">
    <div class="w-full">
        @if($size === 'small')
            <div class="bg-white border border-gray-200 rounded-xl flex items-center {{ $extraPadding ? 'p-4' : 'p-3' }}">
                <div class="flex items-center {{ $bgColor }} {{ $lessPadding ? 'p-1' : 'p-2' }} {{ $extraPadding ? 'py-4' : '' }} rounded-md">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 {{ $iconColor }}" viewBox="0 0 20 20">
                        <path d="M10 6a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5a.75.75 0 0 1 .75-.75Z"/>
                        <path d="M11 13a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"/>
                        <path fill-rule="evenodd" d="M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Zm-1.5 0a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0Z"/>
                    </svg>
                </div>
                <div class="flex-grow mx-3">
                    @if($title)
                        <h2 class="text-sm font-medium {{ $titleColor }}">{{ $title }}</h2>
                    @endif
                    <p class="text-sm {{ $titleColor }}">
                        {{ $message }}
                        @if($inlineText && $inlineLink)
                            <x-splade-link href="{{ $inlineLink }}" class="text-sm text-blue-600 hover:underline">{{ $inlineText }}</x-splade-link>
                        @endif
                    </p>
                </div>
                @if($hasPhysicalButtons)
                    <div class="flex space-x-2">
                        @if($buttonText && $buttonLink)
                            <x-splade-link preserve-scroll href="{{ $buttonLink }}" class="w-max bg-white buttonPressable hover:bg-neutral-50 active:bg-[#f7f7f7] boxShadowNormal text-[#303030] px-2 py-1.5 text-xs rounded-md font-semibold">
                                {{ $buttonText }}
                            </x-splade-link>
                        @endif
                        @if($secondaryButtonText && $secondaryButtonLink)
                            <x-splade-link href="{{ $secondaryButtonLink }}" class="w-max bg-white buttonPressable hover:bg-neutral-50 active:bg-[#f7f7f7] boxShadowNormal text-[#303030] px-2 py-1.5 text-xs rounded-md font-semibold">
                                {{ $secondaryButtonText }}
                            </x-splade-link>
                        @endif
                    </div>
                @endif
                @if($showClose)
                    <button class="ml-2 text-gray-500 hover:text-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 fill-current" viewBox="0 0 20 20">
                            <path d="M13.97 15.03a.75.75 0 1 0 1.06-1.06l-3.97-3.97 3.97-3.97a.75.75 0 0 0-1.06-1.06l-3.97 3.97-3.97-3.97a.75.75 0 0 0-1.06 1.06l3.97 3.97-3.97 3.97a.75.75 0 1 0 1.06 1.06l3.97-3.97 3.97 3.97Z"/>
                        </svg>
                    </button>
                @endif
            </div>
        @else
            <div class="bg-white border border-gray-200 rounded-xl border-b-gray-200 border-b-2">
                <div class="flex justify-between {{ $bgColor }} p-3 rounded-t-xl">
                    <div class="flex my-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 {{ $iconColor }} mr-1" viewBox="0 0 20 20">
                            <path d="M10 6a.75.75 0 0 1 .75.75v3.5a.75.75 0 0 1-1.5 0v-3.5a.75.75 0 0 1 .75-.75Z"/>
                            <path d="M11 13a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"/>
                            <path fill-rule="evenodd" d="M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Zm-1.5 0a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0Z"/>
                        </svg>
                        @if($title)
                            <h2 class="m-0 text-sm font-medium {{ $titleColor }}">{{ $title }}</h2>
                        @endif
                    </div>
                    @if($showClose)
                        <button class="text-gray-500 hover:text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 fill-current" viewBox="0 0 20 20">
                                <path d="M13.97 15.03a.75.75 0 1 0 1.06-1.06l-3.97-3.97 3.97-3.97a.75.75 0 0 0-1.06-1.06l-3.97 3.97-3.97-3.97a.75.75 0 0 0-1.06 1.06l3.97 3.97-3.97 3.97a.75.75 0 1 0 1.06 1.06l3.97-3.97 3.97 3.97Z"/>
                            </svg>
                        </button>
                    @endif
                </div>

                <p class="text-sm p-4 {{ $titleColor }}">
                    {{ $message }}
                    @if($inlineText && $inlineLink)
                        <x-splade-link href="{{ $inlineLink }}" class="text-sm text-blue-600 hover:underline">{{ $inlineText }}</x-splade-link>
                    @endif
                </p>
                @if($hasPhysicalButtons)
                    <div class="pb-3 flex space-x-2 ml-4">
                        @if($buttonText && $buttonLink)
                            <x-splade-link href="{{ $buttonLink }}" class="w-max bg-white buttonPressable hover:bg-neutral-50 active:bg-[#f7f7f7] boxShadowNormal text-[#303030] px-2 py-1.5 text-xs rounded-md font-semibold">
                                {{ $buttonText }}
                            </x-splade-link>
                        @endif
                        @if($secondaryButtonText && $secondaryButtonLink)
                            <x-splade-link href="{{ $secondaryButtonLink }}" class="w-max bg-white buttonPressable hover:bg-neutral-50 active:bg-[#f7f7f7] boxShadowNormal text-[#303030] px-2 py-1.5 text-xs rounded-md font-semibold">
                                {{ $secondaryButtonText }}
                            </x-splade-link>
                        @endif
                    </div>
                @endif
            </div>
        @endif
    </div>
</div>