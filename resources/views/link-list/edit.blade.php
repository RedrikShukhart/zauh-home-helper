@extends('layouts.main-categories')

@section('page.title', config('app.name') . '. ' . $title)

@section('main-categories.content')
    <x-title-left>
        {{ __('Редактирование: ') . $content->title }}
    </x-title-left>

    <div class="conteiner ms-2 pt-4">
        <x-form action="{{ route('link-list.update', [$id]) }}" method="put" enctype="multipart/form-data">

            <x-input type="hidden" name="id" value="{{ $content->id }}"></x-input>
            {{-- потом поправить на оповещание "ошибка записи" --}}
            <x-error name="id" />

            <x-form-item>
                <x-label id="title" required>{{ $vars->title ?? '' }}</x-label>
                <div class="col-sm-5">
                    <x-input name="title" value="{{ $content->title ?? '' }}" required></x-input>
                    <x-error name="title" />
                </div>
            </x-form-item>

            <x-form-item>
                <x-label id="description" required>{{ $vars->description ?? '' }}</x-label>
                <div class="col-sm-5">
                    <x-textarea name="description" rows="10"  required>
                        {{ $content->description ?? '' }}
                    </x-textarea>
                    <x-error name="description" />
                </div>
            </x-form-item>

            <x-button type="submit" color="dark">
                {{ __('Сохранить') }}
            </x-button>
        </x-form>
    </div>
@endsection