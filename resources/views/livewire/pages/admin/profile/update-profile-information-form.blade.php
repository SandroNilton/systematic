<?php

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Validation\Rule;
use Livewire\Volt\Component;

new class extends Component
{
  public string $name = '';
  public string $email = '';

  public function mount(): void
  {
    $this->name = auth()->user()->name;
    $this->email = auth()->user()->email;
  }

  public function updateProfileInformation(): void
  {
    $user = auth()->user();

    $validated = $this->validate([
      'name' => ['required', 'string', 'max:255'],
      'email' => ['required', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
    ]);

    $user->fill($validated);

    if ($user->isDirty('email')) {
      $user->email_verified_at = null;
    }

    $user->save();

    $this->dispatch('profile-updated', name: $user->name);
  }

  public function sendVerification(): void
  {
    $user = auth()->user();

    if ($user->hasVerifiedEmail()) {
      $path = session('url.intended', RouteServiceProvider::HOME);

      $this->redirect($path);

      return;
    }

    $user->sendEmailVerificationNotification();

    session()->flash('status', 'verification-link-sent');
  }
}; 

?>

<section class="bg-white rounded-[3.5px] shadow-sm pt-3 pb-3 pl-3 pr-3">
  <header>
    <p class="mt-1 text-[13px] font-medium leading-4 align-middle self-center">
      {{ __("Actualice la información del perfil y la dirección de correo electrónico de su cuenta.") }}
    </p>
  </header>
  <form wire:submit="updateProfileInformation" class="mt-4 space-y-3">
    <div>
      <x-input-label for="name" :value="__('Nombre')" />
      <x-text-input wire:model="name" id="name" name="name" type="text" class="block w-full mt-1" required autofocus autocomplete="name" />
      <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>
      <div>
        <x-input-label for="email" :value="__('Correo electrónico')" />
        <x-text-input wire:model="email" id="email" name="email" type="email" class="block w-full mt-1" required autocomplete="username" />
        <x-input-error class="mt-2" :messages="$errors->get('email')" />
          @if (auth()->user() instanceof MustVerifyEmail && ! auth()->user()->hasVerifiedEmail())
            <div>
                <p class="mt-2 text-sm text-gray-800 dark:text-gray-200">
                  {{ __('Your email address is unverified.') }}
                  <button wire:click.prevent="sendVerification" class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    {{ __('Click here to re-send the verification email.') }}
                  </button>
                </p>
                @if (session('status') === 'verification-link-sent')
                  <p class="mt-2 text-sm font-medium text-green-600 dark:text-green-400">
                   {{ __('A new verification link has been sent to your email address.') }}
                  </p>
                @endif
            </div>
          @endif
        </div>
        <div class="flex items-center gap-4">
          <x-primary-button>{{ __('Guardar') }}</x-primary-button>
          <x-action-message class="mr-3" on="profile-updated">
            {{ __('Guardado.') }}
          </x-action-message>
        </div>
    </form>
</section>
