<?php

use function Livewire\Volt\{state};

//

?>

<div>
  <header class="flex-shrink-0 border-b bg-white dark:bg-[#1e293b] dark:border-b-[#1e293b]">
    <div class="flex items-center justify-between p-0 h-[40px] pr-[5px] pl-[5px]">

      <div class="flex content-center space-x-3">
        <button @click="toggleSidbarMenu()" class="p-1.5 flex rounded-md content-center focus:outline-none">
          <ion-icon name="reorder-three-outline" class="text-[20px] dark:text-[#fff]"></ion-icon>
        </button>
      </div>

      <div class="relative flex items-center space-x-3">
        <div class="items-center hidden space-x-3 md:flex">
          <div class="relative">
            <button aria-hidden="true" @click="toggleTheme" class="p-1.5 text-[20px] transition-colors duration-200 rounded-full group focus:outline-none">
              <ion-icon x-show="isDark" name="sunny-outline"></ion-icon>
              <ion-icon x-show="!isDark" name="moon-outline" style="display: none;"></ion-icon>
            </button>            
          </div>
        </div>

        

        <!-- avatar button -->
        <div class="relative" x-data="{ isOpen: false }">
          <button @click="isOpen = !isOpen" class="p-1 bg-gray-200 rounded-full focus:outline-none focus:ring">
            <img
              class="object-cover w-8 h-8 rounded-full"
              src="https://avatars0.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
              alt="Ahmed Kamel"
            />
          </button>
          <!-- green dot -->
          <div class="absolute right-0 p-1 bg-green-400 rounded-full bottom-3 animate-ping"></div>
          <div class="absolute right-0 p-1 bg-green-400 border border-white rounded-full bottom-3"></div>

          <!-- Dropdown card -->
          <div
            @click.away="isOpen = false"
            x-show.transition.opacity="isOpen"
            class="absolute mt-3 transform -translate-x-full bg-white rounded-md shadow-lg min-w-max"
          >
            <div class="flex flex-col p-4 space-y-1 font-medium border-b">
              <span class="text-gray-800">Ahmed Kamel</span>
              <span class="text-sm text-gray-400">ahmed.kamel@example.com</span>
            </div>
            <ul class="flex flex-col p-2 my-2 space-y-1">
              <li>
                <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Link</a>
              </li>
              <li>
                <a href="#" class="block px-2 py-1 transition rounded-md hover:bg-gray-100">Another Link</a>
              </li>
            </ul>
            <div class="flex items-center justify-center p-4 text-blue-700 underline border-t">
              <a href="#">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
</div>
