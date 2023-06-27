@extends('layouts.main-categories')

@section('page.title', config('app.name') . '. ' . $content->title)

@section('main-categories.content')
    <div class="container">

        <div class="ms-3">
            <x-title-left>
                {{ $content->title }}
            </x-title-left>
        </div>

        <div>
            <p class="fw-normal lh-lg pt-2 m-4">
                {{ $content->description }}
            </p>
        </div>

        <div class="d-flex ms-3 pt-0">
            <div class="pe-1 me-2">
                <x-button-link size="sm" href="{{ route('link-list.edit', [$content->route_name, $content->id])}}">
                    {{ __('Редактировать') }}
                </x-button-link>
            </div>
            <div class="ps-1 ms-2 ">
                <x-button-delete size="sm" action="{{ route('link-list.delete', [$listName, $id]) }}">
                    {{ __('Удалить') }}
                </x-button-delete>
            </div>
        </div>

    </div>
@endsection