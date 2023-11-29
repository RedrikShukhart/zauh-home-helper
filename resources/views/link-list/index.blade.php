@extends('layouts.main-categories')

@section('page.title', config('app.name') . '. ' . $title)

@section('main-categories.content')
    <div class="container">
        @if(!empty($parents))
            {{ Breadcrumbs::render('child-category', 'link-list', $title, $parents) }}
        @endif
        <x-title>
            {{ $title }}
        </x-title>
    </div>

    <div class="d-flex container">
        <div class="w-75 pe-5 me-5">
            @if(!empty($content))
                <x-lists.list-group :content="$content" />
            @endif
        </div>

        <div class="w-25 ps-5 ms-5">
            <x-button-link href="{{ route('linklist.create', $listName) }}">
                {{ __('Добавить') }}
            </x-button-link>
        </div>
    </div>

    {{-- pagination --}}
    @if(!empty($content))
        {{ $content->links() }}
    @endif
@endsection
