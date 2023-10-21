@props(['align' => 'right', 'width' => '40', 'contentClasses' => 'bg-white dark:bg-[#1f2937] border border-gray-200 dark:border-gray-700'])

@php
switch ($align) {
    case 'left':
        $alignmentClasses = 'origin-top-left left-0';
        break;
    case 'top':
        $alignmentClasses = 'origin-top';
        break;
    case 'right':
    default:
        $alignmentClasses = 'origin-top-right right-0';
        break;
}

switch ($width) {
    case '40':
        $width = 'w-40';
        break;
}
@endphp

<div class="relative" x-data="{ open: false }" @click.outside="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="absolute z-50 my-2 {{ $width }} rounded-[3.5px] shadow bg-white divide-gray-100 text-base list-none {{ $alignmentClasses }}"
            style="display: none;"
            @click="open = false">
        <div class="rounded-[3.5px] divide-gray-100 text-base list-none {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>