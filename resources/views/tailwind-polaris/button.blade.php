@props([
    'type' => 'default',
    'size' => 'default',
    'id' => null,
    'fullWidth' => false,
    'icon' => false,
    'inline' => false,
    'class' => ''
])

@php
    $buttonClasses = '';
    $sizeClasses = '';

    // Determine button size classes
    switch ($size) {
        case 'large':
            $sizeClasses = 'px-4 py-2 text-sm';
            break;
        case 'icon':
            $sizeClasses = 'p-1.5 text-sm';
            break;
        case 'tableIcon':
            $sizeClasses = 'p-1 px-3 text-sm';
            break;
        default:
            $sizeClasses = 'px-3 py-1.5 text-xs';
            break;
    }

    // Base display class based on inline prop
    $displayClass = $inline ? 'inline-flex' : 'flex';

    // Determine button type classes
    switch ($type) {
        case 'primary':
            $buttonClasses = $displayClass . ' items-center primary-button buttonPressable primaryButtonShadow text-white rounded-lg font-semibold';
            break;
        case 'indigo':
            $buttonClasses = $displayClass . ' items-center indigo-button buttonPressable indigoButtonShadow text-white rounded-lg font-semibold';
            break;
        case 'turq':
            $buttonClasses = $displayClass . ' items-center turquoise-button buttonPressable turquoiseButtonShadow text-white rounded-lg font-semibold';
            break;
        case 'danger':
            $buttonClasses = 'bg-red-600 hover:bg-red-700 active:bg-red-800 buttonPressable text-white dangerButtonShadow rounded-lg font-semibold';
            break;
        default:
            $buttonClasses = $displayClass . ' items-center bg-white buttonPressable hover:bg-neutral-50 active:bg-[#f7f7f7] boxShadowNormal text-[#303030] rounded-lg font-semibold';
            break;
    }

    // Combine type and size classes
    $buttonClasses .= ' ' . $sizeClasses;

    // Add full width class if needed
    if ($fullWidth) {
        $buttonClasses .= ' w-full';
    }

    // Add icon classes if icon is true
    if ($icon) {
        $buttonClasses .= ' gap-2';
    }
@endphp

<button
        id="{{ $id }}"
        {{ $attributes->merge(['class' => $buttonClasses . ' ' . $class]) }}
>
    @if ($icon)
        <i class="fa-solid fa-plus"></i>
    @endif
    {{ $slot }}
</button>