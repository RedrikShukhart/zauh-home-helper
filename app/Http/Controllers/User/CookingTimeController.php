<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CookingTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return 'Страница список время готовки продуктов и описания процессов';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return 'Страница создания время готовки у продукта и описание процесса';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return 'Запрос создания время готовки у продукта и описание процесса';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        return "Страница просмотра время готовки у продукта и описание процесса $id";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        return "Страница изменения время готовки у продукта и описание процесса $id";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        return 'Запрос изменения время готовки у продукта и описание процесса';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        return 'Запрос удаления время готовки у продукта и описание процесса';
    }
}
