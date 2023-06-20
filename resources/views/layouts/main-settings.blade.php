@extends('layouts.base')

@section('content')
    <div class="d-flex">

        @include('includes.menu-left')

        @yield('main-settings.content')

    </div>
@endsection
