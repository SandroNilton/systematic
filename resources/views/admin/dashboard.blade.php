<x-admin-layout>
  <div class="pl-4 pr-4 lg:pl-6 lg:pr-6">
    <section class="flex">
      <div class="w-full pt-2.5 pb-2.5">
        <div class="relative overflow-hidden rounded-[3px]">
          <div class="flex flex-row items-center justify-between space-y-3">
            <div>
              <h5 class="mr-3 text-sm font-semibold">Panel administrativo</h5>
              <p class="text-[13px] leading-4">Reportes</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <div class="grid">
      <div class="rounded-[3px] bg-[rgb(244,245,248)] pt-3 pb-3 pl-3 pr-3">
        <div class="grid gap-3 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
          <div class="bg-white rounded-sm shadow-sm" >
            <livewire:pages.admin.charts.pie-procedure-area />
          </div>
          <div class="bg-white shadow-sm">
            <livewire:pages.admin.charts.col-procedure-area />
          </div>
          <div class="bg-white shadow-sm">
            <livewire:pages.admin.charts.pie-procedure-area />
          </div>
        </div>
      </div>
    </div>
  </div>
</x-admin-layout>