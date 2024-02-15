@extends('layouts.main-categories')

@section('page.title', config('app.name') . '. ' . $title)

@section('main-categories.content')
    @if(!empty($parents))
        {{ Breadcrumbs::render('child-category', 'album', $title, $parents) }}
    @endif

    <x-title>
        {{ $title }}
    </x-title>

{{--    <div class="d-flex justify-content-end">--}}
        <x-button-link href="{{ route('album.create', $albumName) }}">
            {{ __('Добавить') }}
        </x-button-link>
{{--    </div>--}}

    <section class="text-center container border">
        <div class="row py-lg-2">
            <div class="col-lg-6 col-md-8 mx-auto">
                <p class="lead text-body-secondary">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-body-tertiary ">
        <div class="container-xxl border">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                {{-- Временно цикл for до того, как будем это получать из БД, потом переделать --}}
                <?php for($i = 1; $i <= 8; $i++): ?>
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Products photo, like or dislike</text></svg>
                        <div class="card-body">
                            <p class="card-text">Short description, why this product like or dislike</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Delete</button>
                                </div>
                                <small class="text-body-secondary">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>

        <!-- сюда будем передавать количество страниц для пагинации -->
@endsection
