<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-[3.5px] text-[13px] leading-4 w-full sm:w-auto px-2 py-1.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800']) }}>
    {{ $slot }}
</button>
