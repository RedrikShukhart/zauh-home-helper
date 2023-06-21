<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Zh_helpers\TableContent\TableContent;

class TableListController extends Controller
{
    public function index($tableName)
    {
        //по переменной tableName узнаем, какую именно категорию мы получили и нам надо показать
        // по ней находим запись в БД function какой-то нужен
        // получяаем данные из БД 
        $table = new TableContent();
        $content = $table->getAllContent($tableName);
        
        return view('table-list.index', compact('content'));
    }
    
    public function create()
    {
        echo 'создание элемента';
    }

    public function edit($tableName, $id)
    {
        $table = new TableContent();
        $content = $table->getContent($id);

        return view('table-list.edit', compact('content', 'id'));
    }

    public function update(Request $request,  $id)
    {
        $validatetContent = $request->validate([
            'title' => ['required', 'string', 'max:128'],
            'id' => ['required', Rule::exists('zh_cards', 'id')],
            'short_description' => ['required', 'string']            
        ]);

        $dataToUpdate = getUpdateData($validatetContent);

        $content = new TableContent();
        $content->updateContent($id, $dataToUpdate);

        return redirect()->back();
    }

    public function delete($tableName, Request $request)
    {
        dump($request);
        echo 'удаление элемента';
    }
}
