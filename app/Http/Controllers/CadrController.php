<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadrController extends Controller
{
    //
    public function index($card)
    {
        print_r($card);
        return view('cards.index');
    }

    public function create()
    {
        return 'Страница создания карточки';
    }

    public function store()
    {
        return 'Запрос создания карточки';
    }

    public function show($card)
    {
        # code...cards.show Страница просмотра карточки
        return view('cards.show');
    }

    public function edit($card, $id)
    {
        return "Страница изменения карточки $card";
    }

    public function update($card, $id)
    {
        return 'Запрос изменения карточки';
    }

    public function delete()
    {
        return 'Запрос удаления карточки';
    }
}
