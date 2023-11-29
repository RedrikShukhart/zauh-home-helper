@extends('layouts.main-categories')

@section('page.title', config('app.name') . '. ' . $title)


@section('main-categories.content')
<div class="container">
    @if(!empty($parents))
        {{ Breadcrumbs::render('child-category', 'table-list', $title, $parents) }}
    @endif
    <x-title>
        {{ $title }}
    </x-title>

    <div class="d-flex justify-content-end">
        <x-button-link href="{{ route('table-list.create', $tableName) }}">
            {{ __('Добавить') }}
        </x-button-link>
    </div>

    {{-- pagination --}}
    @if(!empty($content))
        <x-lists.table-list :vars="$vars" :content="$content" />
        {{ $content->links() }}
    @endif
</div>
@endsection
