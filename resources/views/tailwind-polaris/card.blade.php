@props(['title' => ''])

<div
        class="min-w-[110px] bg-white border border-gray-200 rounded-xl py-2 px-5 border-b-gray-200 border-b-2 shadow-sm"
>
    @if($title !== '')
        <h2 class="m-0 text-sm mb-2 text-inherit font-medium">
            {{ $title }}
        </h2>
    @endif
    <p class="text text-inherit">
        {{ $slot }}
    </p>
</div>
