@props(['value'])

<label {{ $attributes->merge(['class' => 'block mb-1 text-[13px] leading-4 font-medium text-gray-900 dark:text-white']) }}>
    {{ $value ?? $slot }}
</label>
