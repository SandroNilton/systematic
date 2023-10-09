@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'leading-3 appearance-none rounded-sm text-sm py-1.5 border border-[#e5e7eb] focus:outline-none focus:ring-0 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-[#00769d] dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600']) !!}>
<!--<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}>-->
