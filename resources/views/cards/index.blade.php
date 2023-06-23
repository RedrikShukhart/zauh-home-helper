@extends('layouts.main-categories')

@section('main-categories.content')
    <x-title>
        {{ __('Список постов') }}
    </x-title>

    <x-filters>
        <!-- наименования с ссылками дл фильтров -->
    </x-filters>

    <div class="album py-5">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
            {{-- Временно цикл for до того, как будем это получать из БД, потом переделать --}}
            @for ($i = 1; $i <= 13; $i++)
                <div class="col">
                    <div class="card" style="width: 18rem;">

                        <img class="bd-placeholder-img card-img-top" width="100%" height="200" src="..." class="card-img-top" alt="Main photo preview">

                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Add to shop list</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           @endfor 
        </div>
    </div>

    {{-- <x-pagination>
        <!-- сюда будем передавать количество страниц для пагинации -->
    </x-pagination> --}}
@endsection