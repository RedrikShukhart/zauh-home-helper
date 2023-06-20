@extends('layouts.auth')

@section('page.title', config('app.name') . '. Регистрация')

@section('auth.content')
    <x-auth-forms.card-form>
        <x-auth-forms.header>
            <x-auth-forms.title>
                {{ __('Регистрация') }}
            </x-auth-forms.title>
        </x-auth-forms.header>

        <x-auth-forms.body>
            <x-auth-forms.form action="{{ route('register.store') }}">
                <x-auth-forms.form-item>
                    <x-auth-forms.label>{{ __('Имя') }}</x-auth-forms.label>
                    <x-auth-forms.input name="name" value="{{ request()->old('name') }}" autofocus/>
                    <x-error name="name" />
                </x-auth-forms.form-item>

                <x-auth-forms.form-item>
                    <x-auth-forms.label>{{ __('Почта') }}</x-auth-forms.label>
                    <x-auth-forms.input type="email" name="email" value="{{ old('email') }}"/>
                    <x-error name="email" />
                </x-auth-forms.form-item>

                <x-auth-forms.form-item>
                    <x-auth-forms.label>{{ __('Пароль') }}</x-auth-forms.label>
                    <x-auth-forms.input type="password" name="password"/>
                    <x-error name="password" />
                </x-auth-forms.form-item>

                <x-auth-forms.form-item>
                    <x-auth-forms.label>{{ __('Подтверждение пароля') }}</x-auth-forms.label>
                    <x-auth-forms.input type="password" name="password_confirmation"/>
                    <x-error name="password_confirmation" />
                </x-auth-forms.form-item>


                <x-auth-forms.button type="submit" color="dark">
                    {{ __('Зарегистрироваться') }}
                </x-auth-forms.button>

            </x-auth-forms.form>
        </x-auth-forms.body>
    </x-auth-forms.card-form>
@endsection
