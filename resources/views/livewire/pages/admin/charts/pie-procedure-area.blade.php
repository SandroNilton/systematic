<?php

use function Livewire\Volt\{computed, state};
use Asantibanez\LivewireCharts\Models\PieChartModel;

state(food: 0, shopping: 0, travel: 0);

$incrementFood = fn () => $this->food++;
$incrementShopping = fn () => $this->shopping++;
$incrementTravel = fn () => $this->travel++;

$procedure_area = computed(fn () => (new PieChartModel())
    ->setTitle('Expenses by Type')
    ->addSlice('Food', $this->food, '#f6ad55')
    ->addSlice('Shopping', $this->shopping, '#fc8181')
    ->addSlice('Travel', $this->travel, '#90cdf4'));

?>

<div class="p-3 md:p-2.5 sm:p-2">
  <button wire:click="incrementFood" class="bg-[rgb(26,86,219)] pt-0.5 pb-0.5 pl-1 pr-1 rounded-[3px] text-[13px] leading-4 text-white">+ Food</button>
  <button wire:click="incrementShopping" class="bg-[rgb(26,86,219)] pt-0.5 pb-0.5 pl-1 pr-1 rounded-[3px] text-[13px] leading-4 text-white">+ Shopping</button>
  <button wire:click="incrementTravel" class="bg-[rgb(26,86,219)] pt-0.5 pb-0.5 pl-1 pr-1 rounded-[3px] text-[13px] leading-4 text-white">+ Travel</button>
  <div class="w-full p-6 h-60">
    <livewire:livewire-pie-chart key="{{ $this->procedure_area->reactiveKey() }}" :pie-chart-model="$this->procedure_area"/>
  </div>
</div>