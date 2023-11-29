@extends('layouts.base')

@section('content')
    <div class="d-flex">

        @include('includes.menu-left')

        <div class="flex-grow-1">
            {{-- @unless(Route::currentRouteName() === 'home' )
                @include('includes.breadcrumbs')
            @endunless --}}

            @yield('main-categories.content')
        </div>

    </div>
@endsection
