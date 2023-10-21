@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-[13px] leading-4 text-red-600 dark:text-red-400 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
