<?php

namespace App\Http\Controllers;

use App\Models\Zh_categories;
use App\Zh_helpers\Categories\Categories;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Zh_helpers\TableContent\TableContent;

class TableListController extends Controller
{
    //для этого свойства нужно получение айди уже потом по авторизации, пока так
    public $userId = 1;

    public function index($tableName)
    {
        $parents = Zh_categories::getParentsForChildCategory($tableName);

        $vars = Categories::getViewsValuesOnCategoryId($tableName);
        $title = Zh_categories::getCategoryNameOnRouteName($tableName);

        $table = new TableContent();
        $content = $table->getAllContent($tableName, $this->userId);

        return view('table-list.index', compact('content', 'tableName', 'title', 'vars'))->with('parents', $parents);
    }

    public function create($tableName)
    {
        $title = Zh_categories::getCategoryNameOnRouteName($tableName);
        $vars = Categories::getViewsValuesOnCategoryId($tableName);

        return view('table-list.create', compact('tableName', 'title', 'vars'));
    }

    public function store($tableName, Request $request)
    {
        $validatedContent = $request->validate([
            'title' => ['required', 'string', 'max:128'],
            'short_description' => ['required', 'string']
        ]);

        TableContent::addContent($tableName, $validatedContent, $this->userId);

        return redirect()->route('table-list', $tableName);
    }

    public function edit($tableName, $id)
    {
        $parents = Zh_categories::getParentsForCard($tableName);
        $title = Zh_categories::getCategoryNameOnRouteName($tableName);
        $vars = Categories::getViewsValuesOnCategoryId($tableName);

        $table = new TableContent();
        $content = $table->getContent($id, $this->userId);

        return view('table-list.edit', compact('title', 'vars', 'content', 'id'))->with('parents', $parents);
    }

    public function update(Request $request,  $id)
    {
        $validatedContent = $request->validate([
            'title' => ['required', 'string', 'max:128'],
            'id' => ['required', Rule::exists('zh_cards', 'id')],
            'short_description' => ['required', 'string']
        ]);

        $dataToUpdate = getUpdateData($validatedContent);

        $content = new TableContent();
        $content->updateContent($id, $dataToUpdate, $this->userId);

        return redirect()->back();
    }

    public function delete($id)
    {
        TableContent::deleteContent($id);

        return redirect()->back();
    }
}
