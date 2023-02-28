<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class RecipeController extends Controller
{
    //
    public function index()
    {
        return 'Страница список рецептов';
    }

    public function create()
    {
        return 'Страница создания рецепта';
    }

    public function store()
    {
        return 'Запрос создания рецепта';
    }

    public function show($recipe)
    {
        return "Страница просмотра рецепта $recipe";
    }

    public function edit($recipe)
    {
        return "Страница изменения рецепта $recipe";
    }

    public function update()
    {
        return 'Запрос изменения рецепта';
    }

    public function destroy()
    {
        return 'Запрос удаления рецепта';
    }

}
