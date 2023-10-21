<x-admin-layout>
  <div class="pb-4 pl-4 pr-4 lg:pl-6 lg:pr-6">
    <section class="flex">
      <div class="w-full pt-4 pb-4">
        <div class="relative overflow-hidden rounded-[3px]">
          <div class="flex flex-row items-center justify-between space-y-1">
            <div>
              <h5 class="mr-3 text-sm font-medium">Información del perfil</h5>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="grid">
      <div class="rounded-[3.5px] bg-[rgb(244,245,248)] pt-3 pb-3 pl-3 pr-3">
        <div class="grid gap-3 lg:grid-cols-3 md:grid-cols-1 sm:grid-cols-1">
          <div>
            <livewire:pages.admin.profile.update-profile-information-form />
          </div>
          <div>
            <livewire:pages.admin.profile.update-password-form />
          </div>
          <div>
            <livewire:pages.admin.profile.delete-user-form />
          </div>
        </div>
      </div>
    </div>
  </div>
</x-admin-layout>
