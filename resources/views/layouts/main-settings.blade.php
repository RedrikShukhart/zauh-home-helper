@extends('layouts.base')

@section('content')
    <div class="d-flex">
        @include('includes.menu-left')

        <div class="flex-grow-1 dflex-column">
            <div class="">
                @unless(Route::currentRouteName() === 'home' )
                    {{ Breadcrumbs::render(Route::currentRouteName()) }}
                @endunless
            </div>
            
            <div class="pt-1">
                @yield('main-settings.content')
            </div>
        </div>
    </div>
@endsection
