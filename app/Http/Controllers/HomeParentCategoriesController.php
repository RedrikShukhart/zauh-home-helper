<?php

namespace App\Http\Controllers;

use App\Zh_helpers\Categories\Categories;

class HomeParentCategoriesController extends Controller
{
    public function index($mainCategory)
    {
        //получение всего дерева категорий для текущего пользователя
        $categoriesAll = Categories::getCategoryTree();

        $category = [];
        getParentTree($categoriesAll, $mainCategory, $category);
        dump($category);
        if (!$category) {
            return redirect()->route('home');
        }

        $parent = (object) [
            'id' => $category->id,
            'route_name' => $category->route_name,
            'full_name' => $category->full_name
        ];

        //какого формата данные будут отображаться?
        //скорее всего тут будет некое дерево с ссылками, но ссылки только на концы веток

        // return view('main-categories.index')->with('category', 'parent', $category->full_name);
//        return view('main-categories.index', compact('parent'));
        return view('main-categories.index', compact('parent', 'category'));
    }

    /**
     * ПЕРЕОПРЕДЕЛИТЬ ИСПОЛЬЗОВАНИЕ
     * @param $mainCategory
     * @return \Illuminate\Http\RedirectResponse|object
     */
    public function __invoke($mainCategory)
    {
        //code
    }
}
