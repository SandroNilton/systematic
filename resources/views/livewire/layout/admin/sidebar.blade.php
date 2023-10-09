<?php

use function Livewire\Volt\{state};

//

?>

<aside x-transition:enter="transition transform duration-300" x-transition:enter-start="-translate-x-full opacity-30 ease-in" x-transition:enter-end="translate-x-0 opacity-100 ease-out" x-transition:leave="transition transform duration-300" x-transition:leave-start="translate-x-0 opacity-100 ease-out" x-transition:leave-end="-translate-x-full opacity-0 ease-in" class="fixed inset-y-0 z-10 flex flex-col flex-shrink-0 w-[180px] max-h-screen overflow-hidden transition-all transform bg-white border-r shadow-lg lg:z-auto lg:static lg:shadow-none dark:border-r-[#1f2937] dark:bg-[#1f2937]" :class="{'-translate-x-full lg:translate-x-0 lg:w-[45px]': !isSidebarOpen}">
  <div class="flex items-center justify-between flex-shrink-0 p-2" :class="{'lg:justify-center': !isSidebarOpen}">
    <span class="p-2 text-xl font-semibold leading-8 tracking-wider uppercase whitespace-nowrap">
      K<span :class="{'lg:hidden': !isSidebarOpen}">-WD</span>
    </span>
    <button @click="toggleSidbarMenu()" class="p-2 rounded-md lg:hidden">
      <svg class="w-6 h-6 text-gray-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
      </svg>
    </button>
  </div>
  <!-- Sidebar links -->
  <nav class="flex-1 overflow-hidden hover:overflow-y-auto">
    <ul class="p-2 overflow-hidden">
      <li>
        <button aria-hidden="true" @click="toggleTheme" class="p-2 text-gray-900 transition-colors duration-200 bg-blue-200 rounded-full shadow-md group hover:bg-blue-200 dark:bg-gray-50 dark:hover:bg-gray-200 focus:outline-none">
          <svg x-show="isDark" width="24" height="24" class="text-gray-700 fill-current group-hover:text-gray-500 group-focus:text-gray-700 dark:text-gray-700 dark:group-hover:text-gray-500 dark:group-focus:text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
          </svg>
          <svg x-show="!isDark" width="24" height="24" class="text-gray-700 fill-current group-hover:text-gray-500 group-focus:text-gray-700 dark:text-gray-700 dark:group-hover:text-gray-500 dark:group-focus:text-gray-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="" style="display: none;">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
          </svg>
        </button>
      </li>
      <li>
        <a
          href="#"
          class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
          :class="{'justify-center': !isSidebarOpen}"
        >
          <span>
            <svg
              class="w-6 h-6 text-gray-400"
              xmlns="http://www.w3.org/2000/svg"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
              />
            </svg>
          </span>
          <span :class="{ 'lg:hidden': !isSidebarOpen }">Dashboard</span>
        </a>
      </li>
      <!-- Sidebar Links... -->
    </ul>
  </nav>
  <!-- Sidebar footer -->
  <div class="flex-shrink-0 p-2 border-t max-h-14">
    <button
      class="flex items-center justify-center w-full px-4 py-2 space-x-1 font-medium tracking-wider uppercase bg-gray-100 border rounded-md focus:outline-none focus:ring"
    >
      <span>
        <svg
          class="w-6 h-6"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 24 24"
          stroke="currentColor"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
          />
        </svg>
      </span>
      <span :class="{'lg:hidden': !isSidebarOpen}"> Logout </span>
    </button>
  </div>
</aside>