<?php

use Livewire\Attributes\Rule;
use Livewire\Volt\Component;

new class extends Component
{
  #[Rule(['required', 'string', 'current_password'])]
  public string $password = '';

  public function deleteUser(): void
  {
    $this->validate();

    tap(auth()->user(), fn () => auth()->logout())->delete();

    session()->invalidate();
    session()->regenerateToken();

    $this->redirect('/', navigate: true);
  }
}; 
?>

<section class="bg-white rounded-[3.5px] shadow-sm pt-3 pb-3 pl-3 pr-3">
  <header>
    <p class="mt-1 text-[13px] leading-4 font-medium">
        {{ __('Una vez que se elimine su cuenta, todos sus recursos y datos se eliminarán permanentemente. Antes de eliminar su cuenta, descargue cualquier dato o información que desee conservar.') }}
    </p>
  </header>
  <div class="mt-4 space-y-3">
    <x-danger-button x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">{{ __('Borrar cuenta') }}</x-danger-button>
  </div>

  <x-modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable>
    <form wire:submit="deleteUser" class="p-4">
      <h2 class="text-sm font-medium">
        {{ __('¿Estás seguro de que quieres eliminar tu cuenta?') }}
      </h2>
      <p class="mt-1 text-[13px] leading-4">
        {{ __('Una vez que se elimine su cuenta, todos sus recursos y datos se eliminarán permanentemente. Ingrese su contraseña para confirmar que desea eliminar permanentemente su cuenta.') }}
      </p>
      <div class="mt-4">
        <x-input-label for="password" value="{{ __('Contraseña') }}"/>
        <x-text-input wire:model="password" id="password" name="password" type="password" class="block w-3/4 mt-1" placeholder="{{ __('Constraseña') }}"/>
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>
      <div class="flex justify-end mt-4">
        <x-secondary-button x-on:click="$dispatch('close')">
          {{ __('Cancelar') }}
        </x-secondary-button>
        <x-danger-button class="ml-3">
          {{ __('Borrar cuenta') }}
        </x-danger-button>
      </div>
    </form>
  </x-modal>
</section>
