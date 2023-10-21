<?php

#
use App\Models\User;
use App\Models\Area;
use App\Models\Role;

#
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

#
use Livewire\Volt\Component;
use function Livewire\Volt\{state};

new class extends Component
{
  public $areas = [];
  public $roles = [];
  public $roles_sel = [];

  public string $name = '';
  public string $email = '';
  public string $area = '';
  public string $password = '';
  public string $password_confirmation = '';
  public string $state;

  protected $rules = [
    'name' => 'required',
    'email' => 'required|email|unique:users',
    'area' => 'required',
    'password' => 'required',
    'password_confirmation' => 'required|same:password',
  ];

  public function mount(): void 
  {
    $this->reset(['name', 'email', 'password', 'password_confirmation']);
    $this->roles = Role::all();
    $this->areas = Area::all();
    
  }
  
  public function createUser(): void
  {
    $this->validate();
  }
  
};

?>

<div>
  <div class="flex items-start justify-between py-1.5 px-3 border-b">
    <span class="self-center text-[13px] font-medium leading-4">
      <ion-icon wire:ignore name="person-outline" class="mr-1"></ion-icon> Nuevo usuario
    </span>
    <button type="button" x-on:click="show = false" class="inline-flex items-center justify-center w-6 h-6 ml-auto text-lg bg-transparent" data-modal-hide="staticModal">
      <ion-icon name="close-circle-outline"></ion-icon>
    </button>
  </div>
  <div>
    <form wire:submit.prevent="createUser">
      <div class="w-full mb-4 md:w-2/3 lg:w-3/4 pt-3 pb-3 pl-3 pr-3 space-y-1.5">
        <div>
          <x-input-label for="name" :value="__('Name')" />
          <x-text-input wire:model="name" id="name" name="name" type="text" class="block w-full mt-1" autofocus autocomplete="name" />
          <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>
        <div>
          <x-input-label for="email" :value="__('Email')" />
          <x-text-input wire:model="email" id="email" name="email" type="text" class="block w-full mt-1" autocomplete="username" />
          <x-input-error class="mt-2" :messages="$errors->get('email')" />      
        </div>
        <div>
          <x-input-label for="password" :value="__('Contraseña')" />
          <x-text-input wire:model="password" id="password" name="password" type="password" class="block w-full mt-1" />
          <x-input-error class="mt-2" :messages="$errors->get('password')" />      
        </div>
        <div>
          <x-input-label for="password_confirmation" :value="__('Confirmacion de contraseña')" />
          <x-text-input wire:model="password_confirmation" id="password_confirmation" name="password_confirmation" type="password" class="block w-full mt-1" />
          <x-input-error class="mt-2" :messages="$errors->get('password_confirmation')" />      
        </div>
      </div>
      <div class="w-full pt-3 pb-3 pl-3 pr-3 md:w-1/3 lg:w-1/4">
      </div>


      <x-primary-button>{{ __('Save') }}</x-primary-button>

      <x-action-message class="mr-3" on="profile-updated">
          {{ __('Saved.') }}
      </x-action-message>

    </form>

    
      <div class="w-full mb-4 md:w-2/3 lg:w-3/4">
        <div class="w-full p-[12px]">
          <div class="mb-3">
            <input wire:model="name" type="text" name="name" placeholder="Nombre" class="w-full py-1.5 text-[13px] text-[#414d6a] leading-4 rounded-[3px] border-[#cdd5de] focus:border-inherit focus:ring-0 @if($errors->has('name')) border-[#d72d30] @endif"/>
            @error('name')
              <span class="text-xs scale-75 text-[#d72d30] mb-0 mt-0.5">{{ $message }}</strong>
            @enderror
          </div>
          <div class="mb-3">
            <input wire:model="email" type="email" name="email" placeholder="Correo electronico" class="w-full py-1.5 text-[13px] text-[#414d6a] leading-4 rounded-[3px] border-[#cdd5de] focus:border-inherit focus:ring-0 @if($errors->has('email')) border-[#d72d30] @endif"/>
            @error('email')
              <span class="text-xs scale-75 text-[#d72d30] mb-0 mt-0.5">{{ $message }}</strong>
            @enderror
          </div>
          <div class="mb-3">
            <select wire:model="area" name="area" class="w-full py-1.5 text-[13px] text-[#414d6a] leading-4 rounded-[3px] border-[#cdd5de] focus:border-inherit focus:ring-0 @if($errors->has('area_id')) border-[#d72d30] @endif">
              <option value=""> Seleccione el área </option>
              @foreach ($areas as $area)
                <option value="{{ $area->id }}">{{ $area->name }}</option>
              @endforeach
            </select>
            @error('area_id')
              <span class="text-xs scale-75 text-[#d72d30] mb-0 mt-0.5">{{ $message }}</strong>
            @enderror
          </div>
          <div class="mb-3">
            <input wire:model="password" type="password" name="password" pattern="^(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$" placeholder="Contraseña" class="w-full py-1.5 text-[13px] text-[#414d6a] leading-4 rounded-[3px] border-[#cdd5de] focus:border-inherit focus:ring-0 @if($errors->has('password')) border-[#d72d30] @endif"/>
            @error('password')
              <span class="text-xs scale-75 text-[#d72d30] mb-0 mt-0.5">{{ $message }}</strong>
            @enderror
          </div>
          <div class="mb-3">
            <input wire:model="password_confirmation" type="password" name="password_confirmation" pattern="^(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$" value="{{ old('password_confirmation') }}" placeholder="Confirma contraseña" class="w-full py-1.5 text-[13px] text-[#414d6a] leading-4 rounded-[3px] border-[#cdd5de] focus:border-inherit focus:ring-0 @if($errors->has('password_confirmation')) border-[#d72d30] @endif"/>
            @error('password_confirmation')
              <span class="text-xs scale-75 text-[#d72d30] mb-0 mt-0.5">{{ $message }}</strong>
            @enderror
          </div>
          <div class="mb-2">
            <select wire:model="state" name="state" class="w-full py-1.5 text-[13px] text-[#414d6a] leading-4 rounded-[3px] border-[#cdd5de] focus:border-inherit focus:ring-0">
              <option value="activo">Activo</option>
              <option value="inactivo">Inactivo</option>
            </select>
          </div>
          @can('admin.users.create')
            <div class="mb-2">
              <button type="submit" class="text-[#0d8a72] rounded-[3px] text-[13px] leading-4 items-center inline-flex gap-1 align-middle"><ion-icon name="add-outline" wire:ignore></ion-icon> Guardar</button>
            </div>
          @endcan
          <div class="text-[13px] items-center inline-flex gap-1 align-middle">
            <ion-icon name="information-outline" class="text-[#0d8a72]" wire:ignore></ion-icon>
            <span class="text-[#414d6a]">La contraseña debe contener de 8 a más carácteres con una combinación de letras, números, mayúsculas y símbolos.</span>
          </div>
        </div>
      </div>
      <div class="w-full md:w-1/3 lg:w-1/4">
        <div class="border border-[#cdd5de] bg-white rounded-[3px]">
          <div class="w-full flex justify-between items-center py-2 px-3 border-b border-[#cdd5de]">
            <span class="text-[13px] leading-4 text-[#414d6a]">Roles de usuario</span>
          </div>
          <div class="w-full p-[12px]">
            @foreach ($roles as $rol)
              <div class="flex items-center justify-start gap-3 mb-2">
                {!! Form::checkbox('roles[]', $rol->id, null, ['class' => 'w-4 h-4 text-[#0d8a72] rounded-[3px] border border-[#cdd5de] accent-[#cdd5de] focus:accent-[#cdd5de] focus:ring-0', 'wire:model.lazy="roles_val"']) !!}
                <label class="text-[13px] text-[#414d6a] leading-4">{{ $rol->name }}</label>
              </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Save') }}</x-primary-button>

        <x-action-message class="mr-3" on="profile-updated">
            {{ __('Saved.') }}
        </x-action-message>
    </div>
    </form>
  </div>
</div>
