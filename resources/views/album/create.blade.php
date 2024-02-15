@extends('layouts.main-categories')

@section('page.title', config('app.name') . '. ' . $title)

@section('main-categories.content')
    @if(!empty($parents))
        {{ Breadcrumbs::render('card-new', 'album.create', __('Добавление новой записи'), $parents) }}
    @endif
    <x-title-left>
        {{ $title . __('. Добавить новую запись ') }}
    </x-title-left>
    <div class="conteiner ms-2 pt-4">
        <x-form action="{{ route('album.store', $albumName) }}" method="post" enctype="multipart/form-data">
            <x-input type="hidden" name="route_name" value="{{ $albumName }}"></x-input>

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

            <x-form-item>
                <x-label required>{{ __('Выберите фото') }}</x-label>
                <div class="col-sm-5">
                    <x-input name="photo" id="photo" type="file" required></x-input>
                </div>
            </x-form-item>

            <x-button type="submit" color="dark">
                {{ __('Сохранить') }}
            </x-button>
        </x-form>
    </div>
@endsection
