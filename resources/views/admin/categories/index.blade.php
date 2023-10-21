
@push('js')
  <script src="https://cdn.tiny.cloud/1/wxqr2ytuwk0selwejwvc4ipfznqktp9c7i52aow8uu4znt1j/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
@endpush


<x-admin-layout>
  <div class="pl-4 pr-4 lg:pl-6 lg:pr-6">
    <section class="flex">
      <div class="w-full pt-2.5 pb-2.5">
        <div class="relative overflow-hidden rounded-[3px]">
          <div class="flex flex-row items-center justify-between">
            <div>
              <h5 class="mr-3 text-sm font-medium">Categorías</h5>
            </div>
            <button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-category-create')" class="rounded-[3.5px] flex items-center text-[13px] leading-4 bg-[rgb(28,100,242)] text-white pt-[5px] pb-[5px] px-2.5">
              <ion-icon name="add-circle-outline" class="mr-1.5"></ion-icon> Nueva categoría
            </button>
          </div>
        </div>
      </div>
    </section>
    <div class="grid">
      <div class="rounded-[3.5px] bg-[rgb(244,245,248)] pt-3 pb-3 pl-3 pr-3">
        <div class="grid gap-3 lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1">
          <div class="bg-white rounded-[3.5px] shadow-sm flex-1" >
            <livewire:pages.admin.categories.table />
          </div>
        </div>
      </div>
    </div>
  </div>
</x-admin-layout>

<x-modal name="confirm-category-create" :show="$errors->isNotEmpty()" maxWidth='7xl'>
  <livewire:pages.admin.categories.create-categories-form />
</x-modal>
