<x-admin-layout>
  <div class="pl-4 pr-4 lg:pl-6 lg:pr-6">
    <section class="flex">
      <div class="w-full pt-4 pb-4">
        <div class="relative overflow-hidden rounded-[3px]">
          <div class="flex flex-row items-center justify-between space-y-1">
            <div>
              <h5 class="mr-3 text-sm font-medium">Usuarios</h5>
              <p class="text-[13px] leading-4">Listado</p>
            </div>
            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-create')" class="rounded-[3.5px] flex items-center text-[13px] leading-4 bg-[rgb(28,100,242)] text-white pt-[5px] pb-[5px] px-2.5">
              <ion-icon name="add-circle-outline" class="mr-1.5"></ion-icon> Nuevo usuario
            </button>
          </div>
        </div>
      </div>
    </section>
    <div class="grid">
      <div class="rounded-[3.5px] bg-[rgb(244,245,248)] pt-3 pb-3 pl-3 pr-3">
        <div class="grid gap-3 lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1">
          <div class="bg-white rounded-[3.5px] shadow-sm" >
            <livewire:pages.admin.users.table />
          </div>
        </div>
      </div>
    </div>
  </div>
</x-admin-layout>

<x-modal name="confirm-user-create" :show="$errors->isNotEmpty()" maxWidth='7xl'>
  <livewire:pages.admin.users.create-user-form />
</x-modal>
