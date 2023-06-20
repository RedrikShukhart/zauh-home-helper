@extends('layouts.main-categories')

@section('page.title', config('app.name') . '. Название конкретной карточки')

@section('main-categories.content')
    <x-title>
        {{ __('Название конкретной карточки') }}
    </x-title>

    <div class="d-flex container p-2">
        <div class="container mb-2" style="width: 60%; height: 600px;">
        <!-- Photos album -->
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="https://klike.net/uploads/posts/2019-06/1561011201_21.jpg" class="d-block w-100" style="height: 500px;" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://shutok.ru/uploads/posts/2021-04/1619616295_1619541505147846521.jpg" class="d-block w-100" style="height: 500px;" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="https://otvet.imgsmail.ru/download/u_cf683ecf41bdd5801cf4ca9f783e4c12_800.jpg" class="d-block w-100" style="height: 500px;" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <div class="container" style="width: 40%">
            <h2 class="h4 fw-light">Ingridients or Features</h2>
            <table class="table table-striped table-hover">
                <tbody>
                    <thead>
                    <tr>
                        <th scope="col">Product name</th>
                        <th scope="col">Amount</th>
                    </tr>
                    </thead>
                    <?php for($i = 1; $i <= 11; $i++): ?>
                    <tr>
                        <td>Some product name</td>
                        <td>6 g / l / etc</td>
                    </tr>
                <?php endfor; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="container py-2">
        <h2 class="h4 fw-light">Description</h2>
        <p>Подготовим продукты. Я взяла говядину.
        Огурцы лучше подойдут соленые
        бочковые, у меня были только
        корнишоны, я взяла их.</p>
        <p>Мясо надо обмыть и хорошенько
        обсушить бумажными полотенцами.
        Затем его надо нарезать брусочками, как
        на обычный гуляш. Не забываем, что
        мясо нарезается поперек волокон, чтобы
        при жарке оно оставалось мягким.</p>
        <p>На сковороде разогреваем растительное
        масло и кидаем в него мясо</p>
        <p>Нам надо обжарить мясо, как бы
        запечатывая внутри него сок, чтобы оно
        осталось мягким. Интенсивно мешаем
        мясо, чтобы оно обжарилось со всех
        сторон.</p>
        <p>Лук чистим, нарезаем тонкой соломкой
        Кидаем лук к мясу, перемешиваем,
        продолжаем жарить.</p>
        <p>Морковь моем, чистим, трем на крупной
        терке. Добавляем морковь к мясу с
        луком, перемешиваем, продолжаем
        жарить.</p>
        <p>Огурцы нарезаем тонкой соломкой,
        помидоры режем кубиками...</p>
        <p>Добавляем огурцы и помидоры в мясо,
        перемешиваем.</p>
        <p>Кладем томатную пасту, солим,
        приправляем. Осторожнее с солью.</p>
        <p>Огурцы соленые, они отдадут часть соли
        при тушении, лучше посолите сначала
        немного, а уже в конце, попробовав, при
        необходимости добавите соли...</p>
    </div>

    <div class="container py-1">
        <a class="h5 fw-light" href="#">Original soiurce link</a>
    </div>

@endsection