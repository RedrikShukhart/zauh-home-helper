@extends('layouts.main-categories')

@section('page.title', config('app.name') . '. Table-list')


@section('main-categories.content')
    <x-title>
        {{ __('Таблица table-list') }}
    </x-title>


    <x-lists.table-list :content="$content" />
    
@endsection
