@extends('layouts.main-categories')

@section('page.title', config('app.name') . '. Link-list')


@section('main-categories.content')
    <x-title>
        {{ __('Список link-list') }}
    </x-title>

    @foreach($links as $link)
        <x-list-group :link="$link" />
    @endforeach
@endsection

