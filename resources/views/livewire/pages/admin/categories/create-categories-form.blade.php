<?php

#
use App\Models\Category;

#
use Livewire\Volt\Component;
use function Livewire\Volt\{state};

new class extends Component
{
  public string $name = '';
  public string $description = '';
  public bool $state;

  protected $rules = [
    'name' => 'required|unique:categories',
    'description' => 'max:255',
    'state' => '',
  ];

  public function mount() : void
  {
    $this->state = 0;
  }

  public function updated($fields) :void
  {
    $this->validateOnly($fields);
  }

  public function createCategory(): void
  {
    $this->validate();
    $category = Category::create([
      'name' => $this->name,
      'description' => $this->description,
      'state' => $this->state
    ]);
    $this->reset('name', 'description');
    $this->dispatch('close');
    $this->dispatch('refresh-table-category');
  }

  public function resetForm() :void
  {
    $this->name = '';
    $this->description = '';
    $this->state = 0;
  }
  
};

?>

<div>
  <div class="flex items-start justify-between py-1.5 px-3 border-b">
    <span class="self-center text-[13px] font-medium leading-4">
      <ion-icon wire:ignore name="folder-outline" class="mr-1"></ion-icon> Nueva categoría
    </span>
    <button type="button" x-on:click="show = false" class="inline-flex items-center justify-center w-6 h-6 ml-auto text-lg bg-transparent" data-modal-hide="staticModal">
      <ion-icon wire:ignore name="close-circle-outline"></ion-icon>
    </button>
  </div>
  <div>
    <form wire:submit.prevent="createCategory">
      <div class="w-full pt-3 pb-3 pl-3 pr-3 mb-4 space-y-2 md:w-3/3 lg:w-4/4">
        <div>
          <x-input-label for="name" :value="__('Nombre')" />
          <x-text-input wire:model.live="name" id="name" name="name" type="text" class="block w-full mt-1" autofocus autocomplete="name" />
          <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
          <x-input-label for="description" :value="__('Descripción')" />
          <x-textarea-input wire:model="description" id="description" name="description" type="text" rows="5" class="block w-full mt-1"></x-textarea-input>
          <x-input-error class="mt-2" :messages="$errors->get('description')" />      
        </div>
        <div>
          <x-input-label for="description" :value="__('Estado')" />
          <label class="relative inline-flex items-center mb-5 cursor-pointer">
            <input wire:model="state" type="checkbox" value="" class="sr-only peer">
            <div class="w-9 h-5 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
          </label>
        </div>
        <x-primary-button>{{ __('Guardar') }}</x-primary-button>
        <x-secondary-button wire:click="resetForm">{{ __('Limpiar') }}</x-secondary-button>
        <x-danger-button x-on:click="show = false" wire:click="resetForm">{{ __('Cancelar') }}</x-danger-button>
        <x-action-message class="mr-3" on="profile-updated">
            {{ __('Guardado.') }}
        </x-action-message>
      </div>
    </form>
  </div>
</div>


