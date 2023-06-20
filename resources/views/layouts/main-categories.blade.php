@extends('layouts.base')

@section('content')
    <div class="d-flex">

        @include('includes.menu-left')

        <div class="flex-grow-1">
            @include('includes.breadcrumbs')
            
            @yield('main-categories.content')
        </div>

    </div>
@endsection
