@extends('layouts.main-categories')

@section('page.title', config('app.name') . '. ' . $title)


@section('main-categories.content')
    <x-title-left>
        {{ $title . __('. Добавить новую запись ') }}
    </x-title-left>
    <div class="conteiner ms-2 pt-4">
        <x-form action="{{ route('table-list.store', $tableName) }}" method="post" enctype="multipart/form-data">
            <x-input type="hidden" name="route_name" value="{{ $tableName }}"></x-input>
            <x-form-item>
                <x-label required>{{ $vars->title ?? '' }}</x-label>
                <div class="col-sm-5">
                    <x-input name="title" value="{{ old('title') }}" required></x-input>
                    <x-error name="title" />
                </div>
            </x-form-item>

            <x-form-item>
                <x-label required>{{ $vars->description ?? '' }}</x-label>
                <div class="col-sm-5">
                    <x-input name="short_description" value="{{ old('short_description') }}" required></x-input>
                    <x-error name="short_description" />
                </div>
            </x-form-item>

            <x-button type="submit" color="dark">
                {{ __('Сохранить') }}
            </x-button>
        </x-form>
    </div>
    
@endsection
