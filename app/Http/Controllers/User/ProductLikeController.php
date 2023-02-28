<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductLikeController extends Controller
{
    public function index()
    {
        return 'Страница понравившихся продуктов';
    }

    public function create()
    {
        return 'Страница создания понравившихся продуктов';
    }

    public function store()
    {
        return 'Запрос создания понравившихся продуктов';
    }

    public function show($product)
    {
        return "Страница просмотра понравившихся продуктов $product";
    }

    public function edit($product)
    {
        return "Страница изменения понравившихся продуктов $product";
    }

    public function update()
    {
        return 'Запрос изменения понравившихся продуктов';
    }

    public function destroy()
    {
        return 'Запрос удаления понравившихся продуктов';
    }
}
