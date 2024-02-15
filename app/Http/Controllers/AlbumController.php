<?php

namespace App\Http\Controllers;

use App\Helpers\Content\AlbumContent\AlbumContent;
use App\Models\Zh_categories;
use App\Zh_helpers\Categories\Categories;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    //для этого свойства нужно получение айди уже потом по авторизации, пока так
    public $userId = 1;

    public function index($albumName)
    {
        $parents = Zh_categories::getParentsForChildCategory($albumName);
        $vars = Categories::getViewsValuesOnCategoryId($albumName);
        $title = Zh_categories::getCategoryNameOnRouteName($albumName);

        dump($vars);
        return view('album.index', compact('albumName', 'title', 'vars'))->with('parents', $parents);
    }

    public function create($albumName)
    {
        //code
        $parents = Zh_categories::getParentsForCard($albumName);
        $vars = Categories::getViewsValuesOnCategoryId($albumName);
        $title = Zh_categories::getCategoryNameOnRouteName($albumName);

        return view('album.create', compact('albumName', 'title', 'vars'))->with('parents', $parents);
    }

    public function store($albumName, Request $request)
    {
        //code
        $validatedContent = $request->validate([
            'title' => ['required', 'string', 'max:128'],
            'short_description' => ['required', 'string'],
            'photo' => ['required', 'image']
        ]);
        dd($validatedContent);
        dd($request);
        AlbumContent::addContent($albumName, $validatedContent, $this->userId);
    }

    public function edit($albumName, $id)
    {
        //code
    }

    public function update(Request $request,  $id)
    {
        //code
    }

    public function delete($albumName, $id)
    {
//        ListContent::deleteContent($id);

        return redirect()->route('album.index', $albumName);
    }
}
