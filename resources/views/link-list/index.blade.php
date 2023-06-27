@extends('layouts.main-categories')

@section('page.title', config('app.name') . '. ' . $title)

@section('main-categories.content')
    <div class="container">
        <x-title>
            {{ $title }}
        </x-title>
    </div>

    <div class="d-flex container">
        <div class="w-75 pe-5 me-5">
            @if(!empty($content))
                <x-list-group :content="$content" />
            @endif
        </div>
        <div class="w-25 ps-5 ms-5">
            <x-button-link href="{{ route('linklist.create', $listName) }}">
                {{ __('Добавить') }}
            </x-button-link>
        </div>
    </div>
@endsection
