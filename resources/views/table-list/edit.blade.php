@extends('layouts.main-categories')

@section('page.title', config('app.name') . '. Table-list')


@section('main-categories.content')
    <x-title-left>
        {{ __('Редактирование table-list') }}
    </x-title-left>
    <div class="conteiner ms-2 pt-4">
            <x-form action="{{ route('table-list.update', ['time-cook', $id]) }}" method="put" enctype="multipart/form-data">
            <x-form-item>
                <x-label required>{{ __('Title') }}</x-label>
                <div class="col-sm-5">
                    <x-input name="title" value="{{ $tableData->title }}" required></x-input>
                    <x-error name="title" />
                </div>
            </x-form-item>

            <x-form-item>
                <x-label required>{{ __('Cook time') }}</x-label>
                <div class="col-sm-5">
                    <x-input name="description" value="{{ $tableData->description }}" required></x-input>
                    <x-error name="description" />
                </div>
            </x-form-item>
            <x-button type="submit" color="dark">
                {{ __('Сохранить') }}
            </x-button>
        </x-form>
    </div>
    
@endsection
