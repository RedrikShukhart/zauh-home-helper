<?php

namespace App\Http\Controllers;

use App\Models\Zh_cards;
use Illuminate\Http\Request;

class TableListController extends Controller
{
    public function index($tableName)
    {

        //по переменной tableName узнаем, какую именно категорию мы получили и нам надо показать
        // по ней находим запись в БД function какой-то нужен
        // получяаем данные из БД 
        return view('table-list.index');
    }
    
    public function create()
    {
        echo 'создание элемента';
    }

    public function edit($tableName, $id)
    {
        $text = "Страница изменения карточки  $tableName, $id";

        $userId = 1;
        $tableData = Zh_cards::query()
            ->where('user_id', $userId)
            ->findOrFail($id,
                [
                    'id',
                    'title',
                    'description',
                ]);

        return view('table-list.edit', compact('tableData', 'id'));
    }

    public function update(Request $request, $tableName, $id)
    {
        // dd($tableName);
        alert("Сохранено $tableName , $id", 'S');
        return redirect()->back();
        // return "Запрос изменения карточки $tableName , $id";
    }

    public function delete($tableName, Request $request)
    {
        dump($request);
        echo 'удаление элемента';
    }
}
