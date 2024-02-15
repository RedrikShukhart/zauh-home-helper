<?php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

//Static pages begin
// Home +
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// Home > Profile +
Breadcrumbs::for('profile', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Профайл', route('profile'));
});

// Home > Shopping list +
Breadcrumbs::for('shop-list', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Список покупок', route('shop-list'));
});

// Home > Settings +
Breadcrumbs::for('settings', function (BreadcrumbTrail $trail) {
    $trail->parent('home');
    $trail->push('Настроки', route('settings'));
});
//Static pages end


//For dynamic and nested links and titles begin
//то, что выглядит как Home > Готовка
Breadcrumbs::for('main-category', function (BreadcrumbTrail $trail, $parent) {
    $trail->parent('home');
    $trail->push($parent->full_name, route('home.main-category', $parent->route_name));
});

//почти как в выше, только для почти каждой родительской категории, просто отдельная страница
Breadcrumbs::for('parent-category', function (BreadcrumbTrail $trail, $parent) {
    $trail->push($parent->full_name, route('home.main-category', $parent->route_name));
});

// Home > Parent category > category for table-list and link-list +
Breadcrumbs::for('child-category', function (BreadcrumbTrail $trail, $route, $categoryName, $parents) {
    $trail->parent('home');
    foreach ($parents['grand_parents'] as $parent) {
        $trail->parent('parent-category', $parent);
    }
    $trail->push($categoryName, route($route, $categoryName));
});

// Home > Parent category > category for table-list and link-list edit and show +
Breadcrumbs::for('card', function (BreadcrumbTrail $trail, $route, $CardName, $parents) {
    $trail->parent('home');
    foreach ($parents['grand_parents'] as $parent) {
        $trail->parent('parent-category', $parent);
    }
    $trail->push($parents['parent']->full_name, route($route, $parents['parent']->route_name));
    $trail->push($CardName, route($route, $CardName));
});

// Home > Parent category > category for table-list and link-list create new card +
Breadcrumbs::for('card-new', function (BreadcrumbTrail $trail, $route, $CardName, $parents) {
    $trail->parent('home');
    foreach ($parents['grand_parents'] as $parent) {
        $trail->parent('parent-category', $parent);
    }
    $trail->push($parents['parent']->full_name, route($route, $parents['parent']->route_name));
    $trail->push($CardName);
});


// Home > Blog > [Category]
// Breadcrumbs::for('category', function (BreadcrumbTrail $trail, $category) {
//     $trail->parent('blog');
//     $trail->push($category->title, route('category', $category));
// });
