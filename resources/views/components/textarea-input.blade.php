@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-[13px] leading-4 rounded-[3.5px] focus:ring-blue-500 focus:border-blue-500 block w-full py-1.5 px-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500']) !!}>
 {{ $slot }}
</textarea>