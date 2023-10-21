<button {{ $attributes->merge(['type' => 'button', 'class' => 'bg-white border border-gray-300 hover:bg-gray-50 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-[3.5px] text-[13px] leading-4 w-full sm:w-auto px-2 py-1.5 text-center dark:bg-red-600 dark:hover:bg-gray-700 dark:focus:ring-offset-gray-700']) }}>
    {{ $slot }}
</button>
