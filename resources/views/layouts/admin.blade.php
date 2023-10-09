<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    @stack('css')
  </head>
  <body>
    <div x-data="setup()" x-init="$refs.loading.classList.add('hidden');" :class="{ 'dark' : isDark }">
      <div class="flex h-screen antialiased bg-[#f5f5f5] dark:bg-[#111827] text-[#64748b] dark:text-[#94a3b8] font-normal text-sm">
        
        <div x-ref="loading" class="fixed inset-0 z-50 flex items-center justify-center text-2xl font-semibold text-white bg-white bg-opacity-90 animate-ping">
          cargando ...
        </div>
        
        <livewire:layout.admin.sidebar />

        <div class="flex flex-col flex-1 h-full overflow-hidden">
                           
        <livewire:layout.admin.navbar />

        <!--@if (isset($header))
          <header class="bg-white shadow dark:bg-gray-800">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
              {{ $header }}
            </div>
          </header>
        @endif-->

        <main class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll">
          {{ $slot }}
        </main>

        <livewire:layout.admin.footer />
        
      </div>
    </div>  
    
  </div>
   
    
    


    <script>
      const setup = () => {
        const getTheme = () => {
          if (window.localStorage.getItem('dark')) {
            return JSON.parse(window.localStorage.getItem('dark'))
          }
          return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
        }

        const setTheme = (value) => {
          window.localStorage.setItem('dark', value)
        }

   

        return {
          loading: true,
          isSidebarOpen: false,
        toggleSidbarMenu() {
          this.isSidebarOpen = !this.isSidebarOpen
        },
        isSettingsPanelOpen: false,
        isSearchBoxOpen: false,
          isDark: getTheme(),
          toggleTheme() {
            this.isDark = !this.isDark
            setTheme(this.isDark)
          },
          setLightTheme() {
            this.isDark = false
            setTheme(this.isDark)
          },
          setDarkTheme() {
            this.isDark = true
            setTheme(this.isDark)
          },
          isSettingsPanelOpen: false,
          openSettingsPanel() {
            this.isSettingsPanelOpen = true
            this.$nextTick(() => {
              this.$refs.settingsPanel.focus()
            })
          },
          isNotificationsPanelOpen: false,
          openNotificationsPanel() {
            this.isNotificationsPanelOpen = true
            this.$nextTick(() => {
              this.$refs.notificationsPanel.focus()
            })
          },
          isSearchPanelOpen: false,
          openSearchPanel() {
            this.isSearchPanelOpen = true
            this.$nextTick(() => {
              this.$refs.searchInput.focus()
            })
          },
          isMobileSubMenuOpen: false,
          openMobileSubMenu() {
            this.isMobileSubMenuOpen = true
            this.$nextTick(() => {
              this.$refs.mobileSubMenu.focus()
            })
          },
          isMobileMainMenuOpen: false,
          openMobileMainMenu() {
            this.isMobileMainMenuOpen = true
            this.$nextTick(() => {
              this.$refs.mobileMainMenu.focus()
            })
          },
        }
      }
    </script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    @stack('js')
    @livewireScripts
  </body>
</html>
