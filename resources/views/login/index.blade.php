@extends('layouts.auth')

@section('page.title', 'Авторизация')

@section('auth.content')

    <div class="card mb-3 ">

        {{--header form--}}
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h4 class="m-0">
                    {{ __('Вход') }}
                </h4>
            </div>
        </div>
        {{--end header form--}}

        {{--action form--}}
        <div class="card-body">
            <form action="{{ route('login.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label class="mb-2 required">
                        {{ __('Email') }}
                    </label>
                    <input type="email" name="email" class="form-control" autofocus>
                </div>

                <div class="mb-3">
                    <label class="mb-2 required">
                        {{ __('Password') }}
                    </label>
                    <input type="password" name="password" class="form-control">
                </div>

                <div class="mb-3">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="remember" name="remember">
                        <label class="form-check-label" for="remember">
                            {{ __('Запомнить') }}
                        </label>
                    </div>
                </div>

                <button class="btn btn-dark" type="submit">
                    {{ __('Войти') }}
                </button>
            </form>
        </div>
        {{--end action form--}}

    </div>

@endsection
