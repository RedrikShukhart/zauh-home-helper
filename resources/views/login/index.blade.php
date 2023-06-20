@extends('layouts.auth')

@section('page.title', config('app.name') . '. Страница входа')

@section('auth.content')
    <x-auth-forms.card-form>
        <x-auth-forms.header>
            <x-auth-forms.title>
                {{ __('Вход') }}
            </x-auth-forms.title>
        </x-auth-forms.header>

        <x-auth-forms.body>
            <x-auth-forms.form action="{{ route('login.store') }}">
                <x-auth-forms.form-item>
                    <x-auth-forms.label>{{ __('Почта') }}</x-auth-forms.label>
                    <x-auth-forms.input type="email" name="email" value="{{ old('email') }}" autofocus/>
                    <x-error name="email" />
                </x-auth-forms.form-item>

                <x-auth-forms.form-item>
                    <x-auth-forms.label>{{ __('Пароль') }}</x-auth-forms.label>
                    <x-auth-forms.input type="password" name="pass"/>
                    <x-error name="pass" />
                </x-auth-forms.form-item>

                <x-checkbox name="remember">
                    {{ __('Запомнить меня') }}
                </x-checkbox>

                <x-auth-forms.button type="submit" color="dark">
                    {{ __('Войти') }}
                </x-auth-forms.button>
            </x-auth-forms.form>
        </x-auth-forms.body>
    </x-auth-forms.card-form>

@endsection
