<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Zh_helpers\TableContent\ListContent;
use App\Zh_helpers\TableContent\TableContent;

class LinkListController extends Controller
{
    //для этого свойства нужно получение айди уже потом по авторизации, пока так
    public $userId = 1;

    public function index($listName)
    {
        $vars = getViewsValuesOnCategoryId($listName);
        $title = getCategoryNameOnRouteName($listName);

        $list = new ListContent();
        $content = $list->getAllContent($listName, $this->userId);

        return view('link-list.index', compact('title', 'vars', 'listName', 'content'));
    }

    public function create($listName)
    {
        $vars = getViewsValuesOnCategoryId($listName);
        $title = getCategoryNameOnRouteName($listName);

        return view('link-list.create', compact('listName', 'title', 'vars'));
    }

    public function store($listName, Request $request)
    {
        $validatedContent = $request->validate([
            'title' => ['required', 'string', 'max:128'],
            'description' => ['required', 'string']            
        ]);

        ListContent::addContent($listName, $validatedContent, $this->userId);

        return redirect()->route('link-list', $listName);
    }

    public function show($listName, $id)
    {
        $list = new ListContent();
        $content = $list->getContent($id, $this->userId);

        return view('link-list.show', compact('listName', 'content', 'id'));
    }

    public function edit($listName, $id)
    {
        $title = getCategoryNameOnRouteName($listName);
        $vars = getViewsValuesOnCategoryId($listName);

        $list = new ListContent();
        $content = $list->getContent($id, $this->userId);

        return view('link-list.edit', compact('listName', 'title', 'vars', 'id', 'content'));
    }

    public function update(Request $request,  $id)
    {
        $validatedContent = $request->validate([
            'title' => ['required', 'string', 'max:128'],
            'id' => ['required', Rule::exists('zh_cards', 'id')],
            'description' => ['required', 'string']            
        ]);

        $dataToUpdate = getUpdateData($validatedContent);

        $content = new ListContent();
        $content->updateContent($id, $dataToUpdate, $this->userId);

        return redirect()->back();
    }

    public function delete($listName, $id)
    {
        ListContent::deleteContent($id);

        return redirect()->route('link-list', $listName);
    }
}
