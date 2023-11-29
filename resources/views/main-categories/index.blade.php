@extends('layouts.main-categories')

@section('page.title', config('app.name') . '. ' . $parent->full_name)

@section('main-categories.content')
    {{ Breadcrumbs::render('main-category', $parent) }}

{{-- {{$mainCategory}} --}}

тут что-то должно быть, пока не уверена, что именно и в каком виде
    <p></p>
скорее всего тут будет некое дерево с ссылками, но ссылки только на концы веток
@endsection

