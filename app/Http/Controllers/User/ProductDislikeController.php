<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductDislikeController extends Controller
{
    public function index()
    {
        return 'Страница не понравившихся продуктов';
    }

    public function create()
    {
        return 'Страница создания не понравившихся продуктов';
    }

    public function store()
    {
        return 'Запрос создания не понравившихся продуктов';
    }

    public function show($product)
    {
        return "Страница просмотра не понравившихся продуктов $product";
    }

    public function edit($product)
    {
        return "Страница изменения не понравившихся продуктов $product";
    }

    public function update()
    {
        return 'Запрос изменения не понравившихся продуктов';
    }

    public function destroy()
    {
        return 'Запрос удаления не понравившихся продуктов';
    }
}
