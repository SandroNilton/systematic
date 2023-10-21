<?php

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Volt\Component;

new class extends Component
{
  public string $current_password = '';
  public string $password = '';
  public string $password_confirmation = '';

  public function updatePassword(): void
  {
    try {
      $validated = $this->validate([
        'current_password' => ['required', 'string', 'current_password'],
        'password' => ['required', 'string', Password::defaults(), 'confirmed'],
      ]);
    } catch (ValidationException $e) {
      $this->reset('current_password', 'password', 'password_confirmation');
      throw $e;
    }

    auth()->user()->update([
      'password' => Hash::make($validated['password']),
    ]);

    $this->reset('current_password', 'password', 'password_confirmation');
    $this->dispatch('password-updated');
    
  }
}; 
?>

<section class="bg-white rounded-[3.5px] shadow-sm pt-3 pb-3 pl-3 pr-3">
  <header>
    <p class="mt-1 text-[13px] leading-4 font-medium">
      {{ __('Asegúrese de que su cuenta utilice una contraseña larga y aleatoria para mantenerse segura.') }}
    </p>
  </header>
  <form wire:submit="updatePassword" class="mt-4 space-y-3">
    <div>
      <x-input-label for="current_password" :value="__('Contraseña actual')" />
      <x-text-input wire:model="current_password" id="current_password" name="current_password" type="password" class="block w-full mt-1" autocomplete="current-password" />
      <x-input-error :messages="$errors->get('current_password')" class="mt-2" />
    </div>
    <div>
      <x-input-label for="password" :value="__('Nueva contraseña')" />
      <x-text-input wire:model="password" id="password" name="password" type="password" class="block w-full mt-1" autocomplete="new-password" />
      <x-input-error :messages="$errors->get('password')" class="mt-2" />
    </div>
    <div>
      <x-input-label for="password_confirmation" :value="__('Confirmar Contraseña')" />
      <x-text-input wire:model="password_confirmation" id="password_confirmation" name="password_confirmation" type="password" class="block w-full mt-1" autocomplete="new-password" />
      <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
    </div>
    <div class="flex items-center gap-4">
      <x-primary-button>{{ __('Guardar') }}</x-primary-button>

      <x-action-message class="mr-3" on="password-updated">
          {{ __('Guardado.') }}
      </x-action-message>
    </div>
  </form>
</section>
