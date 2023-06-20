@extends('layouts.main-settings')

@section('page.title', config('app.name') . '. Profile')

@section('main-settings.content')
    <div class="container mx-4">
        <x-title-left>
            {{ __('Profile page')}}
        </x-title-left>
        <x-form action="{{ route('profile.edit') }}" class="w-50 p-3">
              <x-form-item>
                {{-- <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label> --}}
                <x-label for="email" required>{{ __('Почта') }}</x-label>
                <div class="col-sm-10">
                  {{-- <input type="email" class="form-control" id="email"> --}}
                  <x-input type="email" name="email" id="email" value="{{ $user->email }}"/>
                    <x-error name="email" />
                </div>
              </x-form-item>

              <x-form-item>
                <x-label for="current_password" >{{ __('Текущий пароль') }}</x-label>
                <div class="col-sm-10">
                  <x-input type="password" name="current_password" id="current_password" />
                  <x-error name="current_password" />
                </div>
              </x-form-item>

              <x-form-item>
                <x-label for="new_password">{{ __('Новый пароль') }}</x-label>
                <div class="col-sm-10">
                  <x-input type="password" name="new_password" id="new_password" />
                  <x-error name="new_password" />
                </div>
              </x-form-item>

              <x-form-item>
                <x-label for="name" required>{{ __('Имя') }}</x-label>
                <div class="col-sm-10">
                  <x-input name="name" id="name" value="{{ $user->name }}" />
                    <x-error name="name" />
                </div>
              </x-form-item>

              <x-form-item>
                <x-label for="phone">{{ __('Телефон') }}</x-label>
                <div class="col-sm-10">
                  <x-input type="phone" name="phone" id="phone" value="{{ $user->phone }}" />
                    <x-error name="phone" />
                </div>
              </x-form-item>

              <x-form-item>
                <x-label for="telegram">{{ __('Телеграм') }}</x-label>
                <div class="col-sm-10">
                  <x-input name="telegram" id="telegram" value="{{ $user->telegram }}" />
                    <x-error name="telegram" />
                </div>
              </x-form-item>
          
              <x-button>{{ __('Сохранить') }}</x-button>

        </x-form>
    </div>
    
@endsection