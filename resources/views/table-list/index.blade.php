@extends('layouts.main-categories')

@section('page.title', config('app.name') . '. ' . $title)


@section('main-categories.content')
<div class="container">
    <x-title>
        {{ $title }}
    </x-title>

    <x-button-link href="{{ route('table-list.create', $tableName) }}">
        {{ __('Добавить') }}
    </x-button-link>

    <x-lists.table-list :vars="$vars" :content="$content" />

    {{ $content->links() }}
</div>
@endsection
